@extends('layouts.app')

@section('content')
    <div>
        @foreach($users as $user)
            <a href="{{route('profile.show',$user->name)}}" class="flex items-center mb-6">
                <img class="mr-4" src="{{$user->avatar}}" alt="{{$user->name}}'s avatar" width="70px">
                <div><h4 class="font-bold">{{'@'.$user->name}}</h4></div>
            </a>
        @endforeach
        {{$users->links()}}
    </div>
@endsection
