@extends('layouts.private_space')
@section('title', 'Doctor-Certificates')

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
                    <a href="{{ route('doctor.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-home mr-3 text-gray-400"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('doctor.appointments') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-calendar-alt mr-3 text-gray-400"></i>
                        <span>Appointments</span>
                    </a>
                    <a href="{{ route('doctor.certificates') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                        <i class="fas fa-file-medical mr-3 text-[#7fbfbf]"></i>
                        <span>Certificate Requests</span>
                    </a>
                    <a href="{{ route('doctor.certificates') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-users mr-3 text-gray-400"></i>
                        <span>My Patients</span>
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
                        <a href="{{ route('doctor.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-home mr-3 text-gray-400"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('doctor.appointments') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-calendar-alt mr-3 text-gray-400"></i>
                            <span>Appointments</span>
                        </a>
                        <a href="{{ route('doctor.certificates') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                            <i class="fas fa-file-medical mr-3 text-[#7fbfbf]"></i>
                            <span>Certificate Requests</span>
                        </a>
                        <a href="" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-users mr-3 text-gray-400"></i>
                            <span>My Patients</span>
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
                        <h1 class="text-xl font-semibold text-gray-700">Certificate Requests</h1>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 mr-4">Today: {{ date('d M, Y') }}</span>
                        <button class="text-[#7fbfbf] hover:text-[#afdddd]">
                            <i class="fas fa-question-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Certificates Content -->
            <div class="p-6">
                <!-- Quick Stats Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <!-- Pending Certificates Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Pending Certificates</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $pendingCertificates->count() }}</h3>
                            </div>
                            <div class="bg-white h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-medical text-primary text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Approved Certificates Card -->
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Approved Certificates</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $approvedCertificates->count() }}</h3>
                            </div>
                            <div class="bg-white h-12 w-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-primary text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Tabs -->
                <div class="bg-white rounded-lg shadow mb-6">
                    <div class="border-b border-gray-200">
                        <nav class="flex -mb-px">
                            <button id="tab-pending" class="tab-btn text-[#7fbfbf] border-[#7fbfbf] whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm">
                                Pending Requests
                            </button>
                            <button id="tab-approved" class="tab-btn text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-6 border-b-2 border-transparent font-medium text-sm">
                                Approved Certificates
                            </button>
                        </nav>
                    </div>
                    
                    <!-- Pending Certificates Tab Content -->
                    <div id="content-pending" class="tab-content p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse ($pendingCertificates as $certificate)
                                <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                                    <div class="p-4 border-b border-gray-100">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="font-medium text-gray-800">{{ $certificate->patient->name }} {{ $certificate->patient->last_name }}</p>
                                                <p class="text-xs text-gray-500">ID: {{ $certificate->patient->id }}</p>
                                            </div>
                                            <div class="bg-yellow-100 px-2 py-1 rounded text-xs text-yellow-600 font-medium">
                                                Pending
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="mb-3">
                                            <p class="text-sm text-gray-600 mb-1">Request Date:</p>
                                            <p class="font-medium text-sm">{{ $certificate->created_at->format('d M, Y') }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="text-sm text-gray-600 mb-1">Period:</p>
                                            <p class="font-medium text-sm">{{ $certificate->from_date}} - {{ $certificate->to_date}}</p>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-sm text-gray-600 mb-1">Purpose:</p>
                                            <p class="text-sm">{{ $certificate->reason }}</p>
                                        </div>
                                        <div class="flex space-x-2 pt-2 border-t">
                                            <form action="{{ route('doctor.accept.certificate', $certificate->id) }}" method="GET" class="inline w-1/2">
                                                @csrf
                                                <button type="submit" class="w-full bg-[#afdddd] hover:bg-[#8acaca] text-white px-3 py-2 rounded text-sm">
                                                    <i class="fas fa-check mr-1"></i> Approve
                                                </button>
                                            </form>
                                            <form action="{{ route('doctor.reject.certificate', $certificate->id) }}" method="GET" class="inline w-1/2">
                                                @csrf
                                                <button type="submit" class="w-full bg-white border border-gray-300 text-gray-600 px-3 py-2 rounded text-sm hover:bg-gray-50">
                                                    <i class="fas fa-times mr-1"></i> Reject
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-3 py-8 flex flex-col items-center justify-center text-center">
                                    <div class="bg-gray-100 rounded-full p-3 mb-3">
                                        <i class="fas fa-file-medical-alt text-2xl text-[#7fbfbf]"></i>
                                    </div>
                                    <p class="text-gray-600 font-medium mb-1">No pending certificate requests</p>
                                    <p class="text-gray-500 text-sm">All certificate requests have been processed</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    
                    <!-- Approved Certificates Tab Content -->
                    <div id="content-approved" class="tab-content p-6 hidden">
                        <div class="mb-4">
                            <div class="relative">
                                <input type="text" placeholder="Search by patient name..." class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                                <div class="absolute left-3 top-2.5 text-gray-400">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse ($approvedCertificates as $certificate)
                                <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                                    <div class="p-4 border-b border-gray-100">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="font-medium text-gray-800">{{ $certificate->patient->name }} {{ $certificate->patient->last_name }}</p>
                                                <p class="text-xs text-gray-500">ID: {{ $certificate->patient->id }}</p>
                                            </div>
                                            <div class="bg-green-100 px-2 py-1 rounded text-xs text-green-600 font-medium">
                                                Approved
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="mb-3">
                                            <p class="text-sm text-gray-600 mb-1">Request Date:</p>
                                            <p class="font-medium text-sm">{{ $certificate->created_at->format('d M, Y') }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="text-sm text-gray-600 mb-1">Period:</p>
                                            <p class="font-medium text-sm">{{ $certificate->start_date->format('d M, Y') }} - {{ $certificate->end_date->format('d M, Y') }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="text-sm text-gray-600 mb-1">Approved Date:</p>
                                            <p class="font-medium text-sm">{{ $certificate->updated_at->format('d M, Y') }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-sm text-gray-600 mb-1">Purpose:</p>
                                            <p class="text-sm">{{ $certificate->reason }}</p>
                                        </div>
                                        <div class="flex space-x-2 pt-2 border-t">
                                            <a href="" class="w-full bg-[#afdddd] hover:bg-[#8acaca] text-white px-3 py-2 rounded text-sm text-center">
                                                <i class="fas fa-eye mr-1"></i> View Certificate
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-3 py-8 flex flex-col items-center justify-center text-center">
                                    <div class="bg-gray-100 rounded-full p-3 mb-3">
                                        <i class="fas fa-file-medical-alt text-2xl text-[#7fbfbf]"></i>
                                    </div>
                                    <p class="text-gray-600 font-medium mb-1">No approved certificates</p>
                                    <p class="text-gray-500 text-sm">You haven't approved any certificate requests yet</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    
                    {{-- <!-- Rejected Certificates Tab Content -->
                    <div id="content-rejected" class="tab-content p-6 hidden">
                        <div class="mb-4">
                            <div class="relative">
                                <input type="text" placeholder="Search by patient name..." class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                                <div class="absolute left-3 top-2.5 text-gray-400">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse ($rejectedCertificates as $certificate)
                                <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                                    <div class="p-4 border-b border-gray-100">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="font-medium text-gray-800">{{ $certificate->patient->name }} {{ $certificate->patient->last_name }}</p>
                                                <p class="text-xs text-gray-500">ID: {{ $certificate->patient->id }}</p>
                                            </div>
                                            <div class="bg-red-100 px-2 py-1 rounded text-xs text-red-600 font-medium">
                                                Rejected
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="mb-3">
                                            <p class="text-sm text-gray-600 mb-1">Request Date:</p>
                                            <p class="font-medium text-sm">{{ $certificate->created_at->format('d M, Y') }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="text-sm text-gray-600 mb-1">Period:</p>
                                            <p class="font-medium text-sm">{{ $certificate->start_date->format('d M, Y') }} - {{ $certificate->end_date->format('d M, Y') }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="text-sm text-gray-600 mb-1">Rejected Date:</p>
                                            <p class="font-medium text-sm">{{ $certificate->updated_at->format('d M, Y') }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-sm text-gray-600 mb-1">Purpose:</p>
                                            <p class="text-sm">{{ $certificate->reason }}</p>
                                        </div>
                                        <div class="flex space-x-2 pt-2 border-t">
                                            <form action="{{ route('doctor.accept.certificate', $certificate->id) }}" method="GET" class="inline w-full">
                                                @csrf
                                                <button type="submit" class="w-full bg-[#afdddd] hover:bg-[#8acaca] text-white px-3 py-2 rounded text-sm">
                                                    <i class="fas fa-check mr-1"></i> Reconsider & Approve
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-3 py-8 flex flex-col items-center justify-center text-center">
                                    <div class="bg-gray-100 rounded-full p-3 mb-3">
                                        <i class="fas fa-file-medical-alt text-2xl text-[#7fbfbf]"></i>
                                    </div>
                                    <p class="text-gray-600 font-medium mb-1">No rejected certificates</p>
                                    <p class="text-gray-500 text-sm">You haven't rejected any certificate requests</p>
                                </div>
                            @endforelse
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar Toggle
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const closeSidebar = document.getElementById('closeSidebar');

            sidebarToggle.addEventListener('click', () => {
                mobileSidebar.classList.toggle('hidden');
            });

            closeSidebar.addEventListener('click', () => {
                mobileSidebar.classList.add('hidden');
            });

            // Tabs Functionality
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    tabButtons.forEach(btn => {
                        btn.classList.remove('text-[#7fbfbf]', 'border-[#7fbfbf]');
                        btn.classList.add('text-gray-500', 'border-transparent');
                    });

                    // Add active class to clicked button
                    button.classList.remove('text-gray-500', 'border-transparent');
                    button.classList.add('text-[#7fbfbf]', 'border-[#7fbfbf]');

                    // Hide all tab contents
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Show the corresponding tab content
                    const contentId = 'content-' + button.id.split('-')[1];
                    document.getElementById(contentId).classList.remove('hidden');
                });
            });
        });
    </script>
</body>
@endsection