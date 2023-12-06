<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Vacancy extends Model
{
    use HasFactory,SoftDeletes,Notifiable;

    protected $table = "vacancies";
    protected $fillable = [
        'job_id',
        'status',
        'start_date',
        'end_date',
        'description',
    ];


    /**
     * Get all of the job for the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }


    /**
     * Get all of the scheduledVacancies for the Vacancy
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scheduledVacancies(): HasMany
    {
        return $this->hasMany(ScheduledVacancy::class);
    }


}
