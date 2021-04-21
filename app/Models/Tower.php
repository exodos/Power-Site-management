<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{
    use HasFactory;

//    protected $guard_name = 'web';

    protected $table = 'towers';

    protected $fillable = [
        'id',
        'towers_brand',
        'towers_height',
        'towers_load_capacity',
        'towers_sharing_operator',
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
