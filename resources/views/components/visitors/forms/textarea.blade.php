<div class="col-12 wow-outer">
    <div class="form-wrap wow fadeSlideInUp">
        <label class="form-label-outside" for="{{ $id }}">{{ $label }}</label>
        <textarea
            class="form-input"
            id="{{ $id }}"
            name="{{ $name }}"
            data-constraints="@Required"></textarea>
    </div>
</div>
