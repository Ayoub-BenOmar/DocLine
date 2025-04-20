@extends('layouts.private_space')
@section('title', 'Patient Management')

@section('content')
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="bg-white shadow-lg w-64 flex-shrink-0 hidden md:block">
        <div class="p-4 bg-[#afdddd] text-white">
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
                <a href="{{ route('admin.patients') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                    <i class="fas fa-users mr-3 text-[#7fbfbf]"></i>
                    <span>Patients</span>
                </a>
                <a href="{{ route('admin.contents') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                    <i class="fas fa-newspaper mr-3 text-gray-400"></i>
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
                    <a href="{{ route('admin.patients') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                        <i class="fas fa-users mr-3 text-[#7fbfbf]"></i>
                        <span>Patients</span>
                    </a>
                    <a href="{{ route('admin.contents') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-newspaper mr-3 text-gray-400"></i>
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
                    <h1 class="text-xl font-semibold text-gray-700">Patient Management</h1>
                </div>
            </div>
        </div>
        
        <!-- Patient Management Content -->
        <div class="p-6">
            <!-- Tabs -->
            <div class="mb-6 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <a href="#" class="inline-block py-2 px-4 text-sm font-medium text-center border-b-2 border-[#afdddd] text-[#7fbfbf] rounded-t-lg active">
                            All Patients (1,003)
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Search and Filter -->
            <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="relative flex-1">
                        <input type="text" placeholder="Search patients by name, email, or ID..." class="pl-10 pr-4 py-2 border rounded-md w-full focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <select class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                            <option value="">All Ages</option>
                            <option value="0-18">0-18</option>
                            <option value="19-35">19-35</option>
                            <option value="36-50">36-50</option>
                            <option value="51-65">51-65</option>
                            <option value="65+">65+</option>
                        </select>
                        <select class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                            <option value="">Sort By</option>
                            <option value="name_asc">Name (A-Z)</option>
                            <option value="name_desc">Name (Z-A)</option>
                            <option value="date_asc">Registration Date (Oldest)</option>
                            <option value="date_desc">Registration Date (Newest)</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Patient Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-5">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Patients</p>
                            <h3 class="text-2xl font-bold text-gray-800">1,003</h3>
                        </div>
                        <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-[#7fbfbf] text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center">
                            <span class="text-green-500 text-xs font-medium mr-1">
                                <i class="fas fa-arrow-up"></i> 15%
                            </span>
                            <span class="text-gray-500 text-xs">Since last month</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-5">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">New Patients</p>
                            <h3 class="text-2xl font-bold text-gray-800">87</h3>
                        </div>
                        <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-plus text-[#7fbfbf] text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center">
                            <span class="text-green-500 text-xs font-medium mr-1">
                                <i class="fas fa-arrow-up"></i> 8%
                            </span>
                            <span class="text-gray-500 text-xs">Since last month</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-5">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Active Appointments</p>
                            <h3 class="text-2xl font-bold text-gray-800">528</h3>
                        </div>
                        <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-calendar-check text-[#7fbfbf] text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center">
                            <span class="text-green-500 text-xs font-medium mr-1">
                                <i class="fas fa-arrow-up"></i> 22%
                            </span>
                            <span class="text-gray-500 text-xs">Since last month</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Patients List -->
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-5 border-b border-gray-100">
                    <h3 class="font-semibold text-gray-800">All Patients</h3>
                </div>
                <div class="p-5">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Appointments</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                                JP
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">John Patient</div>
                                                <div class="text-sm text-gray-500">john.p@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">12345678</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">42</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">8</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Jan 15, 2024</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                                EW
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Emma Wilson</div>
                                                <div class="text-sm text-gray-500">emma.w@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">23456789</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">28</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">3</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Feb 22, 2024</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                                MG
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Maria Garcia</div>
                                                <div class="text-sm text-gray-500">maria.g@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">34567890</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">35</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">12</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Dec 10, 2023</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                                RW
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Robert Williams</div>
                                                <div class="text-sm text-gray-500">robert.w@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">45678901</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">58</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">5</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Mar 05, 2024</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Inactive
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-green-500 hover:text-green-700">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                                SJ
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Sarah Johnson</div>
                                                <div class="text-sm text-gray-500">sarah.j@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">56789012</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">45</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">7</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Jan 28, 2024</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-sm text-gray-500">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">1,003</span> results
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
                                4
                            </button>
                            <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                5
                            </button>
                            <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="bg-white p-4 border-t mt-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-500">© 2025 DocLine Admin Portal. All rights reserved.</p>
                <div class="flex mt-2 md:mt-0">
                    <a href="#" class="text-sm text-gray-500 hover:text-[#7fbfbf] mx-2">Privacy Policy</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-[#7fbfbf] mx-2">Terms of Service</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-[#7fbfbf] mx-2">Contact Support</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Simple script for mobile sidebar toggle -->
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('sidebarToggle');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        
        if (sidebarToggle && mobileSidebar && closeSidebar) {
            sidebarToggle.addEventListener('click', function() {
                mobileSidebar.classList.toggle('hidden');
            });
            
            closeSidebar.addEventListener('click', function() {
                mobileSidebar.classList.add('hidden');
            });
        }
    });
</script> --}}
@endsection