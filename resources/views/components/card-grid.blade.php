<x-featured-card :post="$posts->first()"></x-featured-card>
@if ($posts->count() > 1 )
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
            <x-card
                :post="$post"
                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"></x-card>
        @endforeach
    </div>
@endif
