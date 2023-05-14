<div style="display: table; width: 100%; align-items: center; padding: 20px; margin-top: 20px; border: 1px solid #ccc;">
    <img src="https://picsum.photos/200/150?random={{ $post->id }}" alt="Article Image"
        style="display: table-cell; width: 7.5rem; max-width: 7.5rem;">
    <div style="display: table-cell; width: inherit; padding-left: inherit; vertical-align: middle">
        <div style="display: inline-table">
            <div>
                <a style="font-size: 14px; margin-bottom: 10px;">{{ $post->car->name }} - {{ $post->track->name }}</a>
            </div>
            <a href="{{ route('posts.show', ['id' => $post->id]) }}"
                style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">{{ $post->title }}</a>
            <div>
                @foreach ($post->tags as $tag)
                    <a style="font-size: 16px; margin-right: 10px;">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
        <div style="float: right; margin: 10px">
            <a href="{{ route('users.show', ['id' => $post->user->id]) }}"
                style="display: inherit; font-size: 16px; margin-bottom: 10px;">{{ $post->user->name }}</a>
            <a
                style="display: inherit; font-size: 14px; margin-bottom: 10px; text-align: right">{{ $post->created_at->diffForHumans() }}</a>
        </div>
    </div>
</div>
