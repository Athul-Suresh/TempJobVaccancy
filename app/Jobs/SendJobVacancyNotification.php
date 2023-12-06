<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Vacancy;
use App\Models\User;
use App\Notifications\JobVacancy;

class SendJobVacancyNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $vacancy;

    public function __construct(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::ActiveUsers()->get();
        $messages["job"] = "Job Title: ".$this->vacancy->job->job_name;
        $messages["start_date"] = "Application Starting On: ".$this->vacancy->start_date;
        $messages["end_date"] = "Apply before: ".$this->vacancy->end_date;
        $messages["description"] ="Job Description: ".$this->vacancy->description;
        foreach ($users as $user) {
            $user->notify(new JobVacancy($messages));
        }
    }
}
