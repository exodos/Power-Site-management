<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TransmissionSite extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'transmission_sites';

    protected $fillable = [
        'id',
        'site_name',
        'latitude',
        'longitude',
        'city',
        'region',
        'et_region_zone'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'site_name',
        'latitude',
        'longitude',
        'city',
        'region',
        'et_region_zone'
    ];

    public function transmission_amplifier_board()
    {
        return $this->hasMany(TransmissionAmplifierBoards::class);
    }

    public function transmission_client_board()
    {
        return $this->hasMany(TransmissionClientBoards::class);
    }

    public function transmission_equipment()
    {
        return $this->hasMany(TransmissionEquipment::class);
    }

    public function transmission_line_board()
    {
        return $this->hasMany(TransmissionLineBoards::class);
    }

    public function transmission_line_board_wdm_trail()
    {
        return $this->hasMany(TransmissionLineBoardWdmTrails::class);
    }

    public function transmission_mux_demux_board()
    {
        return $this->hasMany(TransmissionMuxDemuxBoards::class);
    }

    public function transmission_otn_nes()
    {
        return $this->hasMany(TransmissionOtnNes::class);
    }

    public function transmission_otn_service()
    {
        return $this->hasMany(TransmissionOtnServices::class);
    }

    public function transmission_roadm_board()
    {
        return $this->hasMany(TransmissionRoadmBoards::class);
    }

    public function transmission_site_line_fiber()
    {
        return $this->hasMany(TransmissionSiteLineFibers::class);
    }
}
