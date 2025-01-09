<?php

namespace App\Models;

use Database\Factories\CastMovieFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CastMovie extends Model
{
    /** @use HasFactory<CastMovieFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'movie_id',
        'cast_id',
    ];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function cast(): BelongsTo
    {
        return $this->belongsTo(Cast::class);
    }
}
