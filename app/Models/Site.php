<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Site extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

//    protected $guard_name = 'web';

    protected $table = 'sites';

    protected $fillable = [
        'id',
        'sites_name',
        'ps_configuration',
        'monitoring_status',
        'sites_latitude',
        'sites_longitude',
        'sites_region_zone',
        'sites_political_region',
        'sites_location',
        'sites_class',
        'sites_value',
        'sites_type',
        'maintenance_center',
        'distance_mc',
        'list_of_ne',
        'number_of_towers',
        'number_of_generator',
        'number_of_airconditioners',
        'number_of_rectifiers',
        'number_of_solar_system',
        'number_of_down_links',
        'work_order_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'sites_name',
        'ps_configuration',
        'monitoring_status',
        'sites_latitude',
        'sites_longitude',
        'sites_region_zone',
        'sites_political_region',
        'sites_location',
        'sites_class',
        'sites_value',
        'sites_type',
        'maintenance_center',
        'distance_mc',
        'list_of_ne',
        'number_of_towers',
        'number_of_generator',
        'number_of_airconditioners',
        'number_of_rectifiers',
        'number_of_solar_system',
        'number_of_down_links',
        'work_order_id',
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

//    public function work_orders()
//    {
//        return $this->hasMany(WorkOrder::class);
//    }

    public function work_orders()
    {
        return $this->belongsTo(WorkOrder::class);
    }


}
