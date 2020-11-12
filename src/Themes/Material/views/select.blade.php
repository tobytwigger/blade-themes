<div id="demo-menu" class="mdc-menu-surface--anchor">
    <x-su-button id="menu-open-btn">Open Menu</x-su-button>
    <div class="mdc-menu mdc-menu-surface">
        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
            @foreach($items as $item)
                <li class="mdc-list-item" role="menuitem">
                    <span class="mdc-list-item__ripple"></span>
                    <span class="mdc-list-item__text">{{$item['label']}}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@push('theme-scripts')
    <script type="text/javascript">
        let menu = new mdc.menu.MDCMenu.attachTo(document.querySelector('.mdc-menu'));
        document.querySelector('#menu-open-btn').addEventListener('click', function () {
            menu.open = true;
        })
    </script>
@endpush
