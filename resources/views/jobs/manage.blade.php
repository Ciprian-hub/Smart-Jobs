@extends('layout')

@section('content')
    <div class="relative overflow-x-auto w-full">
        <table class="w-full text-sm text-left">
            <thead class="text-xs text-gray-700 uppercase">
            <tr class="border-b " >
                <th scope="col" class="px-6 py-3">
                    Job title
                </th>
                <th scope="col" class="px-6 py-3">
                    Company Name
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
                    {{$job['title']}}
                </th>
                <td class="px-6 py-4">
                    {{$job['company']}}
                </td>
                <td class="px-6 py-4">
                    <form method="post" action="/jobs/{{$job->id}}">
                        @csrf
                        @method("DELETE")
                        <button>
                            delete
                        </button>
                    </form>
                    <a href="/jobs/{{$job->id}}/edit">
                        <button type="button">
                            edit
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
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>
@endsection
<script>

</script>

