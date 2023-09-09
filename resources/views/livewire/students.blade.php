<div>
	<div class="flex justify-between">
		@include('livewire.includes.search')

		<x-button x-on:click="$dispatch('open-modal', 'create-student')" btnType="success" class="flex space-x-2 items-center">
			<i class="fa-solid fa-plus"></i>
			<span>Add Student</span>
		</x-button>
	</div>
	
	<x-table class="mt-4">
		@slot('head')
			<th class="px-6 py-4">Student No.</th>
			<th class="px-6 py-4">Last Name</th>
			<th class="px-6 py-4">First Name</th>
			<th class="px-6 py-4">Middle Name</th>
			<th class="px-6 py-4">Action</th>
		@endslot

		@slot('data')
			@foreach ($students as $student)
				<tr wire:key="{{ $student->id }}" class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
					<td class="px-6 py-4">{{ $student->student_no }}</td>
					<td class="px-6 py-4">{{ $student->last_name }}</td>
					<td class="px-6 py-4">{{ $student->first_name }}</td>
					<td class="px-6 py-4">{{ $student->middle_name ?? "N/A" }}</td>
					<td class="px-6 py-4 text-md flex space-x-4">
						<button class="text-veryDarkGray hover:text-darkGray">
							<i class="fa-solid fa-eye"></i>
						</button>
						<button class="text-veryDarkGray hover:text-darkGray">
							<i class="fa-solid fa-pen-to-square"></i>
						</button>
						<button class="text-red hover:text-lightRed">
							<i class="fa-solid fa-trash"></i>
						</button>
					</td>
				</tr>
			@endforeach			
		@endslot
	</x-table>

	<div class="mt-4">
		{{ $students->links() }}
	</div>

	{{-- Create Student Form --}}
    <x-modal name="create-student" title="Add Student">
		<form wire:submit="save">
			{{-- Student Number --}}
			<div>
				<x-input-label for="student_no" :value="__('Student Number')" />
				<x-input-text 
					id="student_no"
					name="student_no"
					type="text"
					placeholder="{{ __('Student Number') }}"
					class="mt-1" />
					<x-input-error class="mt-2" :messages="$errors->get('student_no')" />
			</div>
			{{-- Last Name --}}
			<div class="mt-4">
				<x-input-label for="last_name" :value="__('Last Name')" />
				<x-input-text 
					id="last_name"
					name="last_name"
					type="text"
					placeholder="{{ __('Last Name') }}"
					class="mt-1" />
					<x-input-error class="mt-2" :messages="$errors->get('last_name')" />
			</div>
			{{-- First Name --}}
			<div class="mt-4">
				<x-input-label for="first_name" :value="__('First Name')" />
				<x-input-text 
					id="first_name"
					name="first_name"
					type="text"
					placeholder="{{ __('First Name') }}"
					class="mt-1" />
					<x-input-error class="mt-2" :messages="$errors->get('first_name')" />
			</div>
			{{-- Middle Name --}}
			<div class="mt-4">
				<x-input-label for="middle_name" :value="__('Middle Name')" />
				<x-input-text 
					id="middle_name"
					name="middle_name"
					type="text"
					placeholder="{{ __('Middle Name') }}"
					class="mt-1" />
					<x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
			</div>
			{{-- Sex --}}
			<div class="mt-4">
				<x-input-label for="sex" :value="__('Sex')" />
				<x-input-select id="sex" name="sex" class="mt-1">
					<option class="text-gray" hidden selected>Sex</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</x-input-select>
				<x-input-error class="mt-2" :messages="$errors->get('sex')" />
			</div>
			{{-- Civil Status --}}
			<div class="mt-4">
				<x-input-label for="civil_status" :value="__('Civil Status')" />
				<x-input-select id="civil_status" name="civil_status" class="mt-1">
					<option hidden selected>Civil Status</option>
					<option value="Single">Single</option>
					<option value="Married">Married</option>
					<option value="Divorced">Divorced</option>
					<option value="Widowed">Widowed</option>
				</x-input-select>
				<x-input-error class="mt-2" :messages="$errors->get('civil_status')" />
			</div>
			{{-- Nationality --}}
			<div class="mt-4">
				<x-input-label for="nationality" :value="__('Nationality')" />
				<x-input-text 
					id="nationality"
					name="nationality"
					type="text"
					placeholder="{{ __('Nationality') }}"
					class="mt-1" />
					<x-input-error class="mt-2" :messages="$errors->get('nationality')" />
				<x-input-error class="mt-2" :messages="$errors->get('nationality')" />
			</div>
			{{-- Birthdate --}}
			<div class="mt-4">
				<x-input-label for="birthdate" :value="__('Birthdate')" />
				<x-input-text 
					id="birthdate"
					name="birthdate"
					type="date"
					placeholder="{{ __('Birthdate') }}"
					class="mt-1" />
					<x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
				<x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
			</div>
			{{-- Birthplace --}}
			<div class="mt-4">
				<x-input-label for="birthplace" :value="__('Birthplace')" />
				<x-input-text 
					id="birthplace"
					name="birthplace"
					type="text"
					placeholder="{{ __('Birthplace') }}"
					class="mt-1" />
					<x-input-error class="mt-2" :messages="$errors->get('birthplace')" />
				<x-input-error class="mt-2" :messages="$errors->get('birthplace')" />
			</div>
			{{-- Address --}}
			<div class="mt-4">
				<x-input-label for="address" :value="__('Address')" />
				<x-input-text 
					id="address"
					name="address"
					type="text"
					placeholder="{{ __('Address') }}"
					class="mt-1" />
					<x-input-error class="mt-2" :messages="$errors->get('address')" />
				<x-input-error class="mt-2" :messages="$errors->get('address')" />
			</div>
			{{-- Phone --}}
			<div class="mt-4">
				<x-input-label for="phone" :value="__('Phone')" />
				<x-input-text 
					id="phone"
					name="phone"
					type="text"
					placeholder="{{ __('Phone') }}"
					class="mt-1" />
					<x-input-error class="mt-2" :messages="$errors->get('phone')" />
				<x-input-error class="mt-2" :messages="$errors->get('phone')" />
			</div>
			{{-- Email --}}
			<div class="mt-4">
				<x-input-label for="email" :value="__('Email Address')" />
				<x-input-text 
					id="email"
					name="email"
					type="email"
					placeholder="{{ __('Email Address') }}"
					class="mt-1" />
					<x-input-error class="mt-2" :messages="$errors->get('email')" />
				<x-input-error class="mt-2" :messages="$errors->get('email')" />
			</div>

		</form>
	</x-modal>

	{{-- Edit Student Form --}}
    <x-modal name="edit-student">
	</x-modal>

	{{-- Delete Student Dialog --}}
    <x-modal name="delete-student">
	</x-modal>
</div>    