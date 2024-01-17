<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            laravel: '#ef3b2d',
          },
        },
      },
    }
  </script>
  <title>PunkDate | A Dedicated Punk Dating Site</title>
</head>

<body class="mb-48">
  <nav class="flex justify-between items-center mb-4">
    <a href="/"><img class="w-24" src="{{ asset('images/logo.png') }}" alt="logo"
        class="logo" /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
      {{-- show this if logged in --}}
      @auth
        <li>
          <span class="font-bold uppercase">
            {{-- show the logged in users name in the navigation --}}
            Welcome {{ auth()->user()->name }}
          </span>
        </li>
        <li>
          <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage Profile</a>
        </li>
        <li>
          <form class="inline" method="POST" action="/logout">
            @csrf
            <button type="submit">
              <i class="fa-solid fa-door-closed"></i> Logout
            </button>
          </form>
        </li>
        {{-- show this if not logged in --}}
      @else
        <li>
          <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
        </li>
        <li>
          <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
        </li>
      @endauth
    </ul>
  </nav>
  <main>
    {{-- LAYOUT COMPONENT, USE SLOT TO OUTPUT VIEWS --}}
    {{-- <x-layout>{{ $slot }}</x-layout> --}}
    {{ $slot }}
  </main>

  {{-- footer, hero & search are partial includes only present in index.blade.php --}}

  {{-- FLASH MESSAGE COMPONENT --}}
  <x-flash-message />
</body>

</html>
