<x-layout>
    @include ('posts._header')
     <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

         @if ($posts->count() )

         <x-card-grid :posts="$posts"></x-card-grid>

            {{-- You can call this method when you use Paginate() to provide Tailwind made links to your page --}}
          {{ $posts->links() }}

        @else
            <p class="text-center">No posts yet. Please check back later.</p>
        @endif
    </main>

</x-layout>

