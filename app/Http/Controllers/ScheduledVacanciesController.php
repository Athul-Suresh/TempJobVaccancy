<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\ScheduledVacancies;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ScheduledVacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::ActiveUsers()->get();
        
        $vacancies = Vacancy::all();
        $scheduledVacancies = ScheduledVacancies::with(['user', 'vacancy'])->get();

        return Inertia::render('Calendar/Index', [
            'users' => $users,
            'vacancies' => $vacancies,
            'scheduledVacancies' => $scheduledVacancies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ScheduledVacancies $scheduledVacancies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScheduledVacancies $scheduledVacancies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScheduledVacancies $scheduledVacancies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScheduledVacancies $scheduledVacancies)
    {
        //
    }
}
