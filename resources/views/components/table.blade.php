<div {{ $attributes->merge(['class' => 'bg-white rounded-md shadow-sm w-full']) }}>
   <div class="overflow-x-auto rounded-md">
      <table class="table-auto w-full">
         @if(isset($head))
            <thead style="white-space: nowrap;">
               <tr class="text-left bg-green text-white text-sm font-bold">
                  {{ $head }}
               </tr>
            </thead>
         @endif
         @if(isset($data))
            <tbody>
               {{ $data }}
            </tbody>
         @endif
         @if(isset($foot))
            <tfoot style="white-space: nowrap;">
               <tr class="text-left bg-green text-white font-bold">
                  {{ $foot }}
               </tr>
            </tfoot>
         @endif
      </table>
   </div>
</div>