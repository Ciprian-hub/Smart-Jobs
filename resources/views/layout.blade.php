<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />

    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js"
        defer
    ></script>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
</head>
<body>
<nav class="bg-white w-full z-20 top-0 left-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 border-b border-gray-10">
        <a href="/" class="flex items-center">
            <img src="/images/logo.png" class="h-8 mr-3" alt="smart Logo">
        </a>
        <div class="flex md:order-2 items-center">
            @auth()
                @if(auth()->user()->user_type == 'seeker')
                    <div class="relative ml-3">
                        <li x-data="{open: false}" class="relative list-none">
                            <a @click="open = !open" class="cursor-pointer">
                                <img class="h-8 w-8 rounded-full"
                                     src="{{$user->profile_image ? asset('storage/' . $user->profile_image) : "/images/dummy.jpeg"}}"
                                     alt="">
                            </a>
                            <ul x-show="open"
                                x-cloak
                                x-transition
                                @click.outside="open = false"
                                class="absolute z-10 right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg"

                            >
                                <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">
                                    <a href="{{route('edit.profile')}}">Edit Profile</a>
                                </li>
                                <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">
                                    <a href="{{route('jobs.manage')}}">Applies</a>
                                </li>
                                <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">
                                    <form action="/logout" method="post" class="flex items-center">
                                        @csrf
                                        <button type="submit" class="flex items-center">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </div>
                    <a href="{{route('jobs.create')}}"
                       class=" ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Find a Job
                    </a>
                @else
                    <div class="relative ml-3">
                        <li x-data="{open: false}" class="relative list-none">
                            <a @click="open = !open" class="cursor-pointer">
                                <img class="h-8 w-8 rounded-full"
                                     src="{{$user->profile_image ? asset('storage/' . $user->profile_image) : "/images/dummy.jpeg"}}"
                                     alt="">
                            </a>
                            <ul x-show="open"
                                x-cloak
                                x-transition
                                @click.outside="open = false"
                                class="absolute z-10 right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg"

                            >
                                <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">
                                    <a href="{{route('edit.profile')}}">Edit Profile</a>
                                </li>
                                <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">
                                    <a href="{{route('jobs.manage')}}">Your Jobs</a>
                                </li>
                                <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">
                                    <form action="/logout" method="post" class="flex items-center">
                                        @csrf
                                        <button type="submit" class="flex items-center">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </div>
                    <a href="{{route('jobs.create')}}"
                       class=" ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Post a Job
                    </a>
                @endif
            @else()
                <a href="/register"
                   class="inline-flex justify-center items-center mr-3 py-1 px-5 font-sm text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    Register
                </a>
                <a href="/login"
                   class="inline-flex justify-center items-center py-1 px-5 font-sm text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100">
                    Sign In
                </a>
            @endauth
            <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:border-gray-700">
                <li>
                    <a href="/"
                       class="block py-2 pl-3 pr-4 text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0"
                       aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{route('about')}}"
                       class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">About</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Services</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 min-h-[80vh]">
    @yield('content')
    <footer class="bg-white w-full rounded-lg shadow my-4">
        <div class="mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/"
                                                                                      class="hover:underline">SmartJobs™</a>. All Rights Reserved.
    </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>
</div>
<x-flash-message/>


</body>
</html>
