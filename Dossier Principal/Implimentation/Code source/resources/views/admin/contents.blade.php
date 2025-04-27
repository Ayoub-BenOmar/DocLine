@extends('layouts.private_space')
@section('title', 'Content Management')

@section('content')
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="bg-white shadow-lg w-64 flex-shrink-0 hidden md:block">
        <div class="p-4 bg-[#afdddd] text-white bg-cover bg-center" style="background-image: url('{{ asset('images/health-still-life-with-copy-space.jpg') }}');">
            <h2 class="text-2xl font-bold">DocLine</h2>
            <p class="text-white text-opacity-80 text-sm">Admin Portal</p>
        </div>
        <div class="py-4">
            <div class="px-4 py-3">
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                        AA
                    </div>
                    <div class="ml-3">
                        <p class="font-medium">Admin Account</p>
                        <p class="text-xs text-gray-500">System Administrator</p>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                    <i class="fas fa-tachometer-alt mr-3 text-gray-400"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.doctors') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                    <i class="fas fa-user-md mr-3 text-gray-400"></i>
                    <span>Doctors</span>
                </a>
                <a href="{{ route('admin.patients') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                    <i class="fas fa-users mr-3 text-gray-400"></i>
                    <span>Patients</span>
                </a>
                <a href="{{ route('admin.contents') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                    <i class="fas fa-newspaper mr-3 text-[#7fbfbf]"></i>
                    <span>Content</span>
                </a>
                <a href="{{ route('admin.statistics') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                    <i class="fas fa-chart-bar mr-3 text-gray-400"></i>
                    <span>Statistics</span>
                </a>
            </div>
        </div>
        <div class="absolute bottom-0 w-64 p-4 border-t">
            <a href="{{ route('logout') }}" class="flex items-center text-gray-600 hover:text-[#7fbfbf]">
                <i class="fas fa-sign-out-alt mr-3"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <!-- Mobile Sidebar Toggle -->
    <div class="md:hidden fixed bottom-4 right-4 z-50">
        <button id="sidebarToggle" class="bg-[#afdddd] text-white p-3 rounded-full shadow-lg">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobileSidebar" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-40 hidden">
        <div class="bg-white h-full w-64 shadow-lg">
            <div class="p-4 bg-[#afdddd] text-white flex justify-between">
                <div>
                    <h2 class="text-2xl font-bold">DocLine</h2>
                    <p class="text-white text-opacity-80 text-sm">Admin Portal</p>
                </div>
                <button id="closeSidebar" class="text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="py-4">
                <div class="px-4 py-3">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                            AA
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">Admin Account</p>
                            <p class="text-xs text-gray-500">System Administrator</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-tachometer-alt mr-3 text-gray-400"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.doctors') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-user-md mr-3 text-gray-400"></i>
                        <span>Doctors</span>
                    </a>
                    <a href="{{ route('admin.patients') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-users mr-3 text-gray-400"></i>
                        <span>Patients</span>
                    </a>
                    <a href="{{ route('admin.contents') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                        <i class="fas fa-newspaper mr-3 text-[#7fbfbf]"></i>
                        <span>Content</span>
                    </a>
                    <a href="{{ route('admin.statistics') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-chart-bar mr-3 text-gray-400"></i>
                        <span>Statistics</span>
                    </a>
                </div>
            </div>
            <div class="absolute bottom-0 w-64 p-4 border-t">
                <a href="{{ route('logout') }}" class="flex items-center text-gray-600 hover:text-[#7fbfbf]">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 bg-gray-50">
        <!-- Top navigation -->
        <div class="bg-white shadow-sm">
            <div class="flex justify-between items-center px-6 py-4">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-700">Content Management</h1>
                </div>
                <div class="flex items-center space-x-3">
                    <button id="addCityBtn" class="bg-white border border-[#afdddd] text-[#7fbfbf] px-4 py-2 rounded-md text-sm flex items-center hover:bg-[#e6f5f5]">
                        <i class="fas fa-map-marker-alt mr-2"></i> Add City
                    </button>
                    <button id="addSpecialtyBtn" class="bg-white border border-[#afdddd] text-[#7fbfbf] px-4 py-2 rounded-md text-sm flex items-center hover:bg-[#e6f5f5]">
                        <i class="fas fa-plus-circle mr-2"></i> Add Specialty
                    </button>
                    <button id="addArticleBtn" class="bg-[#afdddd] hover:bg-[#8fcece] text-white px-4 py-2 rounded-md text-sm flex items-center">
                        <i class="fas fa-plus mr-2"></i> New Article
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Content Management Content -->
        <div class="p-6">
            <!-- Tabs -->
            <div class="mb-6 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px" id="contentTabs">
                    <li class="mr-2">
                        <a href="#" class="inline-block py-2 px-4 text-sm font-medium text-center border-b-2 border-[#afdddd] text-[#7fbfbf] rounded-t-lg active" data-tab="articles">
                            Articles
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300" data-tab="specialties">
                            Specialties
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300" data-tab="cities">
                            Cities
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Articles Tab Content -->
            <div id="articlesTab" class="tab-content">
                <!-- Search and Filter -->
                <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="relative flex-1">
                            <input type="text" placeholder="Search articles by title, author, or category..." class="pl-10 pr-4 py-2 border rounded-md w-full focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <select class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                                <option value="">Sort By</option>
                                <option value="date_desc">Date (Newest)</option>
                                <option value="date_asc">Date (Oldest)</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Articles List -->
                <div class="bg-white rounded-lg shadow-md mb-6">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Published Articles</h3>
                    </div>
                    <div class="p-5">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 rounded bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                                    <i class="fas fa-file-alt"></i>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Understanding Diabetes: Symptoms and Prevention</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Health Tips</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Dr. Sarah Miller</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Mar 15, 2025</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 rounded bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                                    <i class="fas fa-file-alt"></i>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">The Importance of Regular Check-ups</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Wellness</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Dr. Michael Chen</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Mar 10, 2025</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 rounded bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                                    <i class="fas fa-file-alt"></i>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Nutrition Tips for a Healthy Heart</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Nutrition</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Dr. Amanda Johnson</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Mar 08, 2025</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 rounded bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                                    <i class="fas fa-file-alt"></i>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Latest Advances in Cancer Treatment</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Medical News</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Dr. Robert Miller</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Mar 05, 2025</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 rounded bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                                    <i class="fas fa-file-alt"></i>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Mental Health Awareness: Signs and Support</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Wellness</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Dr. Emily Wilson</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Mar 01, 2025</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="flex items-center justify-between mt-6">
                            <div class="text-sm text-gray-500">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">24</span> results
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50 disabled:opacity-50" disabled>
                                    Previous
                                </button>
                                <button class="px-3 py-1 border rounded-md bg-[#afdddd] text-white">
                                    1
                                </button>
                                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                    2
                                </button>
                                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                    3
                                </button>
                                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Specialties Tab Content -->
            <div id="specialtiesTab" class="tab-content hidden">
                <!-- Search and Filter -->
                <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="relative flex-1">
                            <input type="text" placeholder="Search specialties..." class="pl-10 pr-4 py-2 border rounded-md w-full focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <select class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                                <option value="">Sort By</option>
                                <option value="name_asc">Name (A-Z)</option>
                                <option value="name_desc">Name (Z-A)</option>
                                <option value="doctors_desc">Most Doctors</option>
                                <option value="doctors_asc">Fewest Doctors</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Specialties Grid -->
                <div class="bg-white rounded-lg shadow-md mb-6">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Medical Specialties</h3>
                    </div>
                    <div class="p-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-heartbeat"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Cardiology</h4>
                                            <p class="text-xs text-gray-500">24 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-brain"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Neurology</h4>
                                            <p class="text-xs text-gray-500">18 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-baby"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Pediatrics</h4>
                                            <p class="text-xs text-gray-500">15 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-bone"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Orthopedics</h4>
                                            <p class="text-xs text-gray-500">12 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Ophthalmology</h4>
                                            <p class="text-xs text-gray-500">9 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-tooth"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Dentistry</h4>
                                            <p class="text-xs text-gray-500">7 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="flex items-center justify-between mt-6">
                            <div class="text-sm text-gray-500">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span class="font-medium">12</span> specialties
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50 disabled:opacity-50" disabled>
                                    Previous
                                </button>
                                <button class="px-3 py-1 border rounded-md bg-[#afdddd] text-white">
                                    1
                                </button>
                                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                    2
                                </button>
                                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Cities Tab Content -->
            <div id="citiesTab" class="tab-content hidden">
                <!-- Search and Filter -->
                <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="relative flex-1">
                            <input type="text" placeholder="Search cities..." class="pl-10 pr-4 py-2 border rounded-md w-full focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <select class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                                <option value="">Sort By</option>
                                <option value="name_asc">Name (A-Z)</option>
                                <option value="name_desc">Name (Z-A)</option>
                                <option value="doctors_desc">Most Doctors</option>
                                <option value="doctors_asc">Fewest Doctors</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Cities Grid -->
                <div class="bg-white rounded-lg shadow-md mb-6">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Available Cities</h3>
                    </div>
                    <div class="p-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Casablanca</h4>
                                            <p class="text-xs text-gray-500">42 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Agadir</h4>
                                            <p class="text-xs text-gray-500">36 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Rabat</h4>
                                            <p class="text-xs text-gray-500">28 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Marrakech</h4>
                                            <p class="text-xs text-gray-500">22 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Tangier</h4>
                                            <p class="text-xs text-gray-500">19 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-800">Safi</h4>
                                            <p class="text-xs text-gray-500">15 doctors</p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="flex items-center justify-between mt-6">
                            <div class="text-sm text-gray-500">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span class="font-medium">15</span> cities
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50 disabled:opacity-50" disabled>
                                    Previous
                                </button>
                                <button class="px-3 py-1 border rounded-md bg-[#afdddd] text-white">
                                    1
                                </button>
                                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                    2
                                </button>
                                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                    3
                                </button>
                                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Article Modal -->
<div id="addArticleModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-screen overflow-y-auto">
        <div class="p-5 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Add New Article</h3>
            <button class="text-gray-400 hover:text-gray-600 closeModal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-5">
            <form method="post" action="{{ route('admin.article.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="articleTitle" class="block text-sm font-medium text-gray-700 mb-1">Article Title</label>
                    <input type="text" id="articleTitle" name="title" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Enter article title">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="articleCategory" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <input type="text" id="articleCategory" name="category" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Enter article category">
                    </div>
                    <div>
                        <label for="articleAuthor" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                        <input type="text" id="articleAuthor" name="author" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Enter article author">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="articleContent" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                    <textarea id="articleContent" name="content" rows="10" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Write your article content here..."></textarea>
                </div>
                
                
                <div class="mb-4">
                    <label for="articleImage" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center">
                        <input type="file" id="article_image" name="article_image" class="hidden">
                        <label for="article_image" class="cursor-pointer">
                            <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-2"></i>
                            <p class="text-sm text-gray-500">Click to upload or drag and drop</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 2MB</p>
                        </label>
                    </div>
                </div>

                <button type="submit" class="px-4 py-2 bg-[#afdddd] hover:bg-[#8fcece] text-white rounded-md">Add Article</button>

            </form>
        </div>
    </div>
</div>

<!-- Add Specialty Modal -->
<div id="addSpecialtyModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
        <div class="p-5 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Add New Specialty</h3>
            <button class="text-gray-400 hover:text-gray-600 closeModal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-5">
            <form method="post" action="{{ route('admin.speciality.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="specialtyName" class="block text-sm font-medium text-gray-700 mb-1">Specialty Name</label>
                    <input type="text" id="specialtyName" name="speciality" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Enter specialty name">
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 closeModal">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-[#afdddd] hover:bg-[#8fcece] text-white rounded-md">Save Specialty</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add City Modal -->
<div id="addCityModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
        <div class="p-5 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Add New City</h3>
            <button class="text-gray-400 hover:text-gray-600 closeModal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-5">
            <form method="post" action="{{ route('admin.city.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="cityName" class="block text-sm font-medium text-gray-700 mb-1">City Name</label>
                    <input type="text" id="cityName" name="city" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Enter city name">
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 closeModal">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-[#afdddd] hover:bg-[#8fcece] text-white rounded-md">Save City</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab switching
        const tabLinks = document.querySelectorAll('#contentTabs a');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all tabs
                tabLinks.forEach(tab => {
                    tab.classList.remove('border-[#afdddd]', 'text-[#7fbfbf]');
                    tab.classList.add('border-transparent', 'text-gray-500');
                });
                
                // Add active class to current tab
                this.classList.remove('border-transparent', 'text-gray-500');
                this.classList.add('border-[#afdddd]', 'text-[#7fbfbf]');
                
                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Show current tab content
                const tabId = this.getAttribute('data-tab') + 'Tab';
                document.getElementById(tabId).classList.remove('hidden');
            });
        });
        
        // Modal handling
        const addArticleBtn = document.getElementById('addArticleBtn');
        const addSpecialtyBtn = document.getElementById('addSpecialtyBtn');
        const addCityBtn = document.getElementById('addCityBtn');
        const addArticleModal = document.getElementById('addArticleModal');
        const addSpecialtyModal = document.getElementById('addSpecialtyModal');
        const addCityModal = document.getElementById('addCityModal');
        const closeModalBtns = document.querySelectorAll('.closeModal');
        
        if (addArticleBtn && addArticleModal) {
            addArticleBtn.addEventListener('click', function() {
                addArticleModal.classList.remove('hidden');
            });
        }
        
        if (addSpecialtyBtn && addSpecialtyModal) {
            addSpecialtyBtn.addEventListener('click', function() {
                addSpecialtyModal.classList.remove('hidden');
            });
        }
        
        if (addCityBtn && addCityModal) {
            addCityBtn.addEventListener('click', function() {
                addCityModal.classList.remove('hidden');
            });
        }
        
        closeModalBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                addArticleModal.classList.add('hidden');
                addSpecialtyModal.classList.add('hidden');
                addCityModal.classList.add('hidden');
            });
        });
    });
</script>
@endsection