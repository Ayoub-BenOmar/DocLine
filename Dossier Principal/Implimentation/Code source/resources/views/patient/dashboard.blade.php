@extends('layouts.private_space')
@section('title', 'Patient-Dashboard')

@section('content')
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="bg-white shadow-lg w-64 flex-shrink-0 hidden md:block">
            <div class="p-4 bg-[#afdddd] text-white">
                <h2 class="text-2xl font-bold">DocLine</h2>
                <p class="text-white text-opacity-80 text-sm">Patient Portal</p>
            </div>
            <div class="py-4">
                <div class="px-4 py-3">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                            JP
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">John Patient</p>
                            <p class="text-xs text-gray-500">ID: 12345678</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="{{ route('patient.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                        <i class="fas fa-home mr-3 text-[#7fbfbf]"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('patient.appointments') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-calendar-alt mr-3 text-gray-400"></i>
                        <span>Appointments</span>
                    </a>
                    <a href="patient_medical_file.html" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-file-medical mr-3 text-gray-400"></i>
                        <span>Medical Certificates</span>
                    </a>
                    <a href="patient_certificate.html" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-notes-medical mr-3 text-gray-400"></i>
                        <span>Medical File</span>
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
                        <p class="text-white text-opacity-80 text-sm">Patient Portal</p>
                    </div>
                    <button id="closeSidebar" class="text-white">
                        <!-- <i class="fas fa-times"></i> -->
                    </button>
                </div>
                <div class="py-4">
                    <div class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                JP
                            </div>
                            <div class="ml-3">
                                <p class="font-medium">John Patient</p>
                                <p class="text-xs text-gray-500">ID: 12345678</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('patient.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                            <i class="fas fa-home mr-3 text-[#7fbfbf]"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('patient.appointments') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-calendar-alt mr-3 text-gray-400"></i>
                            <span>Appointments</span>
                        </a>
                        <a href="patient_certificate.html" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-file-medical mr-3 text-gray-400"></i>
                            <span>Medical Certificates</span>
                        </a>
                        <a href="patient_medical_file.html" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-notes-medical mr-3 text-gray-400"></i>
                            <span>Medical File</span>
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
        <div class="flex-1">
            <!-- Top navigation -->
            <div class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-6 py-4">
                    <div class="flex items-center">
                        <button class="md:hidden mr-4 text-gray-600">
                            <!-- <i class="fas fa-bars"></i> -->
                        </button>
                        <h1 class="text-xl font-semibold text-gray-700">Dashboard</h1>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard Content -->
            <div class="p-6">
                <div class="mb-6">
                    <div class="bg-[#afdddd] rounded-lg shadow-md p-4 text-white">
                        <div class="flex items-center">
                            <div class="rounded-full bg-white bg-opacity-30 p-3 mr-4">
                                <i class="fas fa-user-md text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-lg font-semibold">Welcome back, John!</h2>
                                <p class="text-white text-opacity-80">Your next appointment is in 2 days</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm">Upcoming Appointments</p>
                                <h3 class="text-2xl font-bold text-gray-700">2</h3>
                            </div>
                            <div class="bg-[#e6f5f5] rounded-full p-3 text-[#7fbfbf]">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-[#7fbfbf] text-sm hover:underline">View all appointments</a>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm">Pending Certificates</p>
                                <h3 class="text-2xl font-bold text-gray-700">1</h3>
                            </div>
                            <div class="bg-[#e6f5f5] rounded-full p-3 text-[#7fbfbf]">
                                <i class="fas fa-file-medical"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-[#7fbfbf] text-sm hover:underline">Request new certificate</a>
                        </div>
                    </div>
                </div>
                
                <!-- Appointments Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-700">Upcoming Appointments</h3>
                            <a href="#" class="text-[#7fbfbf] hover:underline text-sm">View all</a>
                        </div>
                        <div class="space-y-4">
                            <div class="border-l-4 border-[#afdddd] pl-4 py-2">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="font-medium">Dr. Sarah Johnson</p>
                                        <p class="text-sm text-gray-500">General Consultation</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[#7fbfbf] font-medium">Mar 19, 2025</p>
                                        <p class="text-sm text-gray-500">10:00 AM</p>
                                    </div>
                                </div>
                                <div class="mt-2 flex space-x-2">
                                    <!-- <button class="bg-[#afdddd] hover:bg-[#8fcece] text-white text-xs py-1 px-2 rounded">
                                        Join Video
                                    </button>
                                    <button class="bg-white border border-gray-300 text-gray-600 text-xs py-1 px-2 rounded hover:bg-gray-50">
                                        Reschedule
                                    </button> -->
                                </div>
                            </div>
                            
                            <div class="border-l-4 border-[#d0ebeb] pl-4 py-2">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="font-medium">Dr. Michael Chen</p>
                                        <p class="text-sm text-gray-500">Follow-up</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[#7fbfbf] font-medium">Mar 25, 2025</p>
                                        <p class="text-sm text-gray-500">2:30 PM</p>
                                    </div>
                                </div>
                                <div class="mt-2 flex space-x-2">
                                    <!-- <button class="bg-[#afdddd] hover:bg-[#8fcece] text-white text-xs py-1 px-2 rounded">
                                        Join Video
                                    </button>
                                    <button class="bg-white border border-gray-300 text-gray-600 text-xs py-1 px-2 rounded hover:bg-gray-50">
                                        Reschedule
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Medical Records Section -->
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-700">Recent Medical Records</h3>
                            <a href="#" class="text-[#7fbfbf] hover:underline text-sm">View all</a>
                        </div>
                        <div class="space-y-4">
                            <div class="p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <div class="flex items-center">
                                    <div class="bg-[#e6f5f5] rounded-full p-2 mr-3 text-[#7fbfbf]">
                                        <i class="fas fa-file-medical"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-medium">Blood Test Results</p>
                                        <p class="text-sm text-gray-500">Added by Dr. Johnson • Mar 05, 2025</p>
                                    </div>
                                    <button class="text-gray-400 hover:text-[#7fbfbf]">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <div class="flex items-center">
                                    <div class="bg-[#e6f5f5] rounded-full p-2 mr-3 text-[#7fbfbf]">
                                        <i class="fas fa-file-medical"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-medium">Prescription</p>
                                        <p class="text-sm text-gray-500">Added by Dr. Chen • Feb 28, 2025</p>
                                    </div>
                                    <button class="text-gray-400 hover:text-[#7fbfbf]">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <div class="flex items-center">
                                    <div class="bg-[#e6f5f5] rounded-full p-2 mr-3 text-[#7fbfbf]">
                                        <i class="fas fa-file-medical"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-medium">X-Ray Report</p>
                                        <p class="text-sm text-gray-500">Added by Dr. Miller • Feb 12, 2025</p>
                                    </div>
                                    <button class="text-gray-400 hover:text-[#7fbfbf]">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Health Metrics Section -->
                <div class="mt-6">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-700">Health Metrics</h3>
                        </div>
                        
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Blood Pressure</p>
                                        <p class="text-lg font-semibold">120/80</p>
                                    </div>
                                    <div class="text-[#7fbfbf]">
                                        <i class="fas fa-heartbeat"></i>
                                    </div>
                                </div>
                                <p class="text-xs text-[#7fbfbf] mt-1">Normal</p>
                            </div>
                            
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Heart Rate</p>
                                        <p class="text-lg font-semibold">72 bpm</p>
                                    </div>
                                    <div class="text-[#7fbfbf]">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                </div>
                                <p class="text-xs text-[#7fbfbf] mt-1">Normal</p>
                            </div>
                            
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Weight</p>
                                        <p class="text-lg font-semibold">75 kg</p>
                                    </div>
                                    <div class="text-[#7fbfbf]">
                                        <i class="fas fa-weight"></i>
                                    </div>
                                </div>
                                <p class="text-xs text-[#7fbfbf] mt-1">Stable</p>
                            </div>
                            
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Blood Sugar</p>
                                        <p class="text-lg font-semibold">95 mg/dL</p>
                                    </div>
                                    <div class="text-[#7fbfbf]">
                                        <i class="fas fa-tint"></i>
                                    </div>
                                </div>
                                <p class="text-xs text-[#7fbfbf] mt-1">Normal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="bg-white p-4 border-t mt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-500">© 2025 MediConsult. All rights reserved.</p>
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