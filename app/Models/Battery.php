<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Battery extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

//    protected $guard_name = 'web';

    protected $table = 'batteries';

    protected $fillable = [
        'id',
        'batteries_type',
        'batteries_model',
        'batteries_voltage',
        'batteries_capacity',
        'number_of_batteries_banks',
        'battery_holding_time',
        'commission_date',
        'lld_number',
        'site_id',
        'work_order_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'batteries_type',
        'batteries_model',
        'batteries_voltage',
        'batteries_capacity',
        'number_of_batteries_banks',
        'battery_holding_time',
        'commission_date',
        'lld_number',
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
