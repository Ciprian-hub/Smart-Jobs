@extends('layout')

@section('content')

<section class="">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
{{--        <div class="flex flex-col justify-center text-center pb-20 pt-10">--}}
{{--            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl">We invest in the world’s potential</h1>--}}
{{--            <p class="mb-6 px-40 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>--}}
{{--            <a href="#" class="text-blue-600 text-center dark:text-blue-500 hover:underline font-medium text-lg flex items-center justify-center">Read more about our app--}}
{{--                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">--}}
{{--                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class="mx-auto">
            <div class="w-full mx-auto lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl">
                <h2 class="text-2xl font-bold text-black">
                    Edit a job
                </h2>
                <form class="mx-auto" method="POST" action="/jobs/{{$job->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="title" id="title" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                               value="{{$job->title}}" />
                        @error('title')
                        <p class="text-sm text-red-900">{{$message}}</p>
                        @enderror
                        {{$job}}
                        <label for="title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Job Position</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="company" id="company" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                               value="{{$job->company}}"/>
                        @error('company')
                        <p class="text-sm text-red-900">{{$message}}</p>
                        @enderror
                        <label for="company" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company Name</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="location" id="location" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                               value="{{$job->location}}"/>
                        @error('location')
                        <p class="text-sm text-red-900">{{$message}}</p>
                        @enderror
                        <label for="location" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Job Location</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                               value="{{$job->email}}"/>
                        @error('email')
                        <p class="text-sm text-red-900">{{$message}}</p>
                        @enderror
                        <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company Email</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="url" name="web" id="web" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                               value="{{$job->web}}"/>
                        @error('web')
                        <p class="text-sm text-red-900">{{$message}}</p>
                        @enderror
                        <label for="web" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Website URL</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="tags" id="tags" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                               value="{{$job->tags}}"/>
                        @error('tags')
                        <p class="text-sm text-red-900">{{$message}}</p>
                        @enderror
                        <label for="tags" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tags</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="file" name="logo" id="logo" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                               value="{{$job->logo}}"/>
                        @error('logo')
                        <p class="text-sm text-red-900">{{$message}}</p>
                        @enderror
                        <label for="logo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company Logo</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Your message</label>
                        <textarea id="description"  name="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."
                                  value="{{$job->description}}"
                        ></textarea>
                        @error('description')
                        <p class="text-sm text-red-900">{{$message}}</p>
                        @enderror
                    </div>
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
