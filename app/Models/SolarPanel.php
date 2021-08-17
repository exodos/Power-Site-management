<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class SolarPanel extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

//    protected $guard_name = 'web';

    protected $table = 'solar_panels';

    protected $fillable = [
        'id',
        'number_solar_system',
        'solar_panel_type',
        'solar_panels_module_capacity',
        'number_of_arrays',
        'solar_controller_type',
        'regulator_capacity',
        'solar_regulator_Qty',
        'number_of_structure_group',
        'solar_structure_front_height',
        'solar_structure_rear_height',
        'commission_date',
        'site_id',
        'work_order_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'number_solar_system',
        'solar_panel_type',
        'solar_panels_module_capacity',
        'number_of_arrays',
        'solar_controller_type',
        'regulator_capacity',
        'solar_regulator_Qty',
        'number_of_structure_group',
        'solar_structure_front_height',
        'solar_structure_rear_height',
        'commission_date',
        'site_id',
        'work_order_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function work_orders()
    {
        return $this->belongsTo(WorkOrder::class);
    }
}
