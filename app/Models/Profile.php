<?php

  namespace App\Models;

  use Database\Factories\ProfileFactory;
  use Illuminate\Database\Eloquent\Concerns\HasUuids;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;

  class Profile extends Model
  {
    /** @use HasFactory<ProfileFactory> */
    use HasFactory, HasUuids;

    protected $fillable = ['biodata', 'age', 'address', 'avatar', 'user_id'];

    /**
     * Get the user associated with the profile.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }
  }
