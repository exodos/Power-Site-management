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
        'id',
        'site_name',
        'site_type',
        'installed_capacity',
        'maximum_capacity',
        'polarization',
        'transmission_site_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'site_name',
        'site_type',
        'installed_capacity',
        'maximum_capacity',
        'polarization',
        'transmission_site_id',
    ];

    public function transmission_site(){
        return $this->belongsTo(TransmissionSite::class);
    }

}
