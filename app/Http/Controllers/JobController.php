<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\NoReturn;

class JobController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $request->user();
        $totalJobs = Job::all()->count();
        return view('jobs.index', [
            'job' => Job::latest()->filter(request(['tag', 'search']))->paginate(3),
            'totalJobs' => $totalJobs,
            'user' => $user
        ]);
    }

    public function show(Job $job)
    {
        $user = \request()->user();
        $application = Application::where('user_id', auth()->id())
            ->where('job_id', $job->id)
            ->count();

        return view('jobs.show', [
            'job' => $job,
            'application' => $application,
            'user' => $user
        ]);
    }

    public function create()
    {
        $user = \request()->user();
        return view('jobs.create', [
            'user' => $user
        ]);
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
                'salary' => 'required',
                'level' => 'required',
                'program' => 'required',
                'description' => 'required',
                'details' => 'required',
                'benefits' => 'required',

        ]);
        if ($request->hasFile('logo')) {
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
        if ($job->user_id != auth()->id()) {
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
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('/logos', 'public');
        }
        $job->update($formFields);

        return back()->with("message", "Job updated successfully");
    }

    public function destroy(Job $job): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if ($job->user_id != auth()->id()) {
            abort(403, "Unauthorized action");
        }
        $job->delete();

        return redirect('/')->with("message", "Job deleted successfully");
    }

    public function manage(Job $job, User $user): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $applicants = null;
        $user = \request()->user();
        $job_id = auth()->user()->jobs()->get();
        foreach ($job_id as $jobb) {
            $applicants = $jobb['id'];
        }
        $applicants = Application::where('job_id', '=', $applicants)->get()->count();
        $jobsApplied = Application::where('user_id', '=', $user->id)->get();

//        $foo = User::join('user_applications', 'users.id', '=', 'user_applications.user_id')->get();
//        $fo = null;
//        foreach ($foo as $item) {
//            $fo = $item['job_id'];
//        }

//        $bar = Job::where('id', $user->id)->get();


        return view('jobs.manage', [
            'jobs' => auth()->user()->jobs()->get(),
            'user' => $user,
            'applicants' => $applicants,
            'jobsApplied' => $jobsApplied
        ]);
    }

    public function apply(Job $job)
    {
        Application::create([
            'user_id' => auth()->id(),
            'job_id' => $job->id,
            'job_title' => $job->title,
            'company_name' => $job->company,
            'company_location' => $job->location,
            'company_email' => $job->email,
        ]);
        return self::show($job);
    }
}
