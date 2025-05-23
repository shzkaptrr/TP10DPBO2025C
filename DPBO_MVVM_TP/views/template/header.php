<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen flex flex-col">
    <?php
        $currentEntity = $_GET['entity'] ?? '';
    ?>
    
    <!-- Header -->
    <header class="bg-gradient-to-r from-indigo-600 via-blue-600 to-purple-600 shadow-xl border-b-4 border-indigo-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Top Header Section -->
            <div class="flex justify-between items-center py-4 border-b border-blue-500/30">
                <div class="flex items-center">
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl p-3 mr-4">
                        <i class="fas fa-graduation-cap text-2xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white leading-tight">
                            University Management System
                        </h1>
                        <p class="text-blue-100 text-sm">Academic Excellence Portal</p>
                    </div>
                </div>
                
                <!-- User Info Section -->
                <div class="hidden md:flex items-center space-x-4">
                    <div class="text-right text-white/90">
                        <p class="text-sm font-medium">Welcome, Administrator</p>
                        <p class="text-xs text-blue-200"><?php echo date('F j, Y'); ?></p>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-full p-2">
                        <i class="fas fa-user-circle text-xl text-white"></i>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-baseline space-x-2">
                        <a href="index.php?entity=department&action=list" 
                           class="group flex items-center px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 ease-in-out <?= $currentEntity === 'department' ? 'bg-white/25 text-white shadow-lg backdrop-blur-sm' : 'text-blue-100 hover:bg-white/15 hover:text-white hover:shadow-md' ?>">
                            <div class="bg-white/20 rounded-lg p-1.5 mr-2 group-hover:bg-white/30 transition-colors">
                                <i class="fas fa-building text-sm"></i>
                            </div>
                            Departments
                        </a>
                        <a href="index.php?entity=student&action=list" 
                           class="group flex items-center px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 ease-in-out <?= $currentEntity === 'student' ? 'bg-white/25 text-white shadow-lg backdrop-blur-sm' : 'text-blue-100 hover:bg-white/15 hover:text-white hover:shadow-md' ?>">
                            <div class="bg-white/20 rounded-lg p-1.5 mr-2 group-hover:bg-white/30 transition-colors">
                                <i class="fas fa-user-graduate text-sm"></i>
                            </div>
                            Students
                        </a>
                        <a href="index.php?entity=lecture&action=list" 
                           class="group flex items-center px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 ease-in-out <?= $currentEntity === 'lecture' ? 'bg-white/25 text-white shadow-lg backdrop-blur-sm' : 'text-blue-100 hover:bg-white/15 hover:text-white hover:shadow-md' ?>">
                            <div class="bg-white/20 rounded-lg p-1.5 mr-2 group-hover:bg-white/30 transition-colors">
                                <i class="fas fa-chalkboard-teacher text-sm"></i>
                            </div>
                            Lecturers
                        </a>
                    </div>
                    
                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button class="bg-white/20 backdrop-blur-sm rounded-lg p-2 text-white hover:bg-white/30 transition-colors">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 max-w-7xl mx-auto w-full py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl border border-slate-200/60 min-h-[400px]">
            <div class="p-8">
                <!-- Content will be inserted here -->