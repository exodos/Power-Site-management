<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TransmissionSiteLineFibers extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'transmission_site_line_fibers';

    protected $fillable = [
        'id',
        'direction_name',
        'cabling_method',
        'fiber_type',
        'core_number',
        'next_hope_ne_id',
        'next_hope_distance',
        'transmission_otn_ne_id',
        'transmission_site_id',
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'direction_name',
        'cabling_method',
        'fiber_type',
        'core_number',
        'next_hope_ne_id',
        'next_hope_distance',
        'transmission_otn_ne_id',
        'transmission_site_id',
    ];

    public function transmission_otn_nes()
    {
        $this->belongsTo(TransmissionOtnNes::class);
    }

    public function transmission_site()
    {
        return $this->belongsTo(TransmissionSite::class);
    }
}
