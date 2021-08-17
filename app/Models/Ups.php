<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Ups extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

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
        'work_order_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
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
