<div>
    <div style="display: table; width: 100%; align-items: center; padding: 20px; margin-top: 20px; border: 1px solid #ccc;">
        <div style="display: table-cell; vertical-align: middle">
            <div style="display: inline-table; width: 100%">
                <form id="add-comment-form" method="POST" style="width: 100%" action="{{ route('comments.store', ['id' => $post->id]) }}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <textarea name="body" style="width: 100%">{{ old('body') }}</textarea>
                </form>
            </div>
            <div style="float: right; margin: 10px">
                <button type="submit" form="add-comment-form">Add Comment</button>
            </div>
        </div>
    </div>
</div>
