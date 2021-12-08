<div class="col-sm-6 col-lg-4 wow-outer">
    <!-- Pricing Minimal-->
    <article class="pricing-minimal wow slideInRight bg-white border-white">
        <h5 class="pricing-minimal-title">
            <a href="{{ $href !== '#' ? route($href, [$slug]) : '' }}">
                {{ $name }}
            </a>
        </h5>
        <p>{{ $address }}</p>
        <a
            class="button button-primary button-sm mt-3"
            href="{{ $href !== '#' ? route($href, [$slug]) : '' }}">
            Selengkapnya
        </a>
    </article>
</div>
