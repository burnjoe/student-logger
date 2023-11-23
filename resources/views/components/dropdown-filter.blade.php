@props([
    'align' => 'right',
    'width' => 'fit',
    'menuWidth',
    'contentClasses' => 'p-1.5 bg-white',
])
@php
   switch ($align) {
       case 'left':
           $alignmentClasses = 'origin-top-left left-0';
           break;
       case 'top':
           $alignmentClasses = 'origin-top';
           break;
       case 'right':
       default:
           $alignmentClasses = 'origin-top-right right-0';
           break;
   }
   switch ($width) {
       case '48':
           $width = 'w-48';
           break;
       case 'fit':
       default:
           $width = 'w-fit';
           break;
   }
   switch ($menuWidth) {
       case '44':
           $menuWidth = 'w-44';
           break;
       case '100%':
           $menuWidth = 'w-100%';
           break;
       default:
           break;
   }
@endphp
<div x-cloak class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
   <div @click="open = ! open">
      {{ $trigger }}
   </div>
   <div x-show="open"
      class="dropdown-menu absolute {{ $menuWidth ?? $width }} mt-2 rounded-md shadow-lg text-darkGray ring-1 ring-black ring-opacity-5 {{ $alignmentClasses }}"
      style="display: none;" @click="open = true">
      <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
         {{ $content }}
      </div>
   </div>
</div>
