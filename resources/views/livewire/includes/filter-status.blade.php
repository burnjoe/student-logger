<div>
   <x-dropdown-filter align="left" menuWidth="44">
      @slot('trigger')
         <x-button btnType="success" class="flex space-x-2 items-center">
            <span style="text-transform: none;">Status</span>
            <i class="fa-solid fa-angle-down"></i>
         </x-button>
      @endslot

      @slot('content')
         <x-dropdown-filter-item fontSize="text-xs">
            <div class="flex flex-row">
               <div class="flex-1 flex items-center">
                  <input id="all" type="checkbox" value=""
                     class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="all" class="ml-2">
                     ALL
                  </label>
               </div>
            </div>
         </x-dropdown-filter-item>

         <x-dropdown-filter-item fontSize="text-xs">
            <div class="flex flex-row">
               <div class="flex-1 flex items-center">
                  <input id="in" type="checkbox" value=""
                     class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="in" class="ml-2">
                     IN
                  </label>
               </div>
            </div>
         </x-dropdown-filter-item>

         <x-dropdown-filter-item fontSize="text-xs">
            <div class="flex flex-row">
               <div class="flex-1 flex items-center">
                  <input id="out" type="checkbox" value=""
                     class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="out" class="ml-2">
                     OUT
                  </label>
               </div>
            </div>
         </x-dropdown-filter-item>

         <x-dropdown-filter-item fontSize="text-xs">
            <div class="flex flex-row">
               <div class="flex-1 flex items-center">
                  <input id="missed" type="checkbox" value=""
                     class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="missed" class="ml-2">
                     MISSED
                  </label>
               </div>
            </div>
         </x-dropdown-filter-item>
      @endslot
   </x-dropdown-filter>
</div>
