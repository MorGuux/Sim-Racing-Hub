<div style="display: table; width: 100%; align-items: center; padding: 20px; margin-top: 20px; border: 1px solid #ccc;">
    <div style="display: table-cell; width: inherit; padding-left: inherit; vertical-align: middle">
        <div style="display: inline-table">
            <a style="font-size: 16px; font-weight: bold; margin-bottom: 10px;">{{ $comment->body }}</a>
        </div>
        <div style="float: right; margin: 10px">
            <a href="{{ route('users.show', ['id' => $post->user->id]) }}"
                style="display: inherit; font-size: 16px; margin-bottom: 10px;">{{ $comment->user->name }}</a>
            <a
                style="display: inherit; font-size: 14px; margin-bottom: 10px; text-align: right">{{ $comment->created_at->diffForHumans() }}</a>
            @if ($comment->user->id == Auth::id() || Auth::user()->is_admin)
                <form method="POST" action="{{ route('comments.destroy', ['id' => $comment->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        style="display: inherit; font-size: 14px; margin-bottom: 10px; text-align: right">Delete</button>
                </form>
            @endif
        </div>
    </div>
</div>
