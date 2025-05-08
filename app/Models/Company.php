<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model{
    use HasFactory;

    protected $table = "companies";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cityId',
        'createrId',
        'updaterId',
        'standardUAId',
        'headOfficeId',
        'name',
        'nrle',
        'nrleRegisterDate',
        'fantasyName',
        'zipCode',
        'address',
        'region',
        'addressNumber',
        'addressDescription',
        'reference',
        'email',
        'stateReg',
        'cityReg',
        'taxRegime',
        'logoFilePath',
        'domainName',
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
