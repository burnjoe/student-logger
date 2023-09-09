@props([
    'textColor' => 'text-white',
    'textSize' => 'text-sm',
    'rounded' => 'rounded-full',
    'element' => 'button',
    'btnType' => 'primary',
])

@php 
  switch ($btnType) {
    case 'secondary':
      $bgClasses = 'bg-darkGray hover:bg-gray';
      break;
    case 'success':
      $bgClasses = 'bg-green hover:bg-lightGreen';
      break;
    case 'primary':
    default:
      $bgClasses = 'bg-blue hover:bg-lightBlue';
      break;
  }
@endphp

@if($element == 'a')
  <a {{ $attributes->merge(['class' => 'px-6 py-2 ' .$rounded. ' transition-all ' .$textColor. ' ' .$bgClasses. ' ' .$textSize]) }}>
    {{ $slot }}
  </a>
@else
  <button {{ $attributes->merge(['class' => 'px-6 py-2 ' .$rounded. ' transition-all ' .$textColor. ' ' .$bgClasses. ' ' .$textSize]) }}>
    {{ $slot }}
  </button>
@endif
