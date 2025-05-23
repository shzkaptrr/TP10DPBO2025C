<?php
require_once 'model/Department.php';
require_once 'views/template/header.php';
$departmentModel = new Department();
$departments = $departmentModel->getAll();

$isEdit = isset($lecture);
$actionUrl = $isEdit ? "index.php?entity=lecture&action=update&id={$lecture['id']}" : "index.php?entity=lecture&action=save";
?>

<div class="bg-white shadow-sm rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
            <i class="fas fa-chalkboard-teacher mr-2 text-blue-600"></i>
            <?= $isEdit ? 'Edit Lecturer' : 'Add New Lecturer' ?>
        </h2>
    </div>
    
    <div class="px-6 py-6">
        <form method="post" action="<?= $actionUrl ?>" class="space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nidn" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-id-card mr-1"></i>
                        NIDN (National Lecturer ID)
                    </label>
                    <input type="text" 
                           name="nidn" 
                           id="nidn" 
                           value="<?= $isEdit ? htmlspecialchars($lecture['nidn']) : '' ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                           placeholder="Enter NIDN"
                           required>
                </div>

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user mr-1"></i>
                        Full Name
                    </label>
                    <input type="text" 
                           name="nama" 
                           id="nama" 
                           value="<?= $isEdit ? htmlspecialchars($lecture['nama']) : '' ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                           placeholder="Enter full name"
                           required>
                </div>
            </div>

            <div>
                <label for="department_id" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-building mr-1"></i>
                    Department
                </label>
                <select name="department_id" 
                        id="department_id" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                        required>
                    <option value="">Select Department</option>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?= $department['id'] ?>" 
                            <?= $isEdit && $lecture['department_id'] == $department['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($department['nama_department']) ?> (<?= htmlspecialchars($department['kode_department']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="flex items-center justify-end space-x-3 pt-4">
                <a href="index.php?entity=lecture&action=list" 
                   class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-times mr-1"></i>
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-save mr-1"></i>
                    <?= $isEdit ? 'Update Lecturer' : 'Save Lecturer' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>