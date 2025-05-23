<?php
require_once 'views/template/header.php';
?>

<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white shadow-sm rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-building mr-2 text-blue-600"></i>
                    Department Management
                </h2>
                <a href="index.php?entity=department&action=add" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-plus mr-2"></i>
                    Add New Department
                </a>
            </div>
        </div>
    </div>

    <!-- Error Message -->
    <?php if (isset($_GET['error'])): ?>
        <div id="error-message" class="bg-red-50 border-l-4 border-red-400 p-4 rounded-md transition-opacity duration-500">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-red-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button onclick="document.getElementById('error-message').style.display='none'" 
                                class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            setTimeout(() => {
                const errorDiv = document.getElementById('error-message');
                if (errorDiv) {
                    errorDiv.classList.add('opacity-0');
                    setTimeout(() => {
                        errorDiv.style.display = 'none';
                    }, 500);
                }
            }, 3000);
        </script>
    <?php endif; ?>

    <!-- Department Table -->
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-tag mr-1"></i>
                            Department Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-code mr-1"></i>
                            Code
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-cogs mr-1"></i>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (empty($departmentList)): ?>
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                                <i class="fas fa-inbox text-4xl mb-2 block"></i>
                                No departments found. 
                                <a href="index.php?entity=department&action=add" class="text-blue-600 hover:text-blue-800">
                                    Add the first department
                                </a>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($departmentList as $index => $dept): ?>
                        <tr class="<?= $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' ?> hover:bg-blue-50 transition duration-150 ease-in-out">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    <?php echo htmlspecialchars($dept['nama_department']); ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <?php echo htmlspecialchars($dept['kode_department']); ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center space-x-2">
                                    <a href="index.php?entity=department&action=edit&id=<?php echo $dept['id']; ?>" 
                                       class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium bg-yellow-100 text-yellow-800 hover:bg-yellow-200 transition duration-150 ease-in-out">
                                        <i class="fas fa-edit mr-1"></i>
                                        Edit
                                    </a>
                                    <a href="index.php?entity=department&action=delete&id=<?php echo $dept['id']; ?>" 
                                       class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium bg-red-100 text-red-800 hover:bg-red-200 transition duration-150 ease-in-out"
                                       onclick="return confirm('Are you sure you want to delete this department? This action cannot be undone.');">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>