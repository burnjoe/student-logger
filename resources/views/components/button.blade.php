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
      $bgClasses = 'bg-darkGray disabled:bg-veryDarkGray hover:bg-gray active:bg-veryDarkGray focus:outline-none focus:ring focus:ring-gray';
      break;
    case 'success':
      $bgClasses = 'bg-green disabled:bg-darkGreen hover:bg-lightGreen active:bg-darkGreen focus:outline-none focus:ring focus:ring-lightGreen';
      break;
    case 'warning':
      $bgClasses = 'bg-orange disabled:bg-darkOrange hover:bg-lightOrange active:bg-darkOrange focus:outline-none focus:ring focus:ring-lightOrange';
      break;
    case 'danger':
      $bgClasses = 'bg-red disabled:bg-darkRed hover:bg-lightRed active:bg-darkRed focus:outline-none focus:ring focus:ring-lightRed';
      break;
    case 'primary':
    default:
      $bgClasses = 'bg-blue disabled:bg-darkBlue hover:bg-lightBlue active:bg-darkBlue focus:outline-none focus:ring focus:ring-lightBlue';
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
