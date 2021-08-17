<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Rectifier extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

//    protected $guard_name = 'web';

    protected $table = 'rectifiers';

    protected $fillable = [
        'id',
        'rectifiers_model',
        'rectifiers_capacity',
        'rectifiers_module_model',
        'number_of_rectifiers_model_slots',
        'rectifiers_module_capacity',
        'rectifier_module_Qty',
        'llvd_capacity',
        'blvd_capacity',
        'battery_fuess_Qty',
        'power_of_msag_msan_connected_company',
        'monitoring_system_name',
        'lld_number',
        'commission_date',
        'site_id',
        'work_order_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'rectifiers_model',
        'rectifiers_capacity',
        'rectifiers_module_model',
        'number_of_rectifiers_model_slots',
        'rectifiers_module_capacity',
        'rectifier_module_Qty',
        'llvd_capacity',
        'blvd_capacity',
        'battery_fuess_Qty',
        'power_of_msag_msan_connected_company',
        'monitoring_system_name',
        'lld_number',
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
