<li class="px-3 py-3 hover:bg-gray-100">
    <a @if (\Route::has($item->slug)) href="{{ route($item->slug) }}"                 
        @else
            href="{{ $item->link }}"                  
        @if (\Str::contains($item->link, 'http'))
        target="_blank" @endif
        @endif
        >{{ $item->name }}</a>
</li>
