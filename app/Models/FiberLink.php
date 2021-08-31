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
        'link_id',
        'link_name',
        'fiber_type',
        'used_core',
        'free_core',
        'number_splice_points',
        'average_link_loss',
        'ofc_type',
        'a_end_odf_connector_type',
        'z_end_odf_connector_type',
        'site_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'link_id',
        'link_name',
        'fiber_type',
        'used_core',
        'free_core',
        'number_splice_points',
        'average_link_loss',
        'ofc_type',
        'a_end_odf_connector_type',
        'z_end_odf_connector_type',
        'site_id'
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

}
