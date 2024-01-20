<x-layout>
  @include('partials._hero')
  @include('partials._search')
  @include('partials._footer')
  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @if (count($listings) < 1)
      <p>There are no profiles</p>
    @endif

   {{-- loop through the listings and pass the listing to the listing-card component with a prop --}}
    @foreach ($listings as $listing)
      <x-listing-card :listing="$listing" />
    @endforeach

  </div>

  {{-- PAGINATION --}}
  {{-- chain on ->paginate(4) or ->simplePaginate(4) in ListingController.php --}}
  <div class="mt-6 p-4">
    {{ $listings->links() }}
  </div>
</x-layout>
