<x-layout>
  <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
  </a>
  <div class="mx-4">
    {{-- CARD --}}
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
      <div class="flex flex-col items-center justify-center text-center">
        {{-- PROFILE IMAGE --}}
        <img class="w-48 mr-6 mb-6" 
        {{-- if there is a profile image load it from storage + path from database, else display a default image --}}
          src="{{ $listing->image ? asset('storage/' . $listing->image) : asset('/images/no-image.png') }}" alt="profile image" />
        <!-- NAME -->
        <h3 class="text-2xl mb-2">{{ $listing->name }}</h3>
        <!-- AGE -->
        <div class="text-xl font-bold mb-4">{{ $listing->age }}</div>
        <!-- TAGS -->
        {{-- Accept prop from listing-tags.blade.php --}}
        <x-listing-tags :tagsCsv="$listing->tags" />
        {{-- LOCATION --}}
        <div class="text-lg my-4">
          <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
        </div>
        {{-- BORDER --}}
        <div class="border border-gray-200 w-full mb-6"></div>
        {{-- DESCRIPTION --}}
        <div>
          <h3 class="text-3xl font-bold mb-4">
            Description
          </h3>
          <div class="text-lg space-y-6">
            {{ $listing->description }}
            <a href="mailto:{{ $listing->email }}"
              class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                class="fa-solid fa-envelope"></i>
              Contact</a>
          </div>
        </div>
      </div>
    </div>

    {{-- User Authorization example --}}
    {{-- <x-card class="mt-4 p-2 flex space-x-6">
      <a href="/listings/{{ $listing->id }}/edit">
        <i class="fa-solid fa-pencil"></i> Edit
      </a>

      <form method="POST" action="/listings/{{ $listing->id }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500">
          <i class="fa-solid fa-trash"></i> Delete
        </button>
      </form>
    </x-card> --}}

  </div>
</x-layout>
