<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class AirConditioner extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

//    protected $guard_name = 'web';

    protected $table = 'air_conditioners';

    protected $fillable = [
        'id',
        'air_conditioners_type',
        'air_conditioners_model',
        'air_conditioners_capacity',
        'functional_type',
        'gas_type',
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
        'air_conditioners_type',
        'air_conditioners_model',
        'air_conditioners_capacity',
        'functional_type',
        'gas_type',
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
