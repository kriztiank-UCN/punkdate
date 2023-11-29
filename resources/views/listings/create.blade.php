<x-layout>
  <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">
        Create Profile
      </h2>
      <p class="mb-4">Create profile to find a punk date</p>
    </header>

    <form action="">
      <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2">Name</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" />
      </div>

      <div class="mb-6">
        <label for="age" class="inline-block text-lg mb-2">age</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="age" />
      </div>

      <div class="mb-6">
        <label for="location" class="inline-block text-lg mb-2">Location</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
          placeholder="Example: Boston MA, etc" />
      </div>

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">Email</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" />
      </div>

      <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
          Tags (Comma Separated)
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
          placeholder="Example: female, male, straight, gay, bi" />
      </div>

      <div class="mb-6">
        <label for="image" class="inline-block text-lg mb-2">
          Profile Picture
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
      </div>

      <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Description
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
          placeholder="Include: age, bio, bla, etc..."></textarea>
      </div>

      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Create Profile
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </div>
</x-layout>
