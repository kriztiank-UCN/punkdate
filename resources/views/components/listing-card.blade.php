{{-- receive a prop from index.blade.php --}}
@props(['listing'])
{{-- CARD --}}
<div class="bg-gray-50 border border-gray-200 rounded p-6">
  <div class="flex">
    {{-- PROFILE IMAGE --}}
    <img class="hidden w-48 mr-6 md:block" 
    {{-- if there is a profile image load it from storage + path from database, else display a default image --}}
    src="{{$listing->image ? asset('storage/' . $listing->image) : asset('/images/no-image.png')}}" alt="profile image" />
    <div>
      <h3 class="text-2xl">
        {{-- NAME --}}
        <a href="/listings/{{ $listing->id }} ">{{ $listing->name }} </a>
      </h3>
      {{-- AGE --}}
      <div class="text-xl font-bold mb-4">{{ $listing->age }}</div>
      {{-- TAGS --}}
      {{-- bind a variable to the tagsCsv prop and pass to the listing-tags component --}}
      <x-listing-tags :tagsCsv="$listing->tags" />
      {{-- LOCATION --}}
      <div class="text-lg mt-4"><i class="fa-solid fa-location-dot"></i> {{ $listing->location }}</div>
    </div>
  </div>
</div>
