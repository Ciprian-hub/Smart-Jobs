@extends('layout')

@section('content')
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 mx-auto">
        <div class="col-span-1 bg-[#f5f5f5] p-5">
            <div class="pl-3">
                <p class="mt-3">Job Details</p>
                <h3 class="text-4xl font-extrabold mt-3">{{$job['title']}}</h3>
                <div class="flex mt-3">
                <span class="material-symbols-outlined">
                    pin_drop
                </span>
                    <p class="ml-3">{{$job['location']}}</p>
                </div>
                <div class="flex mt-3">
                     <span class="material-symbols-outlined">
                        attach_money
                        </span>
                    <span class="ml-3">{{$job['salary']}}</span>
                </div>
                <div class="flex mt-3">
                <span class="material-symbols-outlined">
                    tools_level
                </span>
                    <p class="ml-3">{{$job['level']}}</p>
                </div>
                <img class="rounded w-[calc(100%-3rem)] mt-3"  src="{{$job->logo ? asset('storage/' . $job->logo) : "/images/dummy.jpeg"}}"
                     alt= "" />
            </div>
        </div>
        <div class="flex flex-col justify-between">
            <div class="p-5">
                <div>
                    <p class="mt-3 font-bold text-2xl">Skills</p>
                    <hr>
                        <x-job-tags :jobTags="$job['tags']"/>
                </div>
                <div>
                    <p class="mt-3 font-bold text-2xl">Description</p>
                    <hr>
                    <div class="mt-3">
                        {{$job['description']}}
                    </div>
                </div>
                <div>
                    <p class="mt-3 font-bold text-2xl">Details</p>
                    <hr>
                    <div class="mt-3">
                        {{$job['details']}}
                    </div>
                </div>
                <div>
                    <p class="mt-3 font-bold text-2xl">Benefits</p>
                    <hr>
                    <div class="mt-3">
                        {{$job['benefits']}}
                    </div>
                </div>
            </div>
            @auth
                <div class="sticky bottom-1 mx-auto w-full">
                    <form method="POST" action="/jobs/{{$job->id}}" enctype="multipart/form-data">
                        @csrf
                        @if($application)
                            <button disabled type="submit" class="w-full cursor-not-allowed sticky bottom-1 text-white hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 focus:outline-none dark:focus:ring-blue-800">
                                You applied successfully
                            </button>
                        @else
                            <button type="submit" class="w-full sticky bottom-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Apply
                            </button>
                        @endif
                    </form>
                </div>
                @else
                <div class="sticky bottom-1 mx-auto w-full">
                    <button type="submit" class="w-full sticky bottom-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <a href="/register"> You must be registered to apply</a>
                    </button>
                </div>
            @endauth
        </div>
    </div>



@endsection


