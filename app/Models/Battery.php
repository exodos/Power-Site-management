<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battery extends Model
{
    use HasFactory;

//    protected $guard_name = 'web';

    protected $table = 'batteries';

    protected $fillable = [
        'id',
        'batteries_model',
        'number_of_batteries_group',
        'batteries_capacity',
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
