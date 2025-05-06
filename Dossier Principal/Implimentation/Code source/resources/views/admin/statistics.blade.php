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
        
        <!-- Statistics Content -->
        <div class="p-3 md:p-6">
            <!-- User Statistics Section -->
            <div class="mb-6 md:mb-8">
                <h2 class="text-base md:text-lg font-semibold text-gray-700 mb-3 md:mb-4">User Statistics</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-6">
                    <!-- Total Users Card -->
                    <div class="bg-white rounded-lg shadow p-3 md:p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-xs md:text-sm">Total Users</p>
                                <h3 class="text-lg md:text-2xl font-bold text-gray-800">{{ $totalUsers }}</h3>
                            </div>
                            <div class="bg-[#e6f5f5] h-8 md:h-12 w-8 md:w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-[#7fbfbf] text-base md:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Doctors Card -->
                    <div class="bg-white rounded-lg shadow p-3 md:p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-xs md:text-sm">Total Doctors</p>
                                <h3 class="text-lg md:text-2xl font-bold text-gray-800">{{ $totalDoctors }}</h3>
                            </div>
                            <div class="bg-[#e6f5f5] h-8 md:h-12 w-8 md:w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-md text-[#7fbfbf] text-base md:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Patients Card -->
                    <div class="bg-white rounded-lg shadow p-3 md:p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-xs md:text-sm">Total Patients</p>
                                <h3 class="text-lg md:text-2xl font-bold text-gray-800">{{ $totalPatients }}</h3>
                            </div>
                            <div class="bg-[#e6f5f5] h-8 md:h-12 w-8 md:w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user text-[#7fbfbf] text-base md:text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Appointment Statistics Section -->
            <div class="mb-6 md:mb-8">
                <h2 class="text-base md:text-lg font-semibold text-gray-700 mb-3 md:mb-4">Appointment Statistics</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-6">
                    <!-- Total Appointments Card -->
                    <div class="bg-white rounded-lg shadow p-3 md:p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-xs md:text-sm">Total Appointments</p>
                                <h3 class="text-lg md:text-2xl font-bold text-gray-800">{{ $totalAppointments }}</h3>
                            </div>
                            <div class="bg-[#e6f5f5] h-8 md:h-12 w-8 md:w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar-check text-[#7fbfbf] text-base md:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Completed Appointments Card -->
                    <div class="bg-white rounded-lg shadow p-3 md:p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-xs md:text-sm">Completed Appointments</p>
                                <h3 class="text-lg md:text-2xl font-bold text-gray-800">{{ $completedAppointments }}</h3>
                            </div>
                            <div class="bg-green-100 h-8 md:h-12 w-8 md:w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-500 text-base md:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Scheduled Appointments Card -->
                    <div class="bg-white rounded-lg shadow p-3 md:p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-xs md:text-sm">Scheduled Appointments</p>
                                <h3 class="text-lg md:text-2xl font-bold text-gray-800">{{ $scheduledAppointments }}</h3>
                            </div>
                            <div class="bg-blue-100 h-8 md:h-12 w-8 md:w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar text-blue-500 text-base md:text-xl"></i>
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
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
                <h2 class="text-base md:text-lg font-semibold text-gray-700 mb-3 md:mb-4">Top Doctors</h2>
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="w-full overflow-x-auto">
                        <div class="min-w-[600px] md:min-w-full">
                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                        <th scope="col" class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Specialty</th>
                                        <th scope="col" class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Appointments</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($topDoctors as $doctor)
                                    <tr>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-8 w-8 md:h-10 md:w-10 rounded-full bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                                    <i class="fas fa-user-md text-sm md:text-base"></i>
                                                </div>
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-gray-900">{{ $doctor->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $doctor->speciality->speciality_name }}</div>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $doctor->total_appointments }}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Top City and Specialty Section -->
            <div class="mb-6 md:mb-8 mt-6">
                <h2 class="text-base md:text-lg font-semibold text-gray-700 mb-3 md:mb-4">Top City & Specialty</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-6">
                    <!-- Top City Card -->
                    <div class="bg-white rounded-lg shadow p-3 md:p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-xs md:text-sm">Top City</p>
                                <h3 class="text-lg md:text-2xl font-bold text-gray-800">{{ $topCities->first()->name }}</h3>
                                <p class="text-xs md:text-sm text-gray-500 mt-1">{{ $topCities->first()->appointments }} Appointments</p>
                            </div>
                            <div class="bg-[#e6f5f5] h-8 md:h-12 w-8 md:w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-[#7fbfbf] text-base md:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Top Specialty Card -->
                    <div class="bg-white rounded-lg shadow p-3 md:p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-xs md:text-sm">Top Specialty</p>
                                <h3 class="text-lg md:text-2xl font-bold text-gray-800">{{ $topSpecialties->first()->name }}</h3>
                                <p class="text-xs md:text-sm text-gray-500 mt-1">{{ $topSpecialties->first()->appointments }} Appointments</p>
                            </div>
                            <div class="bg-[#e6f5f5] h-8 md:h-12 w-8 md:w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-stethoscope text-[#7fbfbf] text-base md:text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection