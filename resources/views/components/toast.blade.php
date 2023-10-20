@props([
    'shadow' => 'shadow-none',
    'align' => 'bottom-right',
    'alert' => 'info',
])

@php 
  	switch ($align) {
		case 'top-left':
			$alignmentClasses = "top-8 left-8";
			break;
		case 'top-right':
			$alignmentClasses = "top-8 right-8";
			break;
		case 'bottom-left':
			$alignmentClasses = "bottom-8 left-8";
			break;
		case 'bottom-right':
		default:
			$alignmentClasses = "bottom-8 right-8";
  }

	switch ($alert) {
		case 'success':
			$bgColor = "bg-green";
			break;
		case 'warning':
			$bgColor = "bg-orange";
			break;
		case 'danger':
			$bgColor = "bg-red";
			break;
		case 'info':
		default:
			$bgColor = "bg-blue";
	}
@endphp

<x-card 
	x-data="{ open: false }" 
	x-show="open" 
	x-init="setTimeout(() => open = false, 3000)" 
	x-on:open-toast.window="show = true"
	{{-- x-transition:enter="ease-out duration-300"
	x-transition:enter-start="opacity-0"
	x-transition:enter-end="opacity-100"
	x-transition:leave="ease-in duration-200"
	x-transition:leave-start="opacity-100"
	x-transition:leave-end="opacity-0" --}}
	{{ $attributes->merge(['class' => 'max-w-sm absolute z-100 fixed flex flex-row space-x-4 text-white ' .$alignmentClasses]) }} 
	bgColor="{{ $bgColor }}" 
	shadow="{{ $shadow }}" 
	padding="px-5 py-4">
	<div class="flex justify-center items-center text-2xl">
		@switch($alert)
		@case('success')
			<i class="fa-solid fa-circle-check"></i>
			@break
		@case('warning')
			<i class="fa-solid fa-triangle-exclamation"></i>
			@break
		@case('danger')
			<i class="fa-solid fa-circle-xmark"></i>
			@break
		@case('info')
		@default
			<i class="fa-solid fa-circle-info"></i>
		@endswitch
	</div>
	<div class="flex justify-center items-center text-sm">
		{{ $slot }}
	</div>
	<button @click="open = false" class="flex justify-center items-center transition-all focus:outline-none hover:text-gray">
		<i class="fa-solid fa-xmark"></i>
	</button>
</x-card>