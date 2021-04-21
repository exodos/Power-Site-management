<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    use HasFactory;

//    protected $guard_name = 'web';

    protected $table = 'powers';

    protected $fillable = [
        'id',
        'powers_type',
        'dg_model',
        'dg_capacity',
        'fuel_tanker_capacity',
        'site_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
