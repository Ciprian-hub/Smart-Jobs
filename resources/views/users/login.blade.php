@extends('layout')

@section('content')
    <section class="mx-auto w-[500px]">
        <div class="pt-6 w-full">
            <div class="w-full mx-auto space-y-8 sm:p-8 bg-white rounded-lg shadow-xl">
                <h2 class="text-2xl font-bold text-black">
                    Log in to your account
                </h2>
                <form class="mx-auto" method="post" action="/users/auth" enctype="multipart/form-data">
                    @csrf
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                        />
                        @error('email')
                        <p class="text-sm text-red-900">{{$message}}</p>
                        @enderror
                        <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                        />
                        @error('password')
                        <p class="text-sm text-red-900">{{$message}}</p>
                        @enderror
                        <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                    </div>
                    <p>
                        <a href="/login" class="text-laravel">Don't have an account? Register now</a>
                    </p>
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign in</button>
                </form>
            </div>
        </div>
    </section>
@endsection
