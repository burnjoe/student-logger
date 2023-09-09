@props([
	'name',
	'title' => '',
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
	x-data="{ show: false, name: '{{ $name }}' }"
	x-show="show"
	x-on:open-modal.window = "show = (event.detail.name === name)"
	x-on:close-modal.window = "show = false"
	x-on:keydown.escape.window="show = false"
	class="fixed inset-0 overflow-y-auto mt-0 px-6 py-4 z-50">
	{{-- Backdrop --}}
	<div x-on:click="show = false" class="fixed inset-0 transform">
		<div class="absolute inset-0 bg-black opacity-60"></div>
	</div>

	{{-- Card --}}
	<div class="bg-lightGray rounded-md overflow-hidden transform w-full mx-auto my-14 px-6 py-4 {{ $maxWidth }}">
		{{-- Head --}}
		<div class="flex justify-between">
			<span class="text-lg font-bold">{{ $title }}</span>
			<button x-on:click="$dispatch('close-modal')" class="text-darkGray hover:text-black">
				<i class="fa-solid fa-xmark"></i>
			</button>
		</div>
		{{-- Body --}}
		<div>
			{{ $slot }}
		</div>
	</div>
</div>