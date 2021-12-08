<form
    method="post"
    class="rd-form rd-mailform"
    data-form-output="form-output-global"
    data-form-type="contact"
    method="post"
    action="{{ route($action) }}">
    @csrf

    {{ $slot }}
</form>
