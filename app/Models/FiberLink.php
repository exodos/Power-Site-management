<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class FiberLink extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'fiber_links';

    protected $fillable = [
        'id',
        'link_name',
        'fiber_type',
        'used_core',
        'free_core',
        'number_splice_points',
        'average_link_loss',
        'ofc_type',
        'a_end_odf_connector_type',
        'z_end_odf_connector_type',
        'transmission_site_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'link_name',
        'fiber_type',
        'used_core',
        'free_core',
        'number_splice_points',
        'average_link_loss',
        'ofc_type',
        'a_end_odf_connector_type',
        'z_end_odf_connector_type',
        'transmission_site_id'
    ];

    public function transmission_site(){
        return $this->belongsTo(TransmissionSite::class);
    }

}
