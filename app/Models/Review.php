<?php

namespace App\Models;

use Database\Factories\ReviewFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
  /** @use HasFactory<ReviewFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'user_id',
    'movie_id',
    'rating',
    'review',
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function movie(): BelongsTo
  {
    return $this->belongsTo(Movie::class);
  }
}
