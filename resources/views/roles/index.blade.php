<x-admin-panel>
    <div class="min-h-screen bg-gray-50 p-6">
        <div class="max-w-6xl mx-auto">
            <!-- Header with Actions -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Role Management</h1>
                    <p class="text-gray-600">Manage your application role</p>
                </div>
                <a 
                    href="{{ route('role.showcreate') }}" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
                >
                    Add New Role
                </a>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Id
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Key
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th> -->
                            <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th> -->
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($roles as $role)
                        <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{$role->id}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $role->name }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">{{$role->key}}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">{{ $role->description }}</div>
                                </td>
                                <!-- <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td> -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('role.showcreate')  }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between mt-6">
                <div class="text-sm text-gray-700">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">2</span> of <span class="font-medium">2</span> results
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 text-sm bg-gray-200 text-gray-600 rounded hover:bg-gray-300 transition-colors">
                        Previous
                    </button>
                    <button class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-admin-panel>