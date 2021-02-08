@extends('layouts.app')

@section('content')
    <header class="mb-6 relative">
        <img class="mb-4" src="{{asset('img/1.png')}}" alt="Cover Image">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="font-bold text-2xl mb-0" style="max-width: 130px">
                    {{$user->name}}
                </h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>

            <div class="flex">
                @if(auth()->id() == $user->id)
                    <a href="{{route('profile.edit',$user->name)}}"
                       class="text-black rounded-full text-sm shadow py-2 px-4 font-bold"
                    >Edit Profile
                    </a>
                @endif
                @if(auth()->id() !== $user->id)
                    @if(!auth()->user()->isFriend($user))
                        <form action="{{route('user.add.friend',$user->name)}}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="bg-green-500 rounded-full text-sm shadow py-2 px-4 text-white font-bold"
                            >Add Friend
                            </button>
                        </form>
                    @else

                        <a href="{{route('user.delete.friend',$user->name)}}"
                           class="bg-green-500 rounded-full text-sm shadow py-2 px-4 text-white font-bold"
                        >Friends
                        </a>
                    @endif
                @endif
            </div>
        </div>
        <p class="text-sm">
            fgyeygufeiwegoyugweufewhgigehwuygfowe
            hiuwefgfuiehgfiufgighguihwefwgweuywguy
            fqwehgbhfewgbvuywgbuiwergbferughwuigru
            ughiurgbuiwghirweughreuherwiuhreuuiewr.
        </p>
        <img src="{{$user->avatar}}"
             alt="Profile Picture"
             class="rounded-full mr-2 absolute"
             style="width: 150px;left: calc(50% - 75px);top: 138px">
    </header>
    @include('cobra.timeline_bottom',['posts'=>$posts])
@endsection
