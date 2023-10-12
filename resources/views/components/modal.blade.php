@props([
    'name',
    'title',
    'show' => false,
    'maxWidth' => '5xl'
])

@php
$maxWidth = [
    'sm' => 'max-w-sm',
    'md' => 'max-w-md',
    'lg' => 'max-w-lg',
    'xl' => 'max-w-xl',
    '2xl' => 'max-w-2xl',
    '3xl' => 'max-w-3xl',
    '4xl' => 'max-w-4xl',
    '5xl' => 'max-w-5xl',
    '6xl' => 'max-w-6xl',
][$maxWidth];
@endphp

<div
    x-cloak
    x-data="{
        show: @js($show),
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window = "show = false"
    {{-- x-on:close.stop="show = false" --}}
    {{-- x-on:keydown.escape.window="show = false" --}}
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    class="fixed inset-0 overflow-y-auto px-4 py-6 z-50"
>
    {{-- Backdrop --}}
    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        x-on:click="show = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-black opacity-60"></div>
    </div>

    {{-- Modal --}}
    <div
        x-show="show"
        class="mx-auto my-6 bg-white rounded-md overflow-hidden shadow-lg transform transition-all sm:w-full {{ $maxWidth }}"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 sm:scale-95"
        x-transition:enter-end="opacity-100 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 sm:scale-100"
        x-transition:leave-end="opacity-0 sm:scale-95"
        >
        {{-- Header --}}
        <div class="flex justify-between bg-green px-6 py-4">
            <span class="text-white text-lg font-bold">{{ $title ?? '' }}</span>
            <button 
                @click="show = false" 
                class="text-gray transition-all hover:text-lightGray">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        {{-- Body --}}
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</div>
