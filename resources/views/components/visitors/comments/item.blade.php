<div class="comment-classic-group">
    <!-- Comment Classic-->
    <article class="comment-classic">
        <figure class="comment-classic-figure">
            <img
                class="comment-classic-image"
                src="{{ asset($comment['image']) }}"
                alt=""
                width="48"
                height="48"/>
        </figure>
        <div class="comment-classic-main">
            <p class="comment-classic-name">{{ $comment['name'] }}</p>
            <div class="comment-classic-text">
                <p>{{ $comment['message'] }}</p>
            </div>
            <ul class="comment-classic-meta">
                <li>
                    <time datetime="2020">{{ $comment['date'] }}</time>
                </li>
                <li><a class="comment-classic-reply" href="#" aria-label="reply"></a></li>
            </ul>
        </div>
    </article>

    @if (count($comment['childs']) >= 1)
        @foreach ($comment['childs'] as $child)
            <div class="comment-classic-group">
                <!-- Comment Classic-->
                <article class="comment-classic">
                    <figure class="comment-classic-figure">
                        <img
                            class="comment-classic-image"
                            src="{{ asset($child['image']) }}"
                            alt=""
                            width="48"
                            height="48"
                        />
                    </figure>
                    <div class="comment-classic-main">
                        <p class="comment-classic-name">{{ $child['name'] }}</p>
                        <div class="comment-classic-text">
                            <p>{{ $child['message'] }}</p>
                        </div>
                        <ul class="comment-classic-meta">
                            <li>
                                <time datetime="2020">{{ $child['date'] }}</time>
                            </li>
                            <li><a class="comment-classic-reply" href="#" aria-label="reply"></a></li>
                        </ul>
                    </div>
                </article>
            </div>
        @endforeach
    @endif
</div>
