@props(['jobTags'])

@php
$tags = explode(',', $jobTags)
@endphp

<div>
    <div class="flex">
        @foreach($tags as $tag)
                <a href="/?tag={{$tag}}" class="mr-3 px-5 mt-5 mb-5 text-xm font-xs text-white focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    {{$tag}}
                </a>
        @endforeach
    </div>
</div>
