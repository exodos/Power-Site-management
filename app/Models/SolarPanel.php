<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolarPanel extends Model
{
    use HasFactory;

//    protected $guard_name = 'web';

    protected $table = 'solar_panels';

    protected $fillable = [
        'id',
        'solar_panels_number',
        'solar_panels_capacity',
        'solar_panels_regulatory_model',
        'solar_panels_module_capacity',
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
