<div>
   <x-dropdown-filter align="left" menuWidth="44">
      @slot('trigger')
         <x-primary-button class="flex space-x-2 items-center">
            <span style="text-transform: none;">Program</span>
            <i class="fa-solid fa-angle-down"></i>
         </x-primary-button>
      @endslot

      @slot('content')
         {{-- CAS --}}
         <x-accordion class="transition-all rounded-lg hover:bg-lightGray" name="students-accordion">
            <x-accordion-item headerClasses="" contentClasses="bg-lightGray" :showIndicator="true">
               @slot('header')
                  <div class="w-full flex space-x-4" title="CAS">
                     <div class="w-full flex justify-between items-center text-sm">
                        CAS
                     </div>
                  </div>
               @endslot
               @slot('content')
                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsp" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsp" class="ml-2">
                              BS in Psychology
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>
               @endslot
            </x-accordion-item>
         </x-accordion>

         {{-- CBAA --}}
         <x-accordion class="transition-all rounded-lg hover:bg-lightGray" name="students-accordion">
            <x-accordion-item headerClasses="" contentClasses="bg-lightGray" :showIndicator="true">
               @slot('header')
                  <div class="w-full flex space-x-4" title="CBAA">
                     <div class="w-full flex justify-between items-center text-sm">
                        CBAA
                     </div>
                  </div>
               @endslot
               @slot('content')
                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsa" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsa" class="ml-2">
                              BS in Accountancy
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsba-f" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsba-f" class="ml-2">
                              BS in Business Administration Major in Financial Management
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsba-m" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsba-m" class="ml-2">
                              BS in Business Administration Major in Marketing Management
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>
               @endslot
            </x-accordion-item>
         </x-accordion>

         {{-- CCS --}}
         <x-accordion class="transition-all rounded-lg hover:bg-lightGray" name="students-accordion">
            <x-accordion-item headerClasses="" contentClasses="bg-lightGray" :showIndicator="true">
               @slot('header')
                  <div class="w-full flex space-x-4" title="CCS">
                     <div class="w-full flex justify-between items-center text-sm">
                        CCS
                     </div>
                  </div>
               @endslot
               @slot('content')
                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsit" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsit" class="ml-2">
                              BS in Information Technology
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bscs" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bscs" class="ml-2">
                              BS in Computer Science
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>
               @endslot
            </x-accordion-item>
         </x-accordion>

         {{-- COED --}}
         <x-accordion class="transition-all rounded-lg hover:bg-lightGray" name="students-accordion">
            <x-accordion-item headerClasses="" contentClasses="bg-lightGray" :showIndicator="true">
               @slot('header')
                  <div class="w-full flex space-x-4" title="COED">
                     <div class="w-full flex justify-between items-center text-sm">
                        COED
                     </div>
                  </div>
               @endslot
               @slot('content')
                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="beed" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="beed" class="ml-2">
                              Bachelor of Elementary Education
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsede" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsede" class="ml-2">
                              Bachelor of Secondary Education major in English
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsedf" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsedf" class="ml-2">
                              Bachelor of Secondary Education major in Filipino
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsedm" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsedm" class="ml-2">
                              Bachelor of Secondary Education major in Mathematics
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsedss" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsedss" class="ml-2">
                              Bachelor of Secondary Education major in Social Studies
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>
               @endslot
            </x-accordion-item>
         </x-accordion>

         {{-- COE --}}
         <x-accordion class="transition-all rounded-lg hover:bg-lightGray" name="students-accordion">
            <x-accordion-item headerClasses="" contentClasses="bg-lightGray" :showIndicator="true">
               @slot('header')
                  <div class="w-full flex space-x-4" title="COE">
                     <div class="w-full flex justify-between items-center text-sm">
                        COE
                     </div>
                  </div>
               @endslot
               @slot('content')
                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bscpe" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bscpe" class="ml-2">
                              BS in Computer Engineering
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsece" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsece" class="ml-2">
                              BS in Electronics Engineering
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsie" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsie" class="ml-2">
                              BS in Industrial Engineering
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>
               @endslot
            </x-accordion-item>
         </x-accordion>

         {{-- CHAS --}}
         <x-accordion class="transition-all rounded-lg hover:bg-lightGray" name="students-accordion">
            <x-accordion-item headerClasses="" contentClasses="bg-lightGray" :showIndicator="true">
               @slot('header')
                  <div class="w-full flex space-x-4" title="CHAS">
                     <div class="w-full flex justify-between items-center text-sm">
                        CHAS
                     </div>
                  </div>
               @endslot
               @slot('content')
                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="bsn" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="bsn" class="ml-2">
                              BS in Nursing
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>
               @endslot
            </x-accordion-item>
         </x-accordion>

         {{-- SHS --}}
         <x-accordion class="transition-all rounded-lg hover:bg-lightGray" name="students-accordion">
            <x-accordion-item headerClasses="" contentClasses="bg-lightGray" :showIndicator="true">
               @slot('header')
                  <div class="w-full flex space-x-4" title="SHS">
                     <div class="w-full flex justify-between items-center text-sm">
                        SHS
                     </div>
                  </div>
               @endslot
               @slot('content')
                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="e-stem" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="e-stem" class="ml-2">
                              E-STEM
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="e-humss" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="e-humss" class="ml-2">
                              E-HUMSS
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="e-abm" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="e-abm" class="ml-2">
                              E-ABM
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>

                  <x-dropdown-filter-item fontSize="text-xs">
                     <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                           <input id="e-tvl" type="checkbox" value=""
                              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                           <label for="e-tvl" class="ml-2">
                              E-TVL
                           </label>
                        </div>
                     </div>
                  </x-dropdown-filter-item>
               @endslot
            </x-accordion-item>
         </x-accordion>
      @endslot
   </x-dropdown-filter>
</div>
