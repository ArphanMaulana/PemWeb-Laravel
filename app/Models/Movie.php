<?php

namespace App\Models;

use Database\Factories\MovieFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
  /** @use HasFactory<MovieFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'genre_id',
    'title',
    'synopsis',
    'poster',
    'year',
    'available'
  ];

  public function genre(): BelongsTo
  {
    return $this->belongsTo(Genre::class);
  }

  public function reviews(): HasMany
  {
    return $this->hasMany(Review::class);
  }

  public function movieCasts(): BelongsToMany
  {
    return $this->belongsToMany(Cast::class, 'cast_movies', 'movie_id', 'cast_id');
  }
}
