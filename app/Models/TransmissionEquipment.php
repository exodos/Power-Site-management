<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TransmissionEquipment extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'transmission_equipment';

    protected $fillable = [
        'id',
        'subrack_name',
        'subrack_type',
        'equipment_type',
        'number_used_slots',
        'number_free_slots',
        'vendor',
        'transmission_otn_ne_id',
        'transmission_site_id',
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'subrack_name',
        'subrack_type',
        'equipment_type',
        'number_used_slots',
        'number_free_slots',
        'vendor',
        'transmission_otn_ne_id',
        'transmission_site_id',
    ];

    public function transmission_otn_nes()
    {
        return $this->belongsTo(TransmissionOtnNes::class);
    }

    public function transmission_site()
    {
        return $this->belongsTo(TransmissionSite::class);
    }

    public function transmission_amplifier_board()
    {
        return $this->hasMany(TransmissionAmplifierBoards::class);
    }

    public function transmission_client_board()
    {
        return $this->hasMany(TransmissionClientBoards::class);
    }

    public function transmission_line_board()
    {
        return $this->hasMany(TransmissionLineBoards::class);
    }

//    public function transmission_line_board_wdm_trail()
//    {
//        return $this->hasMany(TransmissionLineBoardWdmTrails::class);
//    }

    public function transmission_mux_demux_board()
    {
        return $this->hasMany(TransmissionMuxDemuxBoards::class);
    }

    public function transmission_roadm_board()
    {
        return $this->hasMany(TransmissionRoadmBoards::class);
    }
}
