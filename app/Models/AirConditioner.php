<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class AirConditioner extends Model
{
    use HasFactory, Sortable;

//    protected $guard_name = 'web';

    protected $table = 'air_conditioners';

    protected $fillable = [
        'id',
        'air_conditioners_type',
        'air_conditioners_model',
        'air_conditioners_capacity',
        'functional_type',
        'gas_type',
        'lld_number',
        'commission_date',
        'site_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];


//    public $sortable = ['id', 'air_conditioners_type', 'air_conditioners_model', 'air_conditioners_capacity', 'functional_type', 'LLD_number', 'installation_date', 'created_at', 'updated_at', 'site_id'];

    //softdelete harddelete
    //relationships

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
