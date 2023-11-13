@extends('layout')

@section('content')
    <section class="mx-auto w-[500px]">
        <div class="pt-6 w-full">
            <div class="w-full mx-auto space-y-8 sm:p-8 bg-white rounded-lg shadow-xl">
                <h2 class="text-2xl font-bold text-black">
                    Update your {{$user->user_type}} profile
                </h2>
                <form class="mx-auto" method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                                value="{{$user->name}}"/>
{{--                        @error('name')--}}
{{--                        <p class="text-sm text-red-900">{{$message}}</p>--}}
{{--                        @enderror--}}
                        <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                               value="{{$user->email}}"/>
{{--                        @error('email')--}}
{{--                        <p class="text-sm text-red-900">{{$message}}</p>--}}
{{--                        @enderror--}}
                        <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="file" name="profile_image" id="profile_image" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
                               value="{{$user->profile_image}}"/>
                        <img id="preview" src="{{$user->profile_image ? asset('storage/' . $user->profile_image) : "/images/dummy.jpeg"}}" alt="your image" class="mt-3" style="height:100px; width:auto;"/>

                        <label for="profile_image" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Upload a photo</label>
                    </div>
                    <button class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update profile</button>
                </form>
            </div>
        </div>
    </section>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
        $('#profile_image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview').attr('src', e.target.result);
                console.log(e.target.result)
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>


