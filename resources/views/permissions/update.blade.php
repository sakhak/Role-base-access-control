<x-admin-panel>
    <div class="min-h-screen bg-gray-50 p-6">
        <div class="max-w-4xl">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Admin Panel</h1>
                <p class="text-gray-600">Manage your application settings</p>
            </div>
            
            <!-- Form Section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Create New Item</h2>
                
                <form action="{{ route('permission.update', $permission->id) }}" method="post" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            value="{{$permission->name}}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Enter name"
                        >
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <input 
                            type="text" 
                            name="description" 
                            value="{{ $permission->description}}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Enter description"
                        >
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                     <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Key</label>
                        <input 
                            type="text" 
                            name="key" 
                            value="{{ $permission->key}}"
                            disable
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Enter key" 
                        >
                        @error('key')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
                        >
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-panel>