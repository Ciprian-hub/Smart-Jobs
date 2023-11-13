@extends('layout')

@section('content')
    <div class="relative overflow-x-auto w-full">
        <h1>Your posted jobs</h1>
        <table class="w-full text-sm text-left">
            <thead class="text-xs text-gray-700 uppercase">
            <tr class="border-b" >
                <th scope="col" class="px-6 py-3">
                    Job title
                </th>
                <th scope="col" class="px-6 py-3">
                    Company Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Applicants
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @unless($jobs->isEmpty())
                @foreach($jobs as $job)
            <tr class="bg-white border-b text-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                  #{{$job['id']}}  {{$job['title']}}
                </th>
                <td class="px-6 py-4">
                    {{$job['company']}}
                </td>
                <td>
                    {{$applicants}} applicant/s on this job
                </td>
                <td class="px-6 py-4">
                    <div x-data="{ open:false }">
                        <button  @click="open=true" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            Delete
                        </button>
                        <div x-show="open">
                            <x-modal-component :job="$job"/>
                        </div>

                    </div>
                    <a href="/jobs/{{$job->id}}/edit">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Edit
                        </button>
                    </a>
                </td>
            </tr>
                @endforeach
                @else
                <p>No Jobs found</p>
            @endunless
            </tbody>
        </table>
    </div>
@endsection



