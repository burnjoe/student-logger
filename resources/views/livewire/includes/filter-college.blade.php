<div>
   <x-dropdown-filter align="left" menuWidth="44">
      @slot('trigger')
         <x-primary-button class="flex space-x-2 items-center">
            <span style="text-transform: none;">College</span>
            <i class="fa-solid fa-angle-down"></i>
         </x-primary-button>
      @endslot
      @slot('content')
         <x-dropdown-filter-item fontSize="text-xs">
            <div class="flex flex-row">
               <div class="flex-1 flex items-center">
                  <input id="cas" type="checkbox" value=""
                     class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="cas" class="ml-2">
                     College of Arts and Sciences
                  </label>
               </div>
            </div>
         </x-dropdown-filter-item>
         <x-dropdown-filter-item fontSize="text-xs">
            <div class="flex flex-row">
               <div class="flex-1 flex items-center">
                  <input id="cbaa" type="checkbox" value=""
                     class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="cbaa" class="ml-2">
                     College of Business, Accountancy, and Administration
                  </label>
               </div>
            </div>
         </x-dropdown-filter-item>
         <x-dropdown-filter-item fontSize="text-xs">
            <div class="flex flex-row">
               <div class="flex-1 flex items-center">
                  <input id="ccs" type="checkbox" value=""
                     class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="ccs" class="ml-2">
                     College of Computing Studies
                  </label>
               </div>
            </div>
         </x-dropdown-filter-item>
         <x-dropdown-filter-item fontSize="text-xs">
            <div class="flex flex-row">
               <div class="flex-1 flex items-center">
                  <input id="coed" type="checkbox" value=""
                     class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="coed" class="ml-2">
                     College of Education
                  </label>
               </div>
            </div>
         </x-dropdown-filter-item>
         <x-dropdown-filter-item fontSize="text-xs">
            <div class="flex flex-row">
               <div class="flex-1 flex items-center">
                  <input id="coe" type="checkbox" value=""
                     class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="coe" class="ml-2">
                     College of Engineering
                  </label>
               </div>
            </div>
         </x-dropdown-filter-item>
         <x-dropdown-filter-item fontSize="text-xs">
            <div class="flex flex-row">
               <div class="flex-1 flex items-center">
                  <input id="chas" type="checkbox" value=""
                     class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="chas" class="ml-2">
                     College of Health and Allied Science
                  </label>
               </div>
            </div>
         </x-dropdown-filter-item>
         <x-dropdown-filter-item fontSize="text-xs">
            <div class="flex flex-row">
               <div class="flex-1 flex items-center">
                  <input id="shs" type="checkbox" value=""
                     class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="shs" class="ml-2">
                     Senior High School
                  </label>
               </div>
            </div>
         </x-dropdown-filter-item>
      @endslot
   </x-dropdown-filter>
</div>
