<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
        ];
    }


    public function articles(): BelongsToMany {
        return $this->belongsToMany(Article::class);
    }
}
