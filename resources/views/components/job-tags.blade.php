@props(['jobTags'])

@php
$tags = explode(',', $jobTags)
@endphp

<div>
    <div class="flex">
        @foreach($tags as $tag)
            <a href="/?tag={{$tag}}" class="mr-1 bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md  mb-2">
                {{$tag}}
            </a>
        @endforeach
    </div>
</div>
