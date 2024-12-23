<?php

  namespace App\Models;

  use Database\Factories\CastMovieFactory;
  use Illuminate\Database\Eloquent\Concerns\HasUuids;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;

  class CastMovie extends Model
  {
    /** @use HasFactory<CastMovieFactory> */
    use HasFactory, HasUuids;

    protected $fillable = ['movie_id', 'cast_id'];

    /**
     * Get the movie associated with the cast-movie relation.
     *
     * @return BelongsTo
     */
    public function movie()
    {
      return $this->belongsTo(Movie::class);
    }

    /**
     * Get the cast associated with the cast-movie relation.
     *
     * @return BelongsTo
     */
    public function cast()
    {
      return $this->belongsTo(Cast::class);
    }
  }
