<x-admin-panel>
<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
  <div class="max-w-[600px] mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
      <h1 class="text-2xl font-bold text-gray-900">Create New Role</h1>
      <p class="text-gray-600 mt-2">Add a new role to your system</p>
    </div>

    <!-- Create Role Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
      <form action="{{ route('role.update' , $role->id)}}" method="POST">
        @csrf
        @method('PUT')
        <!-- Role Name -->
        <div class="mb-6">
          <label for="roleName" class="block text-sm font-medium text-gray-700 mb-2">
            Role Name
          </label>
          <input
            type="text"
            id="roleName"
            name="name"
            x-model="role.name"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Enter role name"
            required
          >
        </div>
        <div class="mb-6">
          <label for="roleName" class="block text-sm font-medium text-gray-700 mb-2">
            Key
          </label>
          <input
            type="text"
            id="roleName"
            name="key"
            x-model="role.name"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Enter key name"
            required
          >
        </div>

        <!-- Description -->
        <div class="mb-6">
          <label for="roleDescription" class="block text-sm font-medium text-gray-700 mb-2">
            Description
          </label>
          <textarea
            id="roleDescription"
            name="description"
            x-model="role.description"
            rows="3"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Enter description..."
          ></textarea>
        </div>
        <div class="mb-6">
          <div class="space-y-4">
            <div>
              <h4 class="text-sm font-medium text-gray-900 mb-2">Role permission</h4>
              <div class="space-y-2">
                <label class="flex items-center">
                  <input type="checkbox" x-model="role.permissions" value="view-users" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                  <span class="ml-2 text-sm text-gray-700">User.view</span>
                </label>
              </div>
              <div class="space-y-2">
                <label class="flex items-center">
                  <input type="checkbox" x-model="role.permissions" value="view-users" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                  <span class="ml-2 text-sm text-gray-700">Update.user</span>
                </label>
              </div>
              <div class="space-y-2">
                <label class="flex items-center">
                  <input type="checkbox" x-model="role.permissions" value="view-users" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                  <span class="ml-2 text-sm text-gray-700">Delete.User</span>
                </label>
              </div>
              <div class="space-y-2">
                <label class="flex items-center">
                  <input type="checkbox" x-model="role.permissions" value="view-users" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                  <span class="ml-2 text-sm text-gray-700">Manage sutent</span>
                </label>
              </div>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex space-x-3 pt-4 border-t border-gray-200">
          <button
            type="button"
            @click="cancel()"
            class="flex-1 px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            Cancel
          </button>
          <button
            type="submit"
            class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            Save Role
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('roleCreator', () => ({
    role: {
      name: '',
      description: '',
      active: true,
      permissions: []
    },
    showSuccess: false,

    createRole() {
      // Simulate API call
      console.log('Creating role:', this.role);
      
      // Show success message
      this.showSuccess = true;
      
      // Reset form after delay
      setTimeout(() => {
        this.resetForm();
        this.showSuccess = false;
      }, 3000);
    },

    resetForm() {
      this.role = {
        name: '',
        description: '',
        active: true,
        permissions: []
      };
    },

    cancel() {
      if (confirm('Are you sure you want to cancel? Any unsaved changes will be lost.')) {
        this.resetForm();
        // In a real app, you might redirect back to roles list
        console.log('Cancelled role creation');
      }
    }
  }));
});
</script>
</x-admin-panel>