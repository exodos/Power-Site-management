<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TransmissionRoadmBoards extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'transmission_roadm_boards';

    protected $fillable = [
        'id',
        'board_name',
        'slot_number',
        'type',
        'number_free_ports',
        'number_used_ports',
        'direction',
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
        'type',
        'number_free_ports',
        'number_used_ports',
        'direction',
        'transmission_equipment_id',
        'transmission_site_id',
    ];

    public function transmission_equipment()
    {
        $this->belongsTo(TransmissionEquipment::class);
    }

    public function transmission_site()
    {
        return $this->belongsTo(TransmissionSite::class);
    }
}
