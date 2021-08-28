<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TransmissionOtnServices extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'transmission_otn_services';

    protected $fillable = [
        'id',
        'service_name',
        'customer_name',
        'sla_type',
        'rate',
        'source_ne',
        'source_port_number',
        'sink_ne',
        'sink_board_id',
        'sink_port_number',
        'transmission_client_boards_id',
        'transmission_site_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'service_name',
        'customer_name',
        'sla_type',
        'rate',
        'source_ne',
        'source_port_number',
        'sink_ne',
        'sink_board_id',
        'sink_port_number',
        'transmission_client_boards_id',
        'transmission_site_id',
    ];

    public function transmission_client_board()
    {
        $this->belongsTo(TransmissionClientBoards::class);
    }

    public function transmission_site()
    {
        return $this->belongsTo(TransmissionSite::class);
    }
}
