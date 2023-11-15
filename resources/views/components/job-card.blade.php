@props(['item'])
<div class="max-w-sm bg-gray-50 border border-gray-200 rounded-lg shadow">
    <a href="/jobs/{{$item['id']}}">
        <img class="rounded-[1.5rem] w-100% h-[auto] p-5 mx-auto"
             src="{{$item->logo ? asset('storage/' . $item->logo) : "/images/dummy.jpeg"}}"
             alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl text-black-900 font-bold tracking-tight text-gray-900 ">{{$item['title']}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 overflow-hidden truncate">{{$item['description']}}</p>
        <x-job-tags :jobTags="$item['tags']"/>
        <a href="/jobs/{{$item['id']}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
