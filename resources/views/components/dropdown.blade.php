<div {{ $attributes->merge(['class' => 'dropdown relative']) }}>
  {{ $slot }}
</div>

{{-- Use Laravel Mix for assets --}}
@push('scripts')

@endpush