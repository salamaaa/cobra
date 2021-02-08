<h3 class="font-bold text-xl mb-4">Friends</h3>
<ul>
    @forelse(auth()->user()->friends as $friend)
        <li class="mb-4">
            <div class="flex items-center text-sm">
                <a href="{{route('profile.show',$friend)}}">
                    <img src="{{$friend->avatar}}"
                         alt="friend photo"
                         class="rounded-full mr-2"
                         height="40px"
                         width="40px">
                </a>
                {{$friend->name}}
            </div>
        </li>
        @empty
        <li>No Friends yet</li>
    @endforelse
</ul>
