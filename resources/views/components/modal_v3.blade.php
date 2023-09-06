@props([
    'maxWidth' => '3xl',
])

@php
$maxWidth = [
    'sm' => 'max-w-sm',
    'md' => 'max-w-md',
    'lg' => 'max-w-lg',
    'xl' => 'max-w-xl',
    '2xl' => 'max-w-2xl',
    '3xl' => 'max-w-3xl',
][$maxWidth];
@endphp


<div 
	x-cloak
	x-data="{ @entangle($attributes->wire('model')).defer }"
	x-show="show"
	x-on:keydown.escape.window="show = false"
	class="fixed inset-0 overflow-y-auto px-6 px-4 z-50">
	{{-- Backdrop --}}
	<div x-show="show" class="fixed inset-0 transform" x-on:click="show = false">
		<div class="absolute inset-0 bg-black opacity-60"></div>
	</div>

	{{-- Card --}}
	<div x-show="show" class="bg-lightGray rounded-md overflow-hidden transform w-full mx-auto my-14 {{ $maxWidth }}">
		{{-- Head --}}
		<div class="flex justify-between">
			<span class="text-lg font-bold">{{ $title ?? '' }}</span>
			<i class="fa-solid fa-xmark"></i>
		</div>
		{{-- Body --}}
		<div class="px-6 py-4">
			{{ $slot }}
		</div>
	</div>
</div>