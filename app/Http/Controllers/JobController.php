<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\NoReturn;

class JobController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('jobs.index', [
            'job' => Job::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }
    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    #[NoReturn] public function store(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        //store jobs data
        $formFields = $request->validate([
                'title' => 'required',
                'company' => ['required', Rule::unique('jobs', 'company')],
                'location' => 'required',
                'email' => ['required', 'email'],
                'web' => 'required',
                'tags' => 'required',
                'description' => 'required',
            ]);
        Job::create($formFields);

        return redirect('/');
    }
}
