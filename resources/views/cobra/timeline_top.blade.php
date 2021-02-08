<div class="border border-green-500 rounded-lg px-8 py-6 mb-8">
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <textarea name="body"
                  class="w-full border-white focus:outline-none focus:ring focus:border-gray-100 ..."
        >
        </textarea>
        <span class="text-red-700">@error('body') {{$message}} @enderror</span>
        <hr class="my-4">
        <footer class="flex justify-between">
            <img src="{{auth()->user()->avatar}}"
                 alt=""
                 class="rounded-full mr-2"
                 width="50px"
                 height="50px"
            >
            <button type="submit"
                    class="bg-green-500 rounded-lg shadow py-2 px-2 text-white"
            >Submit
            </button>
        </footer>

    </form>
</div>
