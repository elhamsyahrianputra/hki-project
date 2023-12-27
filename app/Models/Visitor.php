<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = ['ip', 'date_visit'];

    public $timestamps = false;

    public static $rules = [
        'ip' => 'required',
        'date_visit' => 'required',
    ];

    public static function isUniqueIPDateCombination($ipAddress, $date)
    {
        return static::where('ip', $ipAddress)
            ->where('date_visit', $date)
            ->doesntExist();
    }
}
