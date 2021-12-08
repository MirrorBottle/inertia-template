<div class="swiper-slide" data-slide-bg="{{ asset($img) }}">
    <div class="slide-inner">
        <div class="swiper-slide-caption">
            <div class="container">
                <div class="heading-6 wow-outer">
                    <span class="wow" data-caption-animate="slideInUp">{{ $small }}</span>
                </div>
                <h1 class="wow-outer">
                    <span class="wow" data-caption-animate="slideInDown">{{ $title }}</span>
                </h1>
                <div class="swiper-caption-text">
                    <div class="swiper-caption-text-decoration wow" data-caption-animate="scaleInVertical">
                    </div>
                    <div class="swiper-caption-text-inner">
                        <p class="big wow" data-caption-animate="slideInLeft">
                            {{ $caption }}
                        </p>
                    </div>
                </div>
                @if ($href !== '')
                    <div class="button-outer">
                        <a
                            class="button button-lg button-primary button-winona wow"
                            href="{{ $href !== '#' ? url($href) : '#' }}"
                            data-caption-animate="slideInUp">
                            Selengkapnya
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
