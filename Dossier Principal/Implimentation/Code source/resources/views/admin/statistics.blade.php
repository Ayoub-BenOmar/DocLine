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
            <!-- User Statistics Section -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">User Statistics</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Total Users Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Users</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $totalUsers }}</h3>
                                <p class="text-green-500 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>{{ $userGrowthRate }}% this month</span>
                                </p>
                            </div>
                            <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-[#7fbfbf] text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Doctors Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Doctors</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $totalDoctors }}</h3>
                                <p class="text-green-500 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>{{ $doctorGrowthRate }}% this month</span>
                                </p>
                            </div>
                            <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-md text-[#7fbfbf] text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Patients Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Patients</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $totalPatients }}</h3>
                                <p class="text-green-500 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>{{ $patientGrowthRate }}% this month</span>
                                </p>
                            </div>
                            <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user text-[#7fbfbf] text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Appointment Statistics Section -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Appointment Statistics</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Total Appointments Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Appointments</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $totalAppointments }}</h3>
                                <p class="text-green-500 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>{{ $appointmentGrowthRate }}% this month</span>
                                </p>
                            </div>
                            <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar-check text-[#7fbfbf] text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Completed Appointments Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Completed Appointments</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $completedAppointments }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    <span>{{ $completedAppointmentPercentage }}% of total</span>
                                </p>
                            </div>
                            <div class="bg-green-100 h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Scheduled Appointments Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Scheduled Appointments</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $scheduledAppointments }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    <span>{{ $scheduledAppointmentPercentage }}% of total</span>
                                </p>
                            </div>
                            <div class="bg-blue-100 h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-blue-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Medical Certificate Statistics Section -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Medical Certificate Statistics</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Total Certificates Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Certificates</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $totalCertificates }}</h3>
                                <p class="text-green-500 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>{{ $certificateGrowthRate }}% this month</span>
                                </p>
                            </div>
                            <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-medical text-[#7fbfbf] text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pending Certificates Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Pending Certificates</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $pendingCertificates }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    <span>{{ $pendingCertificatePercentage }}% of total</span>
                                </p>
                            </div>
                            <div class="bg-yellow-100 h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-yellow-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Approved Certificates Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Approved Certificates</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $approvedCertificates }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    <span>{{ $approvedCertificatePercentage }}% of total</span>
                                </p>
                            </div>
                            <div class="bg-green-100 h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Rejected Certificates Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Rejected Certificates</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $rejectedCertificates }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    <span>{{ $rejectedCertificatePercentage }}% of total</span>
                                </p>
                            </div>
                            <div class="bg-red-100 h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-times-circle text-red-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Medical Files Section -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Medical Files</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Total Medical Files Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Medical Files</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $totalMedicalFiles }}</h3>
                                <p class="text-green-500 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>{{ $medicalFileGrowthRate }}% this month</span>
                                </p>
                            </div>
                            <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-medical-alt text-[#7fbfbf] text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Average Files Per Patient Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Avg. Files Per Patient</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $avgFilesPerPatient }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    <span>Based on active patients</span>
                                </p>
                            </div>
                            <div class="bg-[#e6f5f5] h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calculator text-[#7fbfbf] text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Top Doctors Section -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Top Doctors by Appointments</h2>
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Specialty</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Appointments</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Completion Rate</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($topDoctors as $doctor)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] font-bold">
                                            {{ substr($doctor->name, 0, 1) }}{{ substr($doctor->last_name, 0, 1) }}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Dr. {{ $doctor->name }} {{ $doctor->last_name }}</div>
                                            <div class="text-xs text-gray-500">{{ $doctor->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $doctor->specialty }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $doctor->total_appointments }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="bg-[#7fbfbf] h-2.5 rounded-full" style="width: {{ $doctor->completion_rate }}%"></div>
                                        </div>
                                        <span class="text-sm text-gray-900 ml-2">{{ $doctor->completion_rate }}%</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Popular Cities and Specialties Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Popular Cities -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Top Cities by Appointments</h3>
                    </div>
                    <div class="p-5">
                        <ul class="space-y-4">
                            @foreach($topCities as $city)
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <span class="text-gray-700">{{ $city->name }}</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-32 bg-gray-200 rounded-full h-2.5 mr-3">
                                        <div class="bg-[#7fbfbf] h-2.5 rounded-full" style="width: {{ ($city->appointments / $topCities->max('appointments')) * 100 }}%"></div>
                                    </div>
                                    <span class="text-gray-700 font-medium">{{ $city->appointments }}</span>
                                    <span class="text-gray-500 ml-1">appts</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <!-- Popular Specialties -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Top Specialties by Appointments</h3>
                    </div>
                    <div class="p-5">
                        <ul class="space-y-4">
                            @foreach($topSpecialties as $specialty)
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                        <i class="fas fa-stethoscope"></i>
                                    </div>
                                    <span class="text-gray-700">{{ $specialty->name }}</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-32 bg-gray-200 rounded-full h-2.5 mr-3">
                                        <div class="bg-[#7fbfbf] h-2.5 rounded-full" style="width: {{ ($specialty->appointments / $topSpecialties->max('appointments')) * 100 }}%"></div>
                                    </div>
                                    <span class="text-gray-700 font-medium">{{ $specialty->appointments }}</span>
                                    <span class="text-gray-500 ml-1">appts</span>
                                </div>
                            </li>
                            @endforeach
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
                                    <span class="text-lg font-bold">{{ $serverResponseTime }}ms</span>
                                </div>
                                <div>
                                    <p class="text-green-500 text-sm">
                                        <i class="fas fa-arrow-down mr-1"></i>
                                        <span>{{ $serverResponseImprovement }}% improvement</span>
                                    </p>
                                    <p class="text-xs text-gray-500">Compared to last month</p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Uptime</h4>
                            <div class="flex items-center">
                                <div class="h-16 w-16 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                    <span class="text-lg font-bold">{{ $uptime }}%</span>
                                </div>
                                <div>
                                    <p class="text-green-500 text-sm">
                                        <i class="fas fa-arrow-up mr-1"></i>
                                        <span>{{ $uptimeImprovement }}% improvement</span>
                                    </p>
                                    <p class="text-xs text-gray-500">Compared to last month</p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Error Rate</h4>
                            <div class="flex items-center">
                                <div class="h-16 w-16 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf] mr-3">
                                    <span class="text-lg font-bold">{{ $errorRate }}%</span>
                                </div>
                                <div>
                                    <p class="text-green-500 text-sm">
                                        <i class="fas fa-arrow-down mr-1"></i>
                                        <span>{{ $errorRateImprovement }}% improvement</span>
                                    </p>
                                    <p class="text-xs text-gray-500">Compared to last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Sidebar Toggle -->
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
    });
</script>
@endsection