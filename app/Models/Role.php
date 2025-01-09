<?php

namespace App\Models;

use Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    /** @use HasFactory<RoleFactory> */
    use HasFactory, HasUuids;

    protected $fillable = ['name'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
