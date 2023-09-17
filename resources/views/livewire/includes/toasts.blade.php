<div>
    {{-- Information Toast --}}
	@if(session('message'))
        <x-toast alert="info">
            {{ session('message') }}
        </x-toast>
    @endif

    {{-- Success Toast --}}
	@if(session('success'))
        <x-toast alert="success">
            {{ session('success') }}
        </x-toast>
    @endif

    {{-- Warning Toast --}}
    @if(session('warning'))
        <x-toast alert="warning">
            {{ session('warning') }}
        </x-toast>
    @endif

    {{-- Danger Toast --}}
    @if(session('danger'))
        <x-toast alert="danger">
            {{ session('danger') }}
        </x-toast>
    @endif
</div>
