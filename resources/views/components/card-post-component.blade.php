<div class="max-w-sm mb-5 bg-white border border-gray-200 rounded-lg shadow-md">
    <a href="{{ route('app_postshow', $post->id) }}" class="min-h-[100px] overflow-hidden">
        <img class="rounded-t-lg"
            src="{{ Storage::disk('public')->exists($post->image->path) ? Storage::url($post->image->path) : url($post->image->path) }}"
            alt="{{ $post->title }}">
    </a>

    <div class="p-5">
        <div class="flex items-center justify-between mb-3">
            <small class="mb-3 text-sm text-gray-400">{{ count($post->comments) }} Commentaires</small>

            <small class="mb-3 text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</small>
        </div>
        <div class="flex items-center">
            @forelse ($post->tags as $tag)
                <small class="p-1 m-1 mb-3 text-sm text-gray-600 bg-blue-400 rounded"><a href="#">{{ $tag->name }}</a>
                </small>
            @empty

                <small class="p-1 mb-3 text-sm text-gray-600 bg-gray-400 rounded">Pas de tas</small>
            @endforelse
        </div>
        <a href="{{ route('app_postshow', $post->id) }}">
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $post->title }}</h2>
        </a>
        <p class="mb-3 font-normal text-gray-700">
            @if (strlen($post->content) > 150)
                {{ substr($post->content, 0, 150) }}...<a href="{{ route('app_postshow', $post->id) }}"
                    class="text-blue-300">Voir plus</a>
            @else
                {{ $post->content }}
            @endif
        </p>

        <a class="inline-flex items-center px-3 py-2 mt-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300"
            href="{{ route('app_postshow', $post->id) }}">
            Read more
        </a>
    </div>

</div>
