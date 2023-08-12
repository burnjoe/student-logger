<div {{ $attributes->merge(['class' => 'dropdown relative']) }}>
  {{ $slot }}
</div>

{{-- Use Laravel Mix for assets --}}
@push('scripts')
<script src="{{ asset('js/dropdown.js') }}"></script>
@endpush