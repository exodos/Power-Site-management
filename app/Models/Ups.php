<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ups extends Model
{
    use HasFactory;

//    protected $guard_name = 'web';

    protected $table = 'ups';

    protected $fillable = [
        'id',
        'ups_model',
        'ups_capacity',
        'number_of_ups_model',
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
