<div>
    <form method="POST" action="{{ route('comments.store', ['id' => $post->id]) }}">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <p>Body: <textarea name="body" value="{{ old('body') }}"></textarea></p>
        <input type="submit" value="Add Comment">
</div>
