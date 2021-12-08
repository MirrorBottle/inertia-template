<div class="pagination d-flex justify-content-center">
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <div class="page-item {{ $paginator->currentPage() === $i ? 'active' : '' }}">
            <a class="page-link button-winona" href="{{ $paginator->url($i) }}">
                {{ $i }}
            </a>
        </div>
    @endfor
</div>
