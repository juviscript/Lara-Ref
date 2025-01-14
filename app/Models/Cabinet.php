<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Cabinet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'description' => 'string',
        ];
    }


    public function drawers() : HasMany {
        return $this->hasMany(Drawer::class);
    }

    public function folders() : HasManyThrough {
        return $this->hasManyThrough('App\Folder', 'App\Drawer');
    }
}
