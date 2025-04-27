@extends('layouts.private_space')
@section('title', 'Statistics')

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
                <a href="{{ route('admin.contents') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                    <i class="fas fa-newspaper mr-3 text-gray-400"></i>
                    <span>Content</span>
                </a>
                <a href="{{ route('admin.statistics') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                    <i class="fas fa-chart-bar mr-3 text-[#7fbfbf]"></i>
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
                    <a href="{{ route('admin.contents') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-newspaper mr-3 text-gray-400"></i>
                        <span>Content</span>
                    </a>
                    <a href="{{ route('admin.statistics') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                        <i class="fas fa-chart-bar mr-3 text-[#7fbfbf]"></i>
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
        <!-- Header -->
        <div class="bg-white shadow-sm">
            <div class="flex justify-between items-center px-6 py-4">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-700">Statistics & Analytics</h1>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <select class="border rounded-md px-3 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-[#afdddd] appearance-none">
                            <option value="30">Last 30 Days</option>
                            <option value="90">Last 90 Days</option>
                            <option value="180">Last 6 Months</option>
                            <option value="365">Last Year</option>
                            <option value="custom">Custom Range</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    <button class="bg-[#afdddd] hover:bg-[#8fcece] text-white px-4 py-2 rounded-md text-sm flex items-center">
                        <i class="fas fa-download mr-2"></i> Export Report
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Statistics Content -->
        <div class="p-6">
            <!-- Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-5">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Users</p>
                            <h3 class="text-2xl font-bold text-gray-800">2,845</h3>
                            <p class="text-green-500 text-sm mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>12% this month</span>
                            </p>
                        </div>
                        <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-[#7fbfbf] text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-5">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Appointments</p>
                            <h3 class="text-2xl font-bold text-gray-800">1,247</h3>
                            <p class="text-green-500 text-sm mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>8% this month</span>
                            </p>
                        </div>
                        <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-calendar-check text-[#7fbfbf] text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-5">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Avg. Rating</p>
                            <h3 class="text-2xl font-bold text-gray-800">4.8/5</h3>
                            <p class="text-green-500 text-sm mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>0.2 this month</span>
                            </p>
                        </div>
                        <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-star text-[#7fbfbf] text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-5">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Revenue</p>
                            <h3 class="text-2xl font-bold text-gray-800">$58,492</h3>
                            <p class="text-green-500 text-sm mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>15% this month</span>
                            </p>
                        </div>
                        <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-dollar-sign text-[#7fbfbf] text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Growth Chart -->
            <div class="bg-white rounded-lg shadow-md mb-6">
                <div class="p-5 border-b border-gray-100">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800">User Growth</h3>
                        <div class="flex space-x-2">
                            <button class="bg-[#e6f5f5] text-[#7fbfbf] px-3 py-1 rounded-md text-sm">Doctors</button>
                            <button class="bg-gray-100 text-gray-600 px-3 py-1 rounded-md text-sm hover:bg-gray-200">Patients</button>
                            <button class="bg-gray-100 text-gray-600 px-3 py-1 rounded-md text-sm hover:bg-gray-200">All Users</button>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="h-80">
                        <canvas id="userGrowthChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Middle Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Appointment Statistics -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Appointment Statistics</h3>
                    </div>
                    <div class="p-5">
                        <div class="h-64">
                            <canvas id="appointmentChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- Popular Specialties -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Popular Specialties</h3>
                    </div>
                    <div class="p-5">
                        <div class="h-64">
                            <canvas id="specialtiesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Geographic Distribution -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-md lg:col-span-2">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Geographic Distribution</h3>
                    </div>
                    <div class="p-5">
                        <div class="h-80">
                            <div id="mapChart" class="h-full w-full"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Top Cities -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Top Cities</h3>
                    </div>
                    <div class="p-5">
                        <ul class="space-y-4">
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <span class="text-gray-700">New York</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-700 font-medium">452</span>
                                    <span class="text-gray-500 ml-2">users</span>
                                </div>
                            </li>
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <span class="text-gray-700">Los Angeles</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-700 font-medium">385</span>
                                    <span class="text-gray-500 ml-2">users</span>
                                </div>
                            </li>
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <span class="text-gray-700">Chicago</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-700 font-medium">327</span>
                                    <span class="text-gray-500 ml-2">users</span>
                                </div>
                            </li>
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <span class="text-gray-700">Houston</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-700 font-medium">289</span>
                                    <span class="text-gray-500 ml-2">users</span>
                                </div>
                            </li>
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <span class="text-gray-700">Miami</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-700 font-medium">245</span>
                                    <span class="text-gray-500 ml-2">users</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- System Performance -->
            <div class="bg-white rounded-lg shadow-md mb-6">
                <div class="p-5 border-b border-gray-100">
                    <h3 class="font-semibold text-gray-800">System Performance</h3>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Server Response Time</h4>
                            <div class="flex items-center">
                                <div class="h-16 w-16 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                    <span class="text-lg font-bold">85ms</span>
                                </div>
                                <div>
                                    <p class="text-green-500 text-sm">
                                        <i class="fas fa-arrow-down mr-1"></i>
                                        <span>12% improvement</span>
                                    </p>
                                    <p class="text-xs text-gray-500">Compared to last month</p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Uptime</h4>
                            <div class="flex items-center">
                                <div class="h-16 w-16 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                    <span class="text-lg font-bold">99.9%</span>
                                </div>
                                <div>
                                    <p class="text-green-500 text-sm">
                                        <i class="fas fa-arrow-up mr-1"></i>
                                        <span>0.2% improvement</span>
                                    </p>
                                    <p class="text-xs text-gray-500">Compared to last month</p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Error Rate</h4>
                            <div class="flex items-center">
                                <div class="h-16 w-16 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                    <span class="text-lg font-bold">0.3%</span>
                                </div>
                                <div>
                                    <p class="text-green-500 text-sm">
                                        <i class="fas fa-arrow-down mr-1"></i>
                                        <span>0.1% improvement</span>
                                    </p>
                                    <p class="text-xs text-gray-500">Compared to last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Activity -->
            <div class="bg-white rounded-lg shadow-md mb-6">
                <div class="p-5 border-b border-gray-100">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800">User Activity</h3>
                        <button class="text-sm text-[#7fbfbf] hover:text-[#afdddd]">View All</button>
                    </div>
                </div>
                <div class="p-5">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">John Smith</div>
                                                <div class="text-xs text-gray-500">john.smith@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Patient
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Booked appointment</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        5 minutes ago
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                                <i class="fas fa-user-md"></i>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">Dr. Maria Rodriguez</div>
                                                <div class="text-xs text-gray-500">maria.rodriguez@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Doctor
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Updated availability</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        12 minutes ago
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">Sarah Johnson</div>
                                                <div class="text-xs text-gray-500">sarah.johnson@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Patient
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Left a review</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        25 minutes ago
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                                <i class="fas fa-user-md"></i>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">Dr. Robert Chen</div>
                                                <div class="text-xs text-gray-500">robert.chen@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Doctor
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Completed appointment</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        42 minutes ago
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sidebar toggle for mobile
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
        
        // User Growth Chart
        const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
        const userGrowthChart = new Chart(userGrowthCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Doctors',
                    data: [12, 19, 25, 32, 39, 45, 52, 59, 68, 78, 89, 102],
                    backgroundColor: 'rgba(175, 221, 221, 0.2)',
                    borderColor: 'rgba(175, 221, 221, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(175, 221, 221, 1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
        
        // Appointment Chart
        const appointmentCtx = document.getElementById('appointmentChart').getContext('2d');
        const appointmentChart = new Chart(appointmentCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Appointments',
                    data: [65, 59, 80, 81, 56, 40, 30],
                    backgroundColor: 'rgba(175, 221, 221, 0.8)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
        
        // Specialties Chart
        const specialtiesCtx = document.getElementById('specialtiesChart').getContext('2d');
        const specialtiesChart = new Chart(specialtiesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Cardiology', 'Neurology', 'Pediatrics', 'Dermatology', 'Orthopedics', 'Other'],
                datasets: [{
                    data: [25, 20, 18, 15, 12, 10],
                    backgroundColor: [
                        'rgba(175, 221, 221, 0.8)',
                        'rgba(127, 191, 191, 0.8)',
                        'rgba(230, 245, 245, 0.8)',
                        'rgba(143, 206, 206, 0.8)',
                        'rgba(95, 158, 160, 0.8)',
                        'rgba(200, 200, 200, 0.8)'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 12,
                            padding: 15
                        }
                    }
                }
            }
        });
        
        // Map Chart placeholder (would typically use a mapping library like Leaflet or Google Maps)
        const mapChart = document.getElementById('mapChart');
        if (mapChart) {
            mapChart.innerHTML = '<div class="flex items-center justify-center h-full bg-gray-100 rounded-lg"><p class="text-gray-500">Geographic map visualization would be displayed here</p></div>';
        }
    });
</script>
@endsection