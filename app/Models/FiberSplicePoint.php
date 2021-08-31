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
        'fiber_splice_point_id',
        'latitude',
        'longitude',
        'link_id',
        'site_id',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'fiber_splice_point_id',
        'latitude',
        'longitude',
        'link_id',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

}
