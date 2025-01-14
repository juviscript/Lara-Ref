<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Folder extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'description',
        'drawer_id'
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'description' => 'string',
        ];
    }

    public function drawer() : BelongsTo {
        return $this->belongsTo(Drawer::class);
    }

    public function articles() : HasMany {
        return $this->hasMany(Article::class);
    }

}
