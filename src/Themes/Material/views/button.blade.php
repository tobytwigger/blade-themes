<div class="mdc-touch-target-wrapper">
    <button class="mdc-button mdc-button--touch mdc-button--raised">
        <div class="mdc-button__ripple"></div>
        <span class="mdc-button__label">{{ $slot }}</span>
        <div class="mdc-button__touch"></div>
    </button>
</div>

@push('theme-scripts')
    <script type="text/javascript">
        const buttonRipple = new mdc.ripple.MDCRipple(document.querySelector('.mdc-button'));
    </script>
@endpush
