<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Jobs\SendJobVacancyNotification;
use App\Models\Job;
use App\Models\User;
use App\Models\Vacancy;
use App\Notifications\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

use Inertia\Inertia;
use Inertia\Response;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {

        return Inertia::render('Vacancy/Index', [
            'vacancies' => Vacancy::with('job')->get(),
            'status' => session('status'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Vacancy/Add', [
            'jobs' => Job::all(),
            'status' => session('status'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacancyRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $vacancy=Vacancy::create($validated);
        SendJobVacancyNotification::dispatch($vacancy)->onQueue('notifications');
        return Redirect::route('vacancies.index')->with('success', 'Vacancy created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy): Response
    {
        return Inertia::render('Vacancy/Edit', [
            'jobs' => Job::all(),
            'vacancy' => $vacancy,
            'status' => session('status'),
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacancyRequest $request, Vacancy $vacancy): RedirectResponse
    {
        $validated = $request->validated();
        $vacancy->update($validated);
        SendJobVacancyNotification::dispatch($vacancy)->onQueue('notifications');
        return Redirect::route('vacancies.index')->with('success', 'Vacancy updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy): RedirectResponse
    {
        $vacancy->delete();
        return Redirect::route('vacancies.index')->with('success', 'Vacancy deleted successfully');
    }
}
