<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'senderId',
        'recipientId',
        'type',
        'length',
        'width',
        'height',
        'weight',
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    /**
     * Return the newest status for a package
     */
    public function getPackageStatusAttribute()
    {
        $packageHistory = PackageHistory::where('packageId', $this->id)->latest()->firstOrFail();

        return $packageHistory->status
            ? $packageHistory->status . ' (' . $packageHistory->created_at->format('H:m:s d/m/Y') . ')'
            : 'Unknown';
    }

    /**
     * Return full name of recipient
     */
    public function getRecipientAttribute()
    {
        return Customer::findOrFail($this->recipientId);
    }

    /**
     * Return full name of recipient
     */
    public function getSenderAttribute(): Customer
    {
        return Customer::findOrFail($this->senderId);
    }

    public function getStatusAttribute(): string
    {
        return PackageHistory::where('packageId', $this->id)->latest()->firstOrFail()->status;
    }

    public function statuses()
    {
        return $this->HasMany(PackageHistory::class, 'packageId')->get();
    }
}
