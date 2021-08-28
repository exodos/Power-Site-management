<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TransmissionLineBoardWdmTrails extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'transmission_line_board_wdm_trails';

    protected $fillable = [
        'id',
        'trail_name',
        'working_mode',
        'source_ne',
        'source_port_number',
        'source_port_wave_length',
        'sink_ne',
        'sink_board_id',
        'sink_port_number',
        'sink_port_wave_length',
        'transmission_line_boards_id',
        'transmission_site_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'trail_name',
        'working_mode',
        'source_ne',
        'source_port_number',
        'source_port_wave_length',
        'sink_ne',
        'sink_board_id',
        'sink_port_number',
        'sink_port_wave_length',
        'transmission_line_boards_id',
        'transmission_site_id',
    ];

    public function transmission_line_board()
    {
        $this->belongsTo(TransmissionLineBoards::class);
    }

    public function transmission_site()
    {
        return $this->belongsTo(TransmissionSite::class);
    }
}
