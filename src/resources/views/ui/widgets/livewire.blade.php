@php
    // defaults; backwards compatibility with Backpack 4.0 widgets
    $widget['wrapper']['class'] = $widget['wrapper']['class'] ?? $widget['wrapperClass'] ?? 'col-sm-6 col-lg-3';
@endphp

@includeWhen(!empty($widget['wrapper']), backpack_view('widgets.inc.wrapper_start'))

<div class="{{ $widget['class'] ?? 'card' }}" @foreach($widget['attributes'] ?? [] as $key => $value) {{ $key }}="{{ $value }}" @endforeach>
    @livewire($widget['content'], $widget['parameters'] ?? [])
</div>

@includeWhen(!empty($widget['wrapper']), backpack_view('widgets.inc.wrapper_end'))

@bassetBlock('livewire-styles.css')
@push('after_styles')
    @livewireStyles
@endpush
@endBassetBlock

@bassetBlock('livewire-scripts.js')
@push('after_scripts')
    @livewireScripts
@endpush
@endBassetBlock
