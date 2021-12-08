<div {{ $attributes->merge(['class' => 'wow-outer']) }} mer>
    <div class="form-wrap wow fadeSlideInUp">
        <label class="form-label-outside" for="{{ $id }}">{{ $label }}</label>
        <input
            class="form-input"
            id="{{ $id }}"
            type="{{ $type }}"
            name="{{ $name }}"
            data-constraints="@Required">
    </div>
</div>
