<?php
require_once 'views/template/header.php';
$isEdit = isset($student);
$actionUrl = $isEdit
    ? "index.php?entity=student&action=update&id=" . $student['id']
    : "index.php?entity=student&action=save";
?>

<div class="bg-white shadow-sm rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
            <i class="fas fa-user-graduate mr-2 text-blue-600"></i>
            <?= $isEdit ? 'Edit Student' : 'Add New Student' ?>
        </h2>
    </div>
    
    <div class="px-6 py-6">
        <form action="<?= $actionUrl ?>" method="POST" class="space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nim" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-id-badge mr-1"></i>
                        NIM (Student ID)
                    </label>
                    <input type="text" 
                           id="nim"
                           name="nim" 
                           value="<?= $isEdit ? htmlspecialchars($student['nim']) : '' ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                           placeholder="Enter student NIM"
                           required>
                </div>

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user mr-1"></i>
                        Full Name
                    </label>
                    <input type="text" 
                           id="nama"
                           name="nama" 
                           value="<?= $isEdit ? htmlspecialchars($student['nama']) : '' ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                           placeholder="Enter full name"
                           required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="kelas" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-chalkboard mr-1"></i>
                        Class
                    </label>
                    <input type="text" 
                           id="kelas"
                           name="kelas" 
                           value="<?= $isEdit ? htmlspecialchars($student['kelas']) : '' ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                           placeholder="Enter class"
                           required>
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
                        <?php foreach ($viewModel->getDepartmentOptions() as $dept): ?>
                            <option value="<?= $dept['id'] ?>" <?= $isEdit && $dept['id'] == $student['department_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($dept['nama_department']) ?> (<?= htmlspecialchars($dept['kode_department']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="flex items-center justify-end space-x-3 pt-4">
                <a href="index.php?entity=student&action=list" 
                   class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-times mr-1"></i>
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-save mr-1"></i>
                    <?= $isEdit ? 'Update Student' : 'Save Student' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>