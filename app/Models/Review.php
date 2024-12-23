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

    protected $fillable = ['review', 'rating', 'user_id', 'movie_id'];

    /**
     * Get the user associated with the review.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }

    /**
     * Get the movie associated with the review.
     *
     * @return BelongsTo
     */
    public function movie()
    {
      return $this->belongsTo(Movie::class);
    }
  }
