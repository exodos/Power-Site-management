<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Tower extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

//    protected $guard_name = 'web';

    protected $table = 'towers';

    protected $fillable = [
        'id',
        'towers_type',
        'towers_height',
        'towers_brand',
        'towers_soil_type',
        'towers_foundation_type',
        'towers_design_load_capacity',
        'towers_sharing_operator',
        'tower_used_load_capacity',
        'ethio_antenna_weight',
        'ethio_antenna_height',
        'operator_antenna_height',
        'operator_tower_load',
        'operator_antenna_weight',
        'tower_installation_date',
        'site_id',
        'work_order_id',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'towers_type',
        'towers_height',
        'towers_brand',
        'towers_soil_type',
        'towers_foundation_type',
        'towers_design_load_capacity',
        'towers_sharing_operator',
        'tower_used_load_capacity',
        'ethio_antenna_weight',
        'ethio_antenna_height',
        'operator_antenna_height',
        'operator_tower_load',
        'operator_antenna_weight',
        'tower_installation_date',
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
