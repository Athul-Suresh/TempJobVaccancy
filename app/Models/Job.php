<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [];


    /**
     * Get all of the vacancies for the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class);
    }


}
