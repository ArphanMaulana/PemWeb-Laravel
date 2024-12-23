<?php

  namespace App\Models;

  use Database\Factories\CastFactory;
  use Illuminate\Database\Eloquent\Concerns\HasUuids;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class Cast extends Model
  {
    /** @use HasFactory<CastFactory> */
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'age', 'biodata', 'avatar'];
  }
