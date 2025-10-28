<x-app-layout>
    <div class="min-h-screen flex">
        <!-- Sidebar Component -->
        <div class="w-64 bg-white border-r border-gray-200 min-h-screen p-4">
            <div class="mb-8 px-2">
                <h1 class="text-xl font-semibold text-gray-800">Admin</h1>
            </div>
            
            <nav class="space-y-1">
                <a href="{{ route('dashboard.index') }}"
                class="flex items-center px-3 py-2 rounded-lg transition-colors
                        {{ request()->is('dashboard') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="w-2 h-2 rounded-full mr-3 {{ request()->is('dashboard') ? 'bg-blue-500' : 'bg-gray-400' }}"></span>
                    Dashboard
                </a>

                @if(Auth::user()?->roles[0]?->key == 'admin')
                    <a href="{{ route('user.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg transition-colors
                            {{ request()->is('users*') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                        <span class="w-2 h-2 rounded-full mr-3 {{ request()->is('users*') ? 'bg-blue-500' : 'bg-gray-400' }}"></span>
                        Users
                    </a>
                @endif


                <a href="{{ route('role.index') }}"
                class="flex items-center px-3 py-2 rounded-lg transition-colors
                        {{ request()->is('roles*') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="w-2 h-2 rounded-full mr-3 {{ request()->is('roles*') ? 'bg-blue-500' : 'bg-gray-400' }}"></span>
                    Roles
                </a>

                <a href="{{ route('permission.index') }}"
                class="flex items-center px-3 py-2 rounded-lg transition-colors
                        {{ request()->is('permissions*') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="w-2 h-2 rounded-full mr-3 {{ request()->is('permissions*') ? 'bg-blue-500' : 'bg-gray-400' }}"></span>
                    Permissions
                </a>
            </nav>

        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-6">
            {{ $slot }}
        </div>
    </div>
</x-app-layout>