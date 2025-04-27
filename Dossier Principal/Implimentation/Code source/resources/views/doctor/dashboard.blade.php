@extends('layouts.private_space')
@section('title', 'doctor-dashboard')

@section('content')
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="bg-white shadow-lg w-64 flex-shrink-0 hidden md:block">
            <div class="p-4 bg-[#afdddd] text-white bg-cover bg-center" style="background-image: url('{{ asset('images/health-still-life-with-copy-space.jpg') }}');">
                <h2 class="text-2xl font-bold">DocLine</h2>
                <p class="text-white text-sm">Doctor Portal</p>
            </div>
            <div class="py-4">
                <div class="px-4 py-3">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                            {{ substr(Auth::user()->name, 0 , 1)}}{{ substr(Auth::user()->last_name, 0 , 1)}}
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">Dr. {{ Auth::user()->name}} {{ Auth::user()->last_name}}</p>
                            <p class="text-xs text-gray-500">ID:  {{ Auth::user()->id}}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="{{ route('doctor.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                        <i class="fas fa-home mr-3 text-[#7fbfbf]"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('doctor.appointments') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-calendar-alt mr-3 text-gray-400"></i>
                        <span>Appointments</span>
                    </a>
                    <a href="" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-file-medical mr-3 text-gray-400"></i>
                        <span>Certificate Requests</span>
                    </a>
                    <a href="doctor_patients.html" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-users mr-3 text-gray-400"></i>
                        <span>My Patients</span>
                    </a>
                    <a href="doctor_profile.html" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-user-md mr-3 text-gray-400"></i>
                        <span>Personal Information</span>
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
                        <p class="text-white text-opacity-80 text-sm">Doctor Portal</p>
                    </div>
                    <button id="closeSidebar" class="text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="py-4">
                    <div class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                {{ substr(Auth::user()->name, 0 , 1)}}{{ substr(Auth::user()->last_name, 0 , 1)}}
                            </div>
                            <div class="ml-3">
                                <p class="font-medium">Dr. {{ Auth::user()->name}} {{ Auth::user()->last_name}}</p>
                                <p class="text-xs text-gray-500">ID: {{ Auth::user()->id}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('doctor.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                            <i class="fas fa-home mr-3 text-[#7fbfbf]"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('doctor.appointments') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-calendar-alt mr-3 text-gray-400"></i>
                            <span>Appointments</span>
                        </a>
                        <a href="doctor_certificate.html" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-file-medical mr-3 text-gray-400"></i>
                            <span>Certificate Requests</span>
                        </a>
                        <a href="doctor_patients.html" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-users mr-3 text-gray-400"></i>
                            <span>My Patients</span>
                        </a>
                        <a href="doctor_profile.html" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-user-md mr-3 text-gray-400"></i>
                            <span>Personal Information</span>
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

        <!-- Main Content -->
        <div class="flex-1 bg-gray-50">
            <!-- Header -->
            <div class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-6 py-4">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-700">Doctor Dashboard</h1>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 mr-4">Today: {{ date('d M, Y') }}</span>
                        <button class="text-[#7fbfbf] hover:text-[#afdddd]">
                            <i class="fas fa-question-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Quick Stats Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Today's Appointments Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Today's Appointments</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $appointments->count()}}</h3>
                            </div>
                            <div class="bg-gray-100 h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar-day text-gray-500 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center">
                                <span class="text-gray-500 text-xs font-medium mr-1">
                                    <i class="fas fa-clock"></i>
                                </span>
                                <span class="text-gray-500 text-xs">Next: 10:30 AM - John Patient</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pending Certificates Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Pending Certificates</p>
                                <h3 class="text-2xl font-bold text-gray-800">3</h3>
                            </div>
                            <div class="bg-gray-100 h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-medical text-gray-500 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center">
                                <span class="text-gray-500 text-xs font-medium mr-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                </span>
                                <span class="text-gray-500 text-xs">Oldest request: 2 days ago</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Total Patients Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Patients</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{$patients->count()}}</h3>
                            </div>
                            <div class="bg-gray-100 h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-gray-500 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center">
                                <span class="text-gray-500 text-xs font-medium mr-1">
                                    <i class="fas fa-user-plus"></i>
                                </span>
                                <span class="text-gray-500 text-xs">5 new this month</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Middle Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Today's Schedule Card -->
                    <div class="bg-white rounded-lg shadow lg:col-span-2">
                        <div class="p-5 border-b border-gray-100">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-800">Today's Schedule</h3>
                                <a href="doctor_appointments.html" class="text-sm text-[#7fbfbf] hover:text-[#afdddd]">View All</a>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="space-y-5">
                                @foreach ($appointments as $appointment)
                                    <div class="flex items-start">
                                        <div class="bg-[#e6f5f5] rounded-lg p-3 flex-shrink-0">
                                            <span class="text-[#7fbfbf] font-bold">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}</span>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="font-medium text-gray-800">{{ $appointment->patient->name }} {{ $appointment->patient->last_name }}</h4>
                                            <p class="text-sm text-gray-600">{{ $appointment->visit_type }}</p>
                                            <div class="flex mt-2">
                                                <button class="text-xs bg-[#e6f5f5] text-[#7fbfbf] px-2 py-1 rounded mr-2">
                                                    <i class="fas fa-check mr-1"></i> Completed
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- Certificate Requests Card -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-5 border-b border-gray-100">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-800">Certificate Requests</h3>
                                <a href="doctor_certificate.html" class="text-sm text-[#7fbfbf] hover:text-[#afdddd]">View All</a>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="space-y-4">
                                @foreach ($certificates as $certificate)
                                    <div class="border border-gray-100 rounded-lg p-3">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="font-medium text-gray-800">{{ $certificate->patient->name }} {{ $certificate->patient->last_name }}</p>
                                                <p class="text-xs text-gray-500">{{ $certificate->reason }}</p>
                                                <p class="text-xs text-gray-400 mt-1">Requested: {{ $certificate->created_at->diffForHumans() }}</p>
                                            </div>
                                            <div class="bg-yellow-100 px-2 py-1 rounded text-xs text-yellow-600 font-medium">
                                                Pending
                                            </div>
                                        </div>
                                        <div class="flex mt-3 space-x-2">
                                            <form action="{{ route('doctor.accept.certificate', $certificate->id) }}" method="GET" class="inline">
                                                @csrf
                                                <button type="submit" class="bg-[#afdddd] hover:bg-[#8fcece] text-white px-3 py-1 rounded text-xs">
                                                    Approve
                                                </button>
                                            </form>
                                            <form action="{{ route('doctor.reject.certificate', $certificate->id) }}" method="GET" class="inline">
                                                @csrf
                                                <button type="submit" class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-xs hover:bg-gray-50">
                                                    Reject
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
</body>
@endsection