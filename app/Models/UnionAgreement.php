<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnionAgreement extends Model{
    use HasFactory;

    protected $table = "union_agreements";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'companyId',
        'createrId',
        'updaterId',
        'name',
        'weekdayHours',
        'saturdayHours',
        'overtimeBonusMin',
        'overtimeBonusMax',
        'overtimeLimit',
        'tolerance',
        'startDate',
        'endDate',
        'breakfastValue',
        'lunchValue',
        'dinnerValue',
        'previousBalance',
        'duration',
        'details',
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
