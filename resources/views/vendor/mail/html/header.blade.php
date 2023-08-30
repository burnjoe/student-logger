@props(['url', 'message'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'iStudentTrack')
<span class="font-bold italic text-xl">iStudentTrack</span>
{{-- <img src="{{  }}" class="logo" alt="iStudentTrack Logo"> --}}
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
