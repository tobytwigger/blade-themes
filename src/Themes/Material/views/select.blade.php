<div class="mdc-select mdc-select--filled demo-width-class">
    <input type="hidden" name="{{$name}}" id="{{$id}}">
    <div class="mdc-select__anchor">
        <span class="mdc-select__ripple"></span>
        <span class="mdc-floating-label mdc-floating-label--float-above">Pick a Theme</span>
        <span class="mdc-select__selected-text-container">
      <span class="mdc-select__selected-text">Material</span>
    </span>
        <span class="mdc-select__dropdown-icon">
      <svg
              class="mdc-select__dropdown-icon-graphic"
              viewBox="7 10 10 5" focusable="false">
        <polygon
                class="mdc-select__dropdown-icon-inactive"
                stroke="none"
                fill-rule="evenodd"
                points="7 10 12 15 17 10">
        </polygon>
        <polygon
                class="mdc-select__dropdown-icon-active"
                stroke="none"
                fill-rule="evenodd"
                points="7 15 12 10 17 15">
        </polygon>
      </svg>
    </span>
        <span class="mdc-line-ripple"></span>
    </div>

    <div class="mdc-select__menu demo-width-class mdc-menu mdc-menu-surface">
        <ul class="mdc-list">
            <li class="mdc-list-item" data-value="">
                <span class="mdc-list-item__ripple"></span>
            </li>
            @foreach($items as $item)
                <li class="mdc-list-item" data-value="{{ $item['value'] }}">
                    <span class="mdc-list-item__ripple"></span>
                    <span class="mdc-list-item__text">{{ $item['label'] }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@push('theme-scripts')
    <script type="text/javascript">
        const select = new mdc.select.MDCSelect(document.querySelector('.mdc-select'));
    </script>
@endpush
