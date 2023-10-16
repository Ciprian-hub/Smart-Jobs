@extends('layout')

@section('content')
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 mx-auto">
        <div class="col-span-1 bg-[#f5f5f5] p-5">
            <p>Job Details</p>
            <h3 class="text-xl">{{$job['title']}}</h3>
            <div>
                <p>Salary</p>
                <p>grid grid-cols-1 gap-6 sm:grid-cols-2 mx-auto</p>
            </div>
            <div>
                <p>Level</p>
                <p>grid grid-cols-1 gap-6 sm:grid-cols-2 mx-auto</p>
            </div>
            <div>
                <p>Location</p>
                <p>grid grid-cols-1 gap-6 sm:grid-cols-2 mx-auto</p>
            </div>
{{--            <x-job-tags :jobTags="$job['tags']"/>--}}
            <img class="rounded-t-lg p-5" src="/images/dummy.jpeg" alt="" />
        </div>
        <div class="flex flex-col justify-between">
            <div>
                <h3>Details</h3>
                <hr>
                <h3>Skills</h3>
                <div class="flex">
                    <p>grid</p><p>grid</p><p>grid</p><p>grid</p>
                </div>
                <hr>
                <div>
                    {{$job['description']}}
                </div>
            </div>
            <button type="button" class="sticky bottom-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Apply</button>
        </div>
    </div>



@endsection


