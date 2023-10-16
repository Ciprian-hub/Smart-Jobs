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
            'job' => Job::latest()->filter(request(['tag', 'search']))->paginate(3)
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
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('/logos', 'public');
        }
        $formFields['user_id'] = auth()->id();

        Job::create($formFields);

        return redirect('/')->with("message", "Job created successfully");
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job)
    {
        if($job->user_id != auth()->id()){
            abort(403, "Unauthorized action");
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'web' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('/logos', 'public');
        }
        $job->update($formFields);

        return back()->with("message", "Job updated successfully");
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/')->with("message", "Job deleted successfully");
    }

    public function manage(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('jobs.manage', ['jobs' => auth()->user()->jobs()->get()]);
    }
}
