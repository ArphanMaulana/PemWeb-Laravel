<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
  use HasFactory, HasUuids;

  // Define the table name if it's not the plural form of the model name
  public $incrementing = false;

  // Define the primary key if it's not the default 'id'
  protected $table = 'profiles';

  // Set the type of the primary key as UUID
  protected $primaryKey = 'id';

  // Disable auto-increment for UUID primary key
  protected $keyType = 'string';

  // Define the fillable fields for mass assignment
  protected $fillable = [
    'biodata',
    'age',
    'address',
    'avatar',
    'user_id', // Foreign key to the users table
  ];

  // Define the relationship with the User model (one-to-one relationship)
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}
