<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /** Expecting whitelist of columns to be updated in the database.
     * @var string[]
     */
    protected $fillable = [
        'fName',
        'lName',
        'number',
        'email',
        'fAddress',
        'lAddress',
        'postcode',
    ];

    /**
     * Calling getAddressAttribute() returns first/last address and postcode.
     * @return string
     */
    public function getAddressAttribute()
    {
        return "$this->fAddress, $this->lAddress, $this->postcode";
    }

    /**
     * returns customers fullname
     */
    public function getFullnameAttribute()
    {
        return ucwords("$this->fName $this->lName");
    }
}

