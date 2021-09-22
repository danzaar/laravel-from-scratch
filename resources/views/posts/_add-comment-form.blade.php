@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-full">

                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea name=""
                          id=""
                          rows="5"
                          class="w-full text-sm focus:outline-none focus:ring"
                          placeholder="Quick, think of something to say"
                          required>
                </textarea>
            </div>

            @error('body')
            <span class="text-sm text-red">{{ $message }}</span>
            @enderror

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibolc">
        <a href="/register" class="hover:underline">Register</a>
        or
        <a href="/login" class="hover:underline">Log in to leave a comment</a>
    </p>

@endauth
