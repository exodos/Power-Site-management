<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ups extends Model
{
    use HasFactory;

//    protected $guard_name = 'web';

    protected $table = 'ups';

    protected $fillable = [
        'id',
        'ups_type',
        'ups_model',
        'ups_capacity',
        'input_pob_type',
        'input_pob_capacity',
        'number_of_ups_model',
        'battery_type',
        'numbers_of_battery_banks',
        'battery_capacity',
        'battery_holding_time',
        'lld_number',
        'commission_date',
        'site_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
