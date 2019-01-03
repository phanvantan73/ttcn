<ul class="dropdown-menu" style="display: block; position: relative;">
    @forelse ($stories as $story)
        <li>
            <a href="{{ route('detail.stories', $story->id) }}">{{ $story->name }}</a>
        </li>
    @empty
    @endforelse
</ul>
