<x-app-layout>
<div class="max-w-xl h-screen mx-auto flex items-center">
    
    <form method="POST" action="" class="space-y-4 min-w-[400px]">
        @csrf
        <div>
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input id="email" name="email" type="email" required autofocus
                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" />
        </div>

        <div>
            <label for="password" class="block text-gray-700 font-medium">Password</label>
            <input id="password" name="password" type="password" required
                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" />
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center text-sm text-gray-600">
                <input type="checkbox" name="remember" class="mr-1"> Remember me
            </label>
            <a href="#" class="text-sm text-indigo-600 hover:underline">Forgot password?</a>
        </div>

        <button type="submit"
            class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
            Login
        </button>

        <p class="text-sm text-center text-gray-600">
            Don’t have an account?
            <a href="{{ route('auth.regster') }}" class="text-indigo-600 hover:underline">Register</a>
        </p>
    </form>
</div>

</x-app-layout>