{{-- add script to head in layout.blade.php <script src="//unpkg.com/alpinejs" defer></script> --}}
@if (session()->has('message'))
  {{-- x-data : alpine.js https://alpinejs.dev --}}
  <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
    <p>
      {{ session('message') }}
    </p>
  </div>
@endif
