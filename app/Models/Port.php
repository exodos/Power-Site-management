<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Port extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'ports';

    protected $fillable = [
        'id',
        'name',
        'device_role',
        'slot',
        'slot_usage',
        'card_type',
        'port_usage'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'name',
        'device_role',
        'slot_usage',
        'card_type',
        'port_usage'
    ];
}
