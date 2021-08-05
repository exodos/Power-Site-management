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
        'number_solar_system',
        'solar_panel_type',
        'solar_panels_module_capacity',
        'number_of_arrays',
        'solar_controller_type',
        'regulator_capacity',
        'solar_regulator_Qty',
        'number_of_structure_group',
        'solar_structure_front_height',
        'solar_structure_rear_height',
        'commission_date',
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
