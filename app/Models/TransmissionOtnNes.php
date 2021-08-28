<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TransmissionOtnNes extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'transmission_otn_nes';

    protected $fillable = [
        'id',
        'ne_name',
        'ne_type',
        'ne_vendor',
        'transmission_site_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'ne_name',
        'ne_type',
        'ne_vendor',
        'transmission_site_id'
    ];

    public function transmission_equipment()
    {
        return $this->hasMany(TransmissionEquipment::class);
    }

    public function transmission_site()
    {
        return $this->belongsTo(TransmissionSite::class);
    }

    public function transmission_site_line_fiber()
    {
        return $this->hasMany(TransmissionSiteLineFibers::class);
    }
}
