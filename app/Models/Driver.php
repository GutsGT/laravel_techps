<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model{
    use HasFactory;

    protected $table = "drivers";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'employeeId',
        'driverLicenseId',
        'unionAgreementId',
        'cityId',
        'createrId',
        'updaterId',

        'region',
        'address',
        'addressDescription',
        'addressNumber',
        'zipCode',
        'registerNumber',
        'hiringDate',
        'active'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
