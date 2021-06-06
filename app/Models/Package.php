<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'senderId',
        'recipientId',
        'type',
        'length',
        'width',
        'height',
        'weight',
    ];

    /**
     * @var string[]
     */
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
     * Get package recipient
     */
    public function getRecipientAttribute()
    {
        return Customer::findOrFail($this->recipientId);
    }

    /**
     * Get package sender
     */
    public function getSenderAttribute(): Customer
    {
        return Customer::findOrFail($this->senderId);
    }

    /**
     * @return string
     */
    public function getStatusAttribute(): string
    {
        return PackageHistory::where('packageId', $this->id)->latest()->firstOrFail()->status;
    }

    /**
     * @return HasMany
     */
    public function statuses(): HasMany
    {
        return $this->HasMany(PackageHistory::class, 'packageId');
    }
}
