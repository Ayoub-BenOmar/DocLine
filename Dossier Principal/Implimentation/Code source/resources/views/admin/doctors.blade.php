@extends('layouts.private_space')
@section('title', 'Doctor Management')

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
                    <a href="{{ route('admin.doctors') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                        <i class="fas fa-user-md mr-3 text-[#7fbfbf]"></i>
                        <span>Doctors</span>
                    </a>
                    <a href="{{ route('admin.patients') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-users mr-3 text-gray-400"></i>
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
                <a href="" class="flex items-center text-gray-600 hover:text-[#7fbfbf]">
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
                        <a href="{{ route('admin.doctors') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                            <i class="fas fa-user-md mr-3 text-[#7fbfbf]"></i>
                            <span>Doctors</span>
                        </a>
                        <a href="{{ route('admin.patients') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-users mr-3 text-gray-400"></i>
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
                        <h1 class="text-xl font-semibold text-gray-700">Doctor Management</h1>
                    </div>
                </div>
            </div>
            
            <!-- Doctor Management Content -->
            <div class="p-6">
                <!-- Tabs -->
                <div class="mb-6 border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="mr-2">
                            <a href="#" class="inline-block py-2 px-4 text-sm font-medium text-center border-b-2 border-[#afdddd] text-[#7fbfbf] rounded-t-lg active">
                                All Doctors (245)
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Search and Filter -->
                <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="relative flex-1">
                            <input type="text" placeholder="Search doctors by name, email, or specialty..." class="pl-10 pr-4 py-2 border rounded-md w-full focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <select class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                                <option value="">All Specialties</option>
                                <option value="cardiology">Cardiology</option>
                                <option value="neurology">Neurology</option>
                                <option value="pediatrics">Pediatrics</option>
                                <option value="dermatology">Dermatology</option>
                                <option value="orthopedics">Orthopedics</option>
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
                
                <!-- Doctor Registration Requests -->
                <div class="bg-white rounded-lg shadow-md mb-6">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Doctor Registration Requests</h3>
                    </div>
                    <div class="p-5">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Specialty</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">License</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Documents</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                                    JD
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Dr. John Doe</div>
                                                    <div class="text-sm text-gray-500">john.doe@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Cardiology</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">LIC-12345-MD</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button class="view-document bg-white text-primary px-3 py-1 rounded-md text-xs font-medium hover:bg-primary hover:text-white" data-doctor="Dr. John Doe" data-id="doc1">
                                                <i class="fas fa-file-medical mr-1"></i> View Certificate
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Mar 18, 2025</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-3">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                                    MS
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Dr. Maria Smith</div>
                                                    <div class="text-sm text-gray-500">maria.smith@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Neurology</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">LIC-67890-MD</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button class="view-document bg-white text-primary px-3 py-1 rounded-md text-xs font-medium hover:bg-primary hover:text-white" data-doctor="Dr. John Doe" data-id="doc1">
                                                <i class="fas fa-file-medical mr-1"></i> View Certificate
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Mar 17, 2025</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-[#7fbfbf] hover:text-[#afdddd] mr-3">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- All Doctors List -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">All Doctors</h3>
                    </div>
                    <div class="p-5">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Specialty</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patients</th>
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
                                                    SM
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Dr. Sarah Miller</div>
                                                    <div class="text-sm text-gray-500">sarah.miller@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">General Medicine</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">142</div>
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
                                                    MC
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Dr. Michael Chen</div>
                                                    <div class="text-sm text-gray-500">michael.chen@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Cardiology</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">98</div>
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
                                                    AJ
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Dr. Amanda Johnson</div>
                                                    <div class="text-sm text-gray-500">amanda.j@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Pediatrics</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">127</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Mar 10, 2024</div>
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
                                                    RM
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Dr. Robert Miller</div>
                                                    <div class="text-sm text-gray-500">robert.m@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Orthopedics</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">85</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Dec 05, 2023</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Suspended
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
                                                    EW
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Dr. Emily Wilson</div>
                                                    <div class="text-sm text-gray-500">emily.w@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Dermatology</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">112</div>
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
                                Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">245</span> results
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

            <!-- Document Viewer Modal -->
            <div id="documentModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden flex items-center justify-center">
                <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-screen overflow-hidden">
                    <div class="p-5 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800" id="documentModalTitle">Doctor Certificate</h3>
                        <button class="text-gray-400 hover:text-gray-600" id="closeDocumentModal">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="p-5 flex flex-col">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <p class="text-sm text-gray-500">Document Type: <span class="font-medium text-gray-700">Medical License Certificate</span></p>
                                <p class="text-sm text-gray-500">Uploaded: <span class="font-medium text-gray-700">Mar 18, 2025</span></p>
                            </div>
                            <div>
                                <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm flex items-center">
                                    <i class="fas fa-download mr-1"></i> Download
                                </button>
                            </div>
                        </div>
                        
                        <div class="border rounded-lg p-2 bg-gray-50 h-96 overflow-auto">
                            <!-- Document preview area -->
                            <div id="documentPreview" class="flex items-center justify-center h-full">
                                <!-- This will be populated with the document preview -->
                                <img src="https://via.placeholder.com/800x1100?text=Medical+Certificate+Preview" alt="Certificate Preview" class="max-w-full h-auto" id="previewImage">
                            </div>
                        </div>
                        
                        <div class="mt-4 border-t pt-4">
                            <h4 class="font-medium text-gray-800 mb-2">Verification Notes</h4>
                            <textarea class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]" rows="3" placeholder="Add verification notes here..."></textarea>
                            
                            <div class="flex justify-end space-x-3 mt-4">
                                <button class="bg-white border border-red-300 text-red-500 px-4 py-2 rounded hover:bg-red-50">
                                    <i class="fas fa-times mr-1"></i> Reject
                                </button>
                                <button class="bg-[#afdddd] hover:bg-[#8fcece] text-white px-4 py-2 rounded">
                                    <i class="fas fa-check mr-1"></i> Approve
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Document viewer modal
            const documentModal = document.getElementById('documentModal');
            const closeDocumentModal = document.getElementById('closeDocumentModal');
            const documentModalTitle = document.getElementById('documentModalTitle');
            const previewImage = document.getElementById('previewImage');
            const viewDocumentButtons = document.querySelectorAll('.view-document');
            
            // Sample document data (in a real app, this would come from the server)
            const documentData = {
                'doc1': {
                    title: 'Dr. John Doe - Medical License Certificate',
                    image: 'https://via.placeholder.com/800x1100?text=John+Doe+Medical+Certificate',
                    type: 'Medical License Certificate',
                    date: 'Mar 18, 2025'
                },
                'doc2': {
                    title: 'Dr. Maria Smith - Medical License Certificate',
                    image: 'https://via.placeholder.com/800x1100?text=Maria+Smith+Medical+Certificate',
                    type: 'Medical License Certificate',
                    date: 'Mar 17, 2025'
                },
                'doc3': {
                    title: 'Dr. Robert Johnson - Medical License Certificate',
                    image: 'https://via.placeholder.com/800x1100?text=Robert+Johnson+Medical+Certificate',
                    type: 'Medical License Certificate',
                    date: 'Mar 16, 2025'
                }
            };
            
            viewDocumentButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const doctorName = this.getAttribute('data-doctor');
                    const docId = this.getAttribute('data-id');
                    const docData = documentData[docId];
                    
                    documentModalTitle.textContent = docData.title;
                    previewImage.src = docData.image;
                    previewImage.alt = docData.title;
                    
                    documentModal.classList.remove('hidden');
                });
            });
            
            if (closeDocumentModal) {
                closeDocumentModal.addEventListener('click', function() {
                    documentModal.classList.add('hidden');
                });
            }
            
            // Close modal when clicking outside
            documentModal.addEventListener('click', function(e) {
                if (e.target === documentModal) {
                    documentModal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection