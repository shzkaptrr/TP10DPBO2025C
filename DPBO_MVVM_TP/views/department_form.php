<?php
require_once 'views/template/header.php';
?>

<div class="bg-white shadow-sm rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
            <i class="fas fa-building mr-2 text-blue-600"></i>
            <?php echo isset($department) ? 'Edit Department' : 'Add New Department'; ?>
        </h2>
    </div>
    
    <div class="px-6 py-6">
        <form action="index.php?entity=department&action=<?php echo isset($department) ? 'update&id=' . $department['id'] : 'save'; ?>" 
              method="POST" class="space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-tag mr-1"></i>
                        Department Name
                    </label>
                    <input type="text" 
                           id="name"
                           name="name" 
                           value="<?php echo isset($department) ? htmlspecialchars($department['nama_department']) : ''; ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" 
                           placeholder="Enter department name"
                           required>
                </div>
                
                <div>
                    <label for="kode" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-code mr-1"></i>
                        Department Code
                    </label>
                    <input type="text" 
                           id="kode"
                           name="kode" 
                           value="<?php echo isset($department) ? htmlspecialchars($department['kode_department']) : ''; ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" 
                           placeholder="Enter department code"
                           required>
                </div>
            </div>
            
            <div class="flex items-center justify-end space-x-3 pt-4">
                <a href="index.php?entity=department&action=list" 
                   class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-times mr-1"></i>
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-save mr-1"></i>
                    <?php echo isset($department) ? 'Update Department' : 'Save Department'; ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>