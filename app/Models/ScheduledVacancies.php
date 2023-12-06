<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduledVacancies extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * Get the user that owns the ScheduledVacancies
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the job that owns the ScheduledVacancies
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Get the vacancy that owns the ScheduledVacancies
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
