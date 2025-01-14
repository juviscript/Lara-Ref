<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Article extends Model
{
    use HasFactory;

    /** NOTE: Eloquent sets the name of these values by default (Table Name, Primary Key, etc). 
     *  You can override the default by declaring just like below. 
     */

    // protected $table = 'articles_table'      Eloquent generated default: users (Snake Case)
    // protected $incrementing = false          Eloquent generated default: true

    protected $fillable = [
        'title',
        'description',
        'body_text',
        'body_html',
        'version',
        'require_acknowledgement',
        'user_id',
        'status_id',
        'folder_id'
    ];

    protected function casts(): array
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'body_text' => 'string',
            'body_html' => 'string',
            'version' => 'integer',
            'require_acknowledgement'  => 'boolean'
        ];
    }

    public function author(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function status(): HasOne {
        return $this->hasOne(Status::class);
    }

    public function folder() : BelongsTo {
        return $this->belongsTo(Folder::class);
    }
}
