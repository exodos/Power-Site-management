<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

//    protected $guard_name = 'web';

    protected $table = 'sites';

    protected $fillable = [
        'id',
        'sites_name',
        'sites_latitude',
        'sites_longitude',
        'sites_region_zone',
        'sites_political_region',
        'sites_category',
        'sites_class',
        'sites_value',
        'sites_type',
        'sites_configuration',
        'monitoring_system_name',
        'commercial_power_line_voltage',
        'distance_maintenance_center',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function air_conditioners()
    {
        return $this->hasMany(AirConditioner::class);
    }

    public function batteries()
    {
        return $this->hasMany(Battery::class);
    }

    public function powers()
    {
        return $this->hasMany(Power::class);
    }

    public function rectifiers()
    {
        return $this->hasMany(Rectifier::class);
    }

    public function solar_panels()
    {
        return $this->hasMany(SolarPanel::class);
    }

    public function towers()
    {
        return $this->hasMany(Tower::class);
    }

    public function ups()
    {
        return $this->hasMany(Ups::class);
    }

    public function work_orders()
    {
        return $this->hasMany(WorkOrder::class);
    }


}
