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

    protected $fillable = ['title', 'synopsis', 'poster', 'year', 'available', 'genre_id'];

    /**
     * Get the reviews for the movie.
     *
     * @return HasMany
     */
    public function reviews(): HasMany
    {
      return $this->hasMany(Review::class);
    }

    /**
     * Get the genre of the movie.
     *
     * @return BelongsTo
     */
    public function genre(): BelongsTo
    {
      return $this->belongsTo(Genre::class);
    }

    /**
     * The casts that belong to the movie.
     *
     * @return BelongsToMany
     */
    public function casts(): BelongsToMany
    {
      return $this->belongsToMany(CastMovie::class);
    }
  }
