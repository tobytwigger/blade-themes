<div id="demo-menu" class="mdc-menu-surface--anchor">
    <button id="menu-button">Change Theme</button>
    <div class="mdc-menu mdc-menu-surface">
        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
            <li class="mdc-list-item" role="menuitem">
                <span class="mdc-list-item__ripple"></span>
                <span class="mdc-list-item__text">A Menu Item</span>
            </li>
            <li class="mdc-list-item" role="menuitem">
                <span class="mdc-list-item__ripple"></span>
                <span class="mdc-list-item__text">Another Menu Item</span>
            </li>
        </ul>
    </div>
</div>

@push('scripts')
    <script>
        const MDCFoo = mdc.foo.MDCFoo;
        const MDCFooFoundation = mdc.foo.MDCFooFoundation;
    </script>
@endpush
