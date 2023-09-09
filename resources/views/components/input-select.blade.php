<select {{ $attributes->merge(['class' => 'border border-gray text-sm rounded-md block w-full px-4 py-1.5 text-veryDarkGray cursor-pointer']) }}>
    {{ $slot }}
</select>