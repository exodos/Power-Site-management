<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rectifier extends Model
{
    use HasFactory;

//    protected $guard_name = 'web';

    protected $table = 'rectifiers';

    protected $fillable = [
        'id',
        'rectifiers_model',
        'number_of_rectifiers',
        'rectifiers_capacity',
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
