<div class="col-md-6 scaleFadeInWrap justify-content-center">
    <!-- Post Modern-->
    <div class="wow scaleFadeIn">
        <article class="post-modern">
            <a
                class="post-modern-media"
                href="{{ route('home.blog', [$blog->slug]) }}">
                <img src="{{ asset('storage/images/blogs/'. $blog->image) }}" alt="{{ $blog->slug }}" />
            </a>

            <h4 class="post-modern-title">
                <a
                    class="underlined"
                    href="{{ route('home.blog', [$blog->slug]) }}">
                    {{ $blog->title }}
                </a>
            </h4>

            <ul class="post-modern-meta">
                <li>by {{ $blog->user->name }}</li>
                <li>
                    <time datetime="2020">{{ $blog->created_at->format('M d, Y - H:i A') }}</time>
                </li>
                <li>
                    <a class="button-winona accent-dark-link" href="{{ route('home.category', [$blog->category->slug]) }}">
                        {{ $blog->category->name }}
                    </a>
                </li>
            </ul>

            <p>
                {{ $blog->excerpt }}
            </p>
        </article>
    </div>
</div>
