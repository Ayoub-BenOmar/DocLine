@extends('layouts.private_space')
@section('title', 'patient-appoitments')

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
                    <a href="{{ route('patient-dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-home mr-3 text-gray-400"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('patient-appointments') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                        <i class="fas fa-calendar-alt mr-3 text-[#7fbfbf]"></i>
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
                <a href="#" class="flex items-center text-gray-600 hover:text-[#7fbfbf]">
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
                        <a href="{{ route('patient-dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                            <i class="fas fa-home mr-3 text-[#7fbfbf]"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('patient-appointments') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
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
                    <a href="#" class="flex items-center text-gray-600 hover:text-[#7fbfbf]">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content - Appointments Page -->
        <div class="flex-1 bg-gray-50">
            <!-- Top navigation -->
            <div class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-6 py-4">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-700">My Appointments</h1>
                    </div>
                </div>
            </div>
            
            <!-- Appointments Content -->
            <div class="p-6">
                <!-- Filter and Search -->
                <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <!-- <div class="flex space-x-2">
                            <button class="bg-[#afdddd] text-white px-4 py-2 rounded-md text-sm">All</button>
                            <button class="bg-white border border-gray-300 text-gray-600 px-4 py-2 rounded-md text-sm hover:bg-gray-50">Upcoming</button>
                            <button class="bg-white border border-gray-300 text-gray-600 px-4 py-2 rounded-md text-sm hover:bg-gray-50">Past</button>
                        </div> -->
                        <div class="relative">
                            <input type="text" placeholder="Search appointments..." class="pl-10 pr-4 py-2 border rounded-md w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Upcoming Appointments -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Upcoming Appointments</h2>
                    <div class="space-y-4">
                        <!-- Appointment Card 1 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="border-l-4 border-[#afdddd]">
                                <div class="p-4">
                                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                                        <div class="flex items-start mb-3 md:mb-0">
                                            <div class="bg-[#e6f5f5] rounded-full p-3 mr-4 text-[#7fbfbf]">
                                                <i class="fas fa-user-md text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-800">Dr. Sarah Johnson</h3>
                                                <p class="text-gray-600">General Consultation</p>
                                                <div class="flex items-center mt-1 text-sm text-gray-500">
                                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                                    <span>Medical Center, Floor 3</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center md:text-right">
                                            <p class="text-[#7fbfbf] font-semibold">Mar 19, 2025</p>
                                            <p class="text-sm text-gray-500">10:00 AM</p>
                                            <div class="mt-3 flex flex-wrap gap-2 justify-center md:justify-end">
                                                <!-- <button class="bg-[#afdddd] hover:bg-[#8fcece] text-white px-3 py-1 rounded text-sm">
                                                    Join Video
                                                </button>
                                                <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                                    Reschedule
                                                </button>
                                                <button class="bg-white border border-red-300 text-red-500 px-3 py-1 rounded text-sm hover:bg-red-50">
                                                    Cancel
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Appointment Card 2 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="border-l-4 border-[#d0ebeb]">
                                <div class="p-4">
                                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                                        <div class="flex items-start mb-3 md:mb-0">
                                            <div class="bg-[#e6f5f5] rounded-full p-3 mr-4 text-[#7fbfbf]">
                                                <i class="fas fa-user-md text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-800">Dr. Michael Chen</h3>
                                                <p class="text-gray-600">Follow-up</p>
                                                <div class="flex items-center mt-1 text-sm text-gray-500">
                                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                                    <span>Medical Center, Floor 2</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center md:text-right">
                                            <p class="text-[#7fbfbf] font-semibold">Mar 25, 2025</p>
                                            <p class="text-sm text-gray-500">2:30 PM</p>
                                            <div class="mt-3 flex flex-wrap gap-2 justify-center md:justify-end">
                                                <!-- <button class="bg-[#afdddd] hover:bg-[#8fcece] text-white px-3 py-1 rounded text-sm">
                                                    Join Video
                                                </button>
                                                <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                                    Reschedule
                                                </button>
                                                <button class="bg-white border border-red-300 text-red-500 px-3 py-1 rounded text-sm hover:bg-red-50">
                                                    Cancel
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Past Appointments -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Past Appointments</h2>
                    <div class="space-y-4">
                        <!-- Past Appointment 1 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden opacity-75">
                            <div class="border-l-4 border-gray-400">
                                <div class="p-4">
                                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                                        <div class="flex items-start mb-3 md:mb-0">
                                            <div class="bg-gray-100 rounded-full p-3 mr-4 text-gray-500">
                                                <i class="fas fa-user-md text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-800">Dr. Sarah Johnson</h3>
                                                <p class="text-gray-600">Regular Check-up</p>
                                                <div class="flex items-center mt-1 text-sm text-gray-500">
                                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                                    <span>Medical Center, Floor 3</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center md:text-right">
                                            <p class="text-gray-500 font-semibold">Feb 15, 2025</p>
                                            <p class="text-sm text-gray-500">11:30 AM</p>
                                            <div class="mt-3 flex flex-wrap gap-2 justify-center md:justify-end">
                                                <!-- <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                                    View Summary
                                                </button>
                                                <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                                    Book Again
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Past Appointment 2 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden opacity-75">
                            <div class="border-l-4 border-gray-400">
                                <div class="p-4">
                                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                                        <div class="flex items-start mb-3 md:mb-0">
                                            <div class="bg-gray-100 rounded-full p-3 mr-4 text-gray-500">
                                                <i class="fas fa-user-md text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-800">Dr. Robert Miller</h3>
                                                <p class="text-gray-600">X-Ray Consultation</p>
                                                <div class="flex items-center mt-1 text-sm text-gray-500">
                                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                                    <span>Medical Center, Floor 1</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center md:text-right">
                                            <p class="text-gray-500 font-semibold">Feb 10, 2025</p>
                                            <p class="text-sm text-gray-500">9:15 AM</p>
                                            <div class="mt-3 flex flex-wrap gap-2 justify-center md:justify-end">
                                                <!-- <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                                    View Summary
                                                </button>
                                                <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                                    Book Again
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Past Appointment 3 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden opacity-75">
                            <div class="border-l-4 border-gray-400">
                                <div class="p-4">
                                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                                        <div class="flex items-start mb-3 md:mb-0">
                                            <div class="bg-gray-100 rounded-full p-3 mr-4 text-gray-500">
                                                <i class="fas fa-user-md text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-800">Dr. Michael Chen</h3>
                                                <p class="text-gray-600">Initial Consultation</p>
                                                <div class="flex items-center mt-1 text-sm text-gray-500">
                                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                                    <span>Medical Center, Floor 2</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center md:text-right">
                                            <p class="text-gray-500 font-semibold">Jan 28, 2025</p>
                                            <p class="text-sm text-gray-500">3:00 PM</p>
                                            <div class="mt-3 flex flex-wrap gap-2 justify-center md:justify-end">
                                                <!-- <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                                    View Summary
                                                </button>
                                                <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                                    Book Again
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection