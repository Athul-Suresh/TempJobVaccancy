<?php

namespace App\Console\Commands;

use App\Models\ScheduledVacancies;
use App\Models\Vacancy;
use Illuminate\Console\Command;

class DeletePastScheduledVacancies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vacancies:delete-past-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete past scheduled vacancies';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pastVacancies = Vacancy::whereDate('end_date', '<', now())->get();

        foreach ($pastVacancies as $vacancy) {
            ScheduledVacancies::where('vacancy_id', $vacancy->id)->delete();
        }

        $this->info('Past scheduled vacancies deleted successfully.');
    }
}
