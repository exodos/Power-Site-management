<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class AirConditioner extends Model
{
    use HasFactory;

//    protected $guard_name = 'web';

    protected $table = 'air_conditioners';

    protected $fillable = [
        'id',
        'air_conditioners_model',
        'air_conditioners_capacity',
        'site_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //softdelete harddelete
    //relationships

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
