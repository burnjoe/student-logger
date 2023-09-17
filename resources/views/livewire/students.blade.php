<div>
	<x-card>
		Data Visual
	</x-card>

	<div class="flex justify-between mt-4">
		@include('livewire.includes.search')

		<x-button x-on:click="$dispatch('open-modal', 'create-student')" btnType="success" class="flex space-x-2 items-center">
			<i class="fa-solid fa-plus"></i>
			<span>Add Student</span>
		</x-button>
	</div>
	
	{{-- Table --}}
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
						<button x-on:click="$dispatch('open-modal', 'view-student')" class="text-veryDarkGray hover:text-darkGray">
							<i class="fa-solid fa-eye"></i>
						</button>
						<button x-on:click="$dispatch('open-modal', 'edit-student')" class="text-veryDarkGray hover:text-darkGray">
							<i class="fa-solid fa-pen-to-square"></i>	
						</button>
						<button x-on:click="$dispatch('open-modal', 'delete-student')" class="text-red hover:text-lightRed">
							<i class="fa-solid fa-trash"></i>
						</button>
					</td>
				</tr>
			@endforeach			
		@endslot
	</x-table>

	{{-- <div class="flex mt-4 items-center space-x-4">
		<span class="text-sm text-darkGray">Per Page</span>
		<x-input-select class="w-24">
			<option selected value="10">10</option>
			<option value="20">20</option>
			<option value="50">50</option>
			<option value="100">100</option>
		</x-input-select>
	</div> --}}

	<div class="mt-4">
		{{ $students->links() }}
	</div>

	{{-- Create Student Form --}}
    <x-modal name="create-student" title="Add Student">
		<form wire:submit="store">
			{{-- Student Number --}}
			<div>
				<x-input-label for="student_no" :value="__('Student Number')" :required="true" />
				<x-input-text 
					id="student_no"
					wire:model.live="student_no"
					name="student_no"
					type="text"
					placeholder="{{ __('Student Number') }}"
					class="mt-1 bg-lightGray" />
				<x-input-error class="mt-2" :messages="$errors->get('student_no')" />
			</div>
			{{-- Last Name --}}
			<div class="mt-4">
				<x-input-label for="last_name" :value="__('Last Name')" :required="true" />
				<x-input-text 
					id="last_name"
					wire:model.live="last_name"
					name="last_name"
					type="text"
					placeholder="{{ __('Last Name') }}"
					class="mt-1 bg-lightGray" />
				<x-input-error class="mt-2" :messages="$errors->get('last_name')" />
			</div>
			{{-- First Name --}}
			<div class="mt-4">
				<x-input-label for="first_name" :value="__('First Name')" :required="true" />
				<x-input-text 
					id="first_name"
					wire:model.live="first_name"
					name="first_name"
					type="text"
					placeholder="{{ __('First Name') }}"
					class="mt-1 bg-lightGray" />
				<x-input-error class="mt-2" :messages="$errors->get('first_name')" />
			</div>
			{{-- Middle Name --}}
			<div class="mt-4">
				<x-input-label for="middle_name" :value="__('Middle Name')" />
				<x-input-text 
					id="middle_name"
					wire:model.live="middle_name"
					name="middle_name"
					type="text"
					placeholder="{{ __('Middle Name') }}"
					class="mt-1 bg-lightGray" />
				<x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
			</div>
			{{-- Sex --}}
			<div class="mt-4 text-gray">
				<x-input-label for="sex" :value="__('Sex')" :required="true" />
				<x-input-select 
					id="sex" 
					wire:model.live="sex" 
					name="sex" 
					class="mt-1 bg-lightGray">
					<option selected hidden>Sex</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</x-input-select>
				<x-input-error class="mt-2" :messages="$errors->get('sex')" />
			</div>
			{{-- Civil Status --}}
			<div class="mt-4 text-gray">
				<x-input-label for="civil_status" :value="__('Civil Status')" :required="true" />
				<x-input-select 
					id="civil_status" 
					wire:model.live="civil_status" 
					name="civil_status" 
					class="mt-1 bg-lightGray">
					<option selected hidden>Civil Status</option>
					<option value="Single">Single</	option>
					<option value="Married">Married</option>
					<option value="Divorced">Divorced</option>
					<option value="Widowed">Widowed</option>
				</x-input-select>
				<x-input-error class="mt-2" :messages="$errors->get('civil_status')" />
			</div>
			{{-- Nationality --}}
			<div class="mt-4">
				<x-input-label for="nationality" :value="__('Nationality')" :required="true"/>
				<x-input-text 
					id="nationality"
					wire:model.live="nationality"
					name="nationality"
					type="text"
					placeholder="{{ __('Nationality') }}"
					class="mt-1 bg-lightGray" />
				<x-input-error class="mt-2" :messages="$errors->get('nationality')" />
			</div>
			{{-- Birthdate --}}
			<div class="mt-4">
				<x-input-label for="birthdate" :value="__('Birthdate')" :required="true"/>
				<x-input-text 
					id="birthdate"
					wire:model.live="birthdate"
					name="birthdate"
					type="date"
					placeholder="{{ __('Birthdate') }}"
					class="mt-1 bg-lightGray" />
				<x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
			</div>
			{{-- Birthplace --}}
			<div class="mt-4">
				<x-input-label for="birthplace" :value="__('Birthplace')" :required="true"/>
				<x-input-text 
					id="birthplace"
					wire:model.live="birthplace"
					name="birthplace"
					type="text"
					placeholder="{{ __('Birthplace') }}"
					class="mt-1 bg-lightGray" />
				<x-input-error class="mt-2" :messages="$errors->get('birthplace')" />
			</div>
			{{-- Address --}}
			<div class="mt-4">
				<x-input-label for="address" :value="__('Address')" :required="true"/>
				<x-input-text 
					id="address"
					wire:model.live="address"
					name="address"
					type="text"
					placeholder="{{ __('Address') }}"
					class="mt-1 bg-lightGray" />
				<x-input-error class="mt-2" :messages="$errors->get('address')" />
			</div>
			{{-- Account Type --}}
			<div class="mt-4 text-gray">
				<x-input-label for="account_type" :value="__('Account Type')" :required="true" />
				<x-input-select 
					id="account_type" 
					wire:model.live="account_type" 
					name="account_type" 
					class="mt-1 bg-lightGray">
					<option selected hidden>Account Type</option>
					<option value="Cabuyeño">Cabuyeño</option>
					<option value="Non-Cabuyeño">Non-Cabuyeño</option>
				</x-input-select>
				<x-input-error class="mt-2" :messages="$errors->get('account_type')" />
			</div>
			{{-- Phone --}}
			<div class="mt-4">
				<x-input-label for="phone" :value="__('Phone')" :required="true"/>
				<x-input-text 
					id="phone"
					wire:model.live="phone"
					name="phone"
					type="text"
					placeholder="{{ __('Phone') }}"
					class="mt-1 bg-lightGray" />
				<x-input-error class="mt-2" :messages="$errors->get('phone')" />
			</div>
			{{-- Email --}}
			<div class="mt-4">
				<x-input-label for="email" :value="__('Email Address')" :required="true"/>
				<x-input-text 
					id="email"
					wire:model.live="email"
					name="email"
					type="email"
					placeholder="{{ __('Email Address') }}"
					class="mt-1 bg-lightGray" />
				<x-input-error class="mt-2" :messages="$errors->get('email')" />
			</div>
			{{-- Submit --}}
			<div class="flex justify-end mt-4 space-x-4">
				<x-button x-on:click.prevent="$dispatch('close-modal')" btnType="secondary">Cancel</x-button>
				<x-button type="submit" btnType="success">Add</x-button>
			</div>
			{{-- Loading --}}
			{{-- <div wire:loading>
				<i class="fa-solid fa-circle-info"></i>
			</div> --}}
		</form>
	</x-modal>

	{{-- View Student Form --}}
	<x-modal name="view-student" title="Student Information">
		{{-- {{ $student->student_no }} --}}
	</x-modal>

	{{-- Edit Student Form --}}
    <x-modal name="edit-student">
	</x-modal>

	{{-- Delete Student Dialog --}}
    <x-modal name="delete-student">
	</x-modal>

	@include('livewire.includes.toasts')
</div>    