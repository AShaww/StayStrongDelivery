<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'fName',
        'lName',
        'number',
        'email',
        'fAddress',
        'lAddress' ,
        'postcode',
    ];

    public function getAddressAttribute()
    {
        return "$this->fAddress, $this->lAddress, $this->postcode";
    }

    /**
     * Return fullname of customer
     */
    public function getFullnameAttribute()
    {
        return ucwords("$this->fName $this->lName");
    }

}

