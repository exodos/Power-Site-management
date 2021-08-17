<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class WorkOrder extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

//    protected $guard_name = 'web';

    protected $table = 'work_orders';

    protected $fillable = [
        'id',
        'work_orders_number',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'work_orders_number',
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

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

//    public function work_orders()
//    {
//        return $this->hasMany(WorkOrder::class);
//    }


}
