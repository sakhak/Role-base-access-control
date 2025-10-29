<x-app-layout>
<div class="max-w-xl h-screen mx-auto flex items-center">
    <form method="POST" action="{{ route('auth.regster-process') }}" class="space-y-4 min-w-[400px]">
        @csrf
        <div>
            <label for="name" class="block text-gray-700 font-medium">Name</label>
            <input id="name" name="name" type="text" required autofocus
                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" />
        </div>

        <div>
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input id="email" name="email" type="email" required
                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" />
        </div>

        <div>
            <label for="password" class="block text-gray-700 font-medium">Password</label>
            <input id="password" name="password" type="password" required
                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" />
        </div>

        {{-- <div>
            <label for="password_confirmation" class="block text-gray-700 font-medium">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" />
        </div> --}}

        <button type="submit"
            class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
            Register
        </button>

        <p class="text-sm text-center text-gray-600">
            Already have an account?
            <a href="{{ route('auth.login') }}" class="text-indigo-600 hover:underline">Login</a>
        </p>
    </form>
<div>
</x-app-layout>