<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TransmissionLineBoards extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected
        $table = 'transmission_line_boards';

    protected $fillable = [
        'id',
        'board_name',
        'slot_number',
        'port_capacity',
        'number_free_ports',
        'number_used_ports',
        'number_ports_modules',
        'transmission_equipment_id',
        'transmission_site_id',
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'board_name',
        'slot_number',
        'port_capacity',
        'number_free_ports',
        'number_used_ports',
        'number_ports_modules',
        'transmission_equipment_id',
        'transmission_site_id',
    ];

    public function transmission_equipment()
    {

        return $this->belongsTo(TransmissionEquipment::class);
    }


    public function transmission_site()
    {
        return $this->belongsTo(TransmissionSite::class);
    }

    public function transmission_line_board_wdm_trail()
    {
        return $this->hasMany(TransmissionLineBoardWdmTrails::class);
    }

}
