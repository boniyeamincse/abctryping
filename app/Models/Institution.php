<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institution extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'contact_email',
        'contact_phone',
        'website',
        'status'
    ];

    /**
     * Get the batches that belong to this institution.
     */
    public function batches(): HasMany
    {
        return $this->hasMany(Batch::class);
    }

    /**
     * Get the users that belong to this institution.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}