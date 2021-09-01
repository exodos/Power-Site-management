<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class FiberSplicePoint extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'fiber_splice_points';
    protected $fillable = [
        'id',
        'latitude',
        'longitude',
        'fiber_links_id',
        'transmission_site_id',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'latitude',
        'longitude',
        'fiber_links_id',
        'transmission_site_id',
    ];

    public function transmission_site(){
        return $this->belongsTo(TransmissionSite::class);
    }

}
