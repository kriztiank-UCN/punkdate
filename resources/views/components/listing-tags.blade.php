{{-- recieve a prop from listing-card.blade.php, show.blade.php --}}
@props(['tagsCsv'])

@php
  $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex">
  {{-- Iterate & get the tag, add to query param --}}
  @foreach ($tags as $tag)
    <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
      <a href="/?tag={{ $tag }}">{{ $tag }}</a>
    </li>
  @endforeach
</ul>
