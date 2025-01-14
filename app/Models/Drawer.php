<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drawer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cabinet_id'
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'description' => 'string',
        ];
    }


    public function cabinet() : BelongsTo {
        return $this->belongsTo(Cabinet::class);
    }

    public function folders() : HasMany {
        return $this->hasMany(Folder::class);
    }
}
