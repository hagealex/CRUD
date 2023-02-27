{{-- html5 color input --}}
@php
$value = old_empty_or_null($field['name'], '') ??  $field['value'] ?? $field['default'] ?? '';
@endphp


@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')

    <div class="input-group">
        @if(isset($field['prefix'])) <div class="input-group-prepend"><span class="input-group-text">{!! $field['prefix'] !!}</span></div> @endif
        <input
            type="text"
            name="{{ $field['name'] }}"
            value="{{ $value }}"
            pattern="#[0-9a-f]{6}"
            maxlength="7"
            data-init-function="bpFieldInitColorElement"
            @include('crud::fields.inc.attributes')
        />
        <div class="input-group-append">
            <span class="input-group-text">
                <input
                    type="color"
                    value="{{ $value }}"
                />
            </span>
        </div>
        @if(isset($field['suffix'])) <div class="input-group-append"><span class="input-group-text">{!! $field['suffix'] !!}</span></div> @endif
    </div>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')


@push('crud_fields_styles')
    @bassetBlock('backpack/crud/fields/color.css')
    <style>
        [bp-field-name="color"] input[type="color"] {
            background-color: unset;
            border: 0;
            width: 1.8rem;
            height: 1.8rem;
        }
        [bp-field-name="color"] .input-group-text {
            padding: 0 0.4rem;
        }
    </style>
    @endBassetBlock
@endpush


@push('crud_fields_scripts')
    @bassetBlock('backpack/crud/fields/color.js')
    <script>
        function bpFieldInitColorElement(element) {
            let inputText = element[0];
            let inputColor = inputText.nextElementSibling.querySelector('input');

            inputText.addEventListener('input', () => inputText.value = inputColor.value = '#' + inputText.value.replace(/[^\da-f]/gi, '').toLowerCase());
            inputColor.addEventListener('input', () => inputText.value = inputColor.value);
        }
    </script>
    @endBassetBlock
@endpush