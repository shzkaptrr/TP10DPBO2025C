<?php
require_once 'views/template/header.php';
?>

<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white shadow-sm rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-chalkboard-teacher mr-2 text-blue-600"></i>
                    Lecturer Management
                </h2>
                <a href="index.php?entity=lecture&action=add" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-plus mr-2"></i>
                    Add New Lecturer
                </a>
            </div>
        </div>
    </div>

    <!-- Lecturer Table -->
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-id-card mr-1"></i>
                            NIDN
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-user mr-1"></i>
                            Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-building mr-1"></i>
                            Department
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-cogs mr-1"></i>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (empty($lectureList)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                <i class="fas fa-user-slash text-4xl mb-2 block"></i>
                                No lecturers found. 
                                <a href="index.php?entity=lecture&action=add" class="text-blue-600 hover:text-blue-800">
                                    Add the first lecturer
                                </a>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($lectureList as $index => $lecture): ?>
                        <tr class="<?= $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' ?> hover:bg-blue-50 transition duration-150 ease-in-out">
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <?= htmlspecialchars($lecture['nidn']) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8">
                                        <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                            <i class="fas fa-user text-blue-600 text-sm"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">
                                            <?= htmlspecialchars($lecture['nama']) ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    <?= htmlspecialchars($lecture['department_name']) ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center space-x-2">
                                    <a href="index.php?entity=lecture&action=edit&id=<?= $lecture['id'] ?>" 
                                       class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium bg-yellow-100 text-yellow-800 hover:bg-yellow-200 transition duration-150 ease-in-out">
                                        <i class="fas fa-edit mr-1"></i>
                                        Edit
                                    </a>
                                    <a href="index.php?entity=lecture&action=delete&id=<?= $lecture['id'] ?>" 
                                       class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium bg-red-100 text-red-800 hover:bg-red-200 transition duration-150 ease-in-out"
                                       onclick="return confirm('Are you sure you want to delete this lecturer? This action cannot be undone.')">
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