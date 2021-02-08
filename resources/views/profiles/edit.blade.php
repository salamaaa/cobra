@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h1 class="text-4xl text-gray-700">Edit Profile</h1>
    </div>

    <form action="{{route('profile.update',$user->name)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-6">
            <label class="block uppercase font-bold text-sm text-gray-500 mb-2" for="name">Name</label>
            <input id="name" name="name" type="text" class="border border-gray-400 p-2 w-full" value="{{$user->name}}">
            <span class="text-red-700">@error('name'){{$message}}@enderror</span>
        </div>
        {{--<div class="mb-6">
            <label class="block uppercase font-bold text-sm text-gray-500 mb-2" for="email">Email</label>
            <input id="email" name="email" type="email" class="border border-gray-400 p-2 w-full" value="{{$user->email}}">
            <span class="text-red-700">@error('email'){{$message}}@enderror</span>
        </div>--}}
        <div class="mb-6">
            <label class="block uppercase font-bold text-sm text-gray-500 mb-2" for="avatar">Avatar</label>
            <div class="flex">
                <input id="avatar" name="avatar" type="file" class="border border-gray-400 p-2 w-full">
                <img src="{{$user->avatar}}" alt="Your avatar" width="50px">
            </div>
            <span class="text-red-700">@error('avatar'){{$message}}@enderror</span>
        </div>
        {{-- <div class="mb-6">
             <label class="block uppercase font-bold text-sm text-gray-500 mb-2" for="password">Password</label>
             <input id="password" name="password" type="password" class="border border-gray-400 p-2 w-full">
             <span class="text-red-700">@error('password'){{$message}}@enderror</span>
         </div>
         <div class="mb-6">
             <label class="block uppercase font-bold text-sm text-gray-500 mb-2" for="password_confirmation">Confirm Password</label>
             <input id="password_confirmation" name="password_confirmation" type="password" class="border border-gray-400 p-2 w-full">
             <span class="text-red-700">@error('password'){{$message}}@enderror</span>
         </div>--}}
        <div class="text-center">
            <button type="submit"
                    class="mr-5 bg-green-800 hover:bg-green-700 hover:shadow-2xl text-lg text-white px-5 py-3 rounded-md">
                Edit
            </button>
            <a class="hover:underline" href="{{route('profile.show',$user->name)}}">Cancel</a>
        </div>
    </form>

@endsection
