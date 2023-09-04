<x-app-layout>
  <div class="flex flex-col space-y-6">
    <x-card shadow="shadow-sm" padding="p-6">
      Statistics, Total Number of Students
    </x-card>
  
    {{-- Search, Filter, Actions, and Table --}}

    <div>
      <x-input-text class="max-w-xs" alignIcon="left" placeholder="Search">
        <i class="fa-solid fa-magnifying-glass"></i>
      </x-input-text>
    </div>

    <x-table>
      <x-slot name="head">
        <th class="px-6 py-4">Student No.</th>
        <th class="px-6 py-4">Last Name</th>
        <th class="px-6 py-4">First Name</th>
        <th class="px-6 py-4">Middle Name</th>
        <th class="px-6 py-4">Action</th>
      </x-slot>
      <x-slot name="data">
        @foreach ($students as $student)
          <tr class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
            <td class="px-6 py-4">{{ $student->student_no }}</td>
            <td class="px-6 py-4">{{ $student->last_name }}</td>
            <td class="px-6 py-4">{{ $student->first_name }}</td>
            <td class="px-6 py-4">{{ $student->middle_name ?? "N/A" }}</td>
            <td class="px-6 py-4 text-md flex space-x-4">
              <a href="">
                <i class="fa-solid fa-eye text-veryDarkGray hover:text-darkGray"></i>
              </a>
              <a href="">
                <i class="fa-solid fa-pen-to-square text-veryDarkGray hover:text-darkGray"></i>
              </a>
              <a href="">
                <i class="fa-solid fa-trash text-red hover:text-lightRed"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </x-slot>
    </x-table>
  </div>
</x-app-layout>
