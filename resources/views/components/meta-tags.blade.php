@props(['metaTagsCsv'])
@php
    $metaTags = explode(',', $metaTagsCsv);
    $count = 1;
@endphp
<ul class="flex flex-wrap space-y-4">
    @forelse($metaTags as $metaTag)
        @if ($count == 1)
            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                style="margin-top: 1rem">
                <a href="#">{{ $metaTag }}</a>
            </li>
            @php
                $count = 2;
            @endphp
        @else
            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                <a href="#">{{ $metaTag }}</a>
            </li>
        @endif
    


    @empty
    @endforelse
</ul>
