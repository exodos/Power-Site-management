<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    use HasFactory;

//    protected $guard_name = 'web';

    protected $table = 'powers';

    protected $fillable = [
        'id',
        'generator_type',
        'generator_capacity',
        'engine_model',
        'fuel_tanker_capacity',
        'alternator_model',
        'alternator_capacity',
        'controller_mode_model',
        'ats_model',
        'ats_capacity',
        'generator_foundation_size',
        'fuel_tank_foundation_size',
        'fuel_tanker_type',
        'fuel_tank_Qty',
        'starter_battery_capacity',
        'starter_battery_type',
        'functionality_status',
        'dg_commission_date',
        'dg_lld_number',
        'grid_power_line_voltage_and_transformer_capacity',
        'transformer_installation_date',
        'site_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
