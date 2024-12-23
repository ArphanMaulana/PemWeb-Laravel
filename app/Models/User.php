<?php

  namespace App\Models;

  use Database\Factories\UserFactory;
  use Illuminate\Database\Eloquent\Concerns\HasUuids;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Database\Eloquent\Relations\HasMany;
  use Illuminate\Database\Eloquent\Relations\HasOne;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  use Illuminate\Notifications\Notifiable;

  class User extends Authenticatable
  {
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name', 'email', 'password', 'role_id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
      'password',
      'remember_token',
    ];

    /**
     * Get the role associated with the user.
     *
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
      return $this->belongsTo(Role::class);
    }

    /**
     * Get the profile associated with the user.
     *
     * @return HasOne
     */
    public function profile(): HasOne
    {
      return $this->hasOne(Profile::class);
    }

    /**
     * Get the reviews written by the user.
     *
     * @return HasMany
     */
    public function reviews(): HasMany
    {
      return $this->hasMany(Review::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
      return [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
      ];
    }
  }
