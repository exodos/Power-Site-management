<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Microwave extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'microwaves';
    protected $fillable = [
        'microwave_id',
        'power_consumption',
        'breaker_type',
        'breaker_quantity', 'site_type',
        'installed_capacity',
        'maximum_capacity',
        'polarization',
        'llvd_capacity',
        'blvd_capacity',
        'site_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'microwave_id',
        'power_consumption',
        'breaker_type',
        'breaker_quantity', 'site_type',
        'installed_capacity',
        'maximum_capacity',
        'polarization',
        'llvd_capacity',
        'blvd_capacity',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function rectifier()
    {
        return $this->belongsTo(Rectifier::class);
    }
}
