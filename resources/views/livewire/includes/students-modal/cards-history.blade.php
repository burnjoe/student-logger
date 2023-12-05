@if(isset($selectedStudent->cards))

<div>

    <div class="flex flex-wrap px-5 pt-2.5">
        {{-- Student Number --}}
        <div class="w-full md:w-1/2">
            <small class="font-normal text-darkGray" style="font-size: 65%;">Student Number</small>
            <h6 class="text-1rem font-medium leading-5 mb-2">{{ $selectedStudent->student_no }}</h6>
        </div>
        {{-- Student Name --}}
        <div class="w-full md:w-1/2">
            <small class="font-normal text-darkGray" style="font-size: 65%;">Student</small>
            <h6 class="text-1rem font-medium leading-5 mb-2">{{ $selectedStudent->last_name.',
                '.$selectedStudent->first_name }}</h6>
        </div>
    </div>

    <div class="mt-4 px-5">
        <x-table>
            @slot('head')
            <th class="px-6 py-4">Photo</th>
            <th class="px-6 py-4">Issued At</th>
            <th class="px-6 py-4">Expires At</th>
            <th class="px-6 py-4">Status</th>
            @endslot

            @slot('data')
            @foreach ($selectedStudent->cards as $card)
            <tr wire:key="{{ $card->id }}"
                class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                <td class="px-6 py-4">Photo Here</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($card->expires_at)->subYears(2)->format('M. j, Y') }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($card->expires_at)->format('M. j, Y') }}</td>
                <td class="px-6 py-4">
                    @if($card->expires_at < now())
                    <x-badge class="bg-red text-white">EXPIRED</x-badge>
                    @else
                    <x-badge class="bg-green text-white">ACTIVE</x-badge>
                    @endif
                </td>
            </tr>
            @endforeach
            @endslot
        </x-table>
    </div>

    {{-- Close button --}}
    <div class="flex justify-end items-center mt-4 pe-5">
        <x-button x-on:click="$dispatch('close-modal')" btnType="secondary" wire:loading.attr="disabled">Close
        </x-button>
    </div>
</div>

@endif