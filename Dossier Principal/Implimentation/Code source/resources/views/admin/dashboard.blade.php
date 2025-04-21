@extends('layouts.private_space')
@section('title', 'Admin Dashboard')

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
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                        <i class="fas fa-tachometer-alt mr-3 text-[#7fbfbf]"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.doctors' )}}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-user-md mr-3 text-gray-400"></i>
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
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                            <i class="fas fa-tachometer-alt mr-3 text-[#7fbfbf]"></i>
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
        </div>

        <!-- Main Content -->
        <div class="flex-1 bg-gray-50">
            <!-- Top navigation -->
            <div class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-6 py-4">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-700">Admin Dashboard</h1>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 mr-4">Today: {{ date('F d, Y') }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Overview Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <!-- Total Users Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Users</p>
                                <h3 class="text-2xl font-bold text-gray-800">1,248</h3>
                            </div>
                            <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-[#7fbfbf] text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center">
                                <span class="text-green-500 text-xs font-medium mr-1">
                                    <i class="fas fa-arrow-up"></i> 12%
                                </span>
                                <span class="text-gray-500 text-xs">Since last month</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Doctors Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Doctors</p>
                                <h3 class="text-2xl font-bold text-gray-800">245</h3>
                            </div>
                            <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-md text-[#7fbfbf] text-xl"></i>
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
                    
                    <!-- Patients Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Patients</p>
                                <h3 class="text-2xl font-bold text-gray-800">1,003</h3>
                            </div>
                            <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-hospital-user text-[#7fbfbf] text-xl"></i>
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
                    
                    <!-- Appointments Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Appointments</p>
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
                
                <!-- Middle Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Doctor Registration Requests -->
                    <div class="bg-white rounded-lg shadow lg:col-span-2">
                        <div class="p-5 border-b border-gray-100">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-800">Doctor Registration Requests</h3>
                                <a href="{{ route('admin.doctors') }}" class="text-sm text-[#7fbfbf] hover:text-[#afdddd]">View All</a>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Specialty</th>
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
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                                        RJ
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">Dr. Robert Johnson</div>
                                                        <div class="text-sm text-gray-500">robert.j@example.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">Pediatrics</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">Mar 16, 2025</div>
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
                    
                    <!-- Recent Activities -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-5 border-b border-gray-100">
                            <h3 class="font-semibold text-gray-800">Recent Activities</h3>
                        </div>
                        <div class="p-5">
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="bg-[#e6f5f5] rounded-full p-2 mr-3">
                                        <i class="fas fa-user-plus text-[#7fbfbf]"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">New patient registered</p>
                                        <p class="text-xs text-gray-500">Emma Wilson created an account</p>
                                        <p class="text-xs text-gray-400 mt-1">10 minutes ago</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="bg-[#e6f5f5] rounded-full p-2 mr-3">
                                        <i class="fas fa-calendar-check text-[#7fbfbf]"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Appointment confirmed</p>
                                        <p class="text-xs text-gray-500">Dr. Sarah Miller with John Patient</p>
                                        <p class="text-xs text-gray-400 mt-1">25 minutes ago</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="bg-[#e6f5f5] rounded-full p-2 mr-3">
                                        <i class="fas fa-file-medical text-[#7fbfbf]"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Certificate approved</p>
                                        <p class="text-xs text-gray-500">Dr. Michael Chen approved a sick leave certificate</p>
                                        <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="bg-[#e6f5f5] rounded-full p-2 mr-3">
                                        <i class="fas fa-user-md text-[#7fbfbf]"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Doctor registration</p>
                                        <p class="text-xs text-gray-500">Dr. Robert Johnson requested to join</p>
                                        <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="bg-[#e6f5f5] rounded-full p-2 mr-3">
                                        <i class="fas fa-newspaper text-[#7fbfbf]"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">New article published</p>
                                        <p class="text-xs text-gray-500">"Understanding Diabetes: Symptoms and Prevention"</p>
                                        <p class="text-xs text-gray-400 mt-1">3 hours ago</p>
                                    </div>
                                </div>
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
@endsection