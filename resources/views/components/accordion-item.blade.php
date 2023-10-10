@props([
    'itemId' => 1,
    'headerClasses' => 'bg-white',
    'contentClasses' => 'bg-white',
    'showIndicator' => true,
])

<div {{ $attributes->merge(['class' => 'w-full rounded-lg']) }}>
    <!-- Header -->
    <div @click="selected = selected != {{ $itemId }} ? {{ $itemId }} : null"
        class="flex justify-between items-center px-4 py-3  {{$headerClasses}} transition-all hover:cursor-pointer"
        :class="(selected == {{ $itemId }} ? 'rounded-t-lg' : 'delay-200 rounded-lg')">
        {{ $header ?? "" }}
        @if($showIndicator)
            <i class="fa-solid fa-angle-right fa-2xs transition-all duration-300"
            x-bind:class="selected == {{ $itemId }} ? 'transform rotate-90' : null"></i>
        @endif
    </div>

    <!-- Content -->
    <div class="max-h-0 overflow-hidden transition-all duration-300 rounded-b-lg {{$contentClasses}}" 
        x-ref="tab{{$itemId}}"
        :style="selected == {{ $itemId }} ? 'max-height: ' + $refs['tab' + {{ $itemId }}].scrollHeight + 'px;' : null">
        <div>
            {{ $content }}
        </div>
    </div>
</div>