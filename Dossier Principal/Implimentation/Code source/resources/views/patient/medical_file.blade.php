@extends('layouts.private_space')

@section('title', 'Patient Medical File')

@section('content')
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="bg-white shadow-lg w-64 flex-shrink-0 hidden md:block">
        <div class="p-4 bg-[#afdddd] text-white bg-cover bg-center" style="background-image: url('{{ asset('images/health-still-life-with-copy-space.jpg') }}');">
            <h2 class="text-2xl font-bold">DocLine</h2>
            <p class="text-white text-opacity-80 text-sm">Patient Portal</p>
        </div>
        <div class="py-4">
            <div class="px-4 py-3">
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-primary flex items-center justify-center text-white font-bold">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                    <div class="ml-3">
                        <p class="font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">ID: {{ Auth::user()->id }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <a href="{{ route('patient.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-primary transition-all">
                    <i class="fas fa-home mr-3 text-gray-400"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('patient.appointments') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-primary transition-all">
                    <i class="fas fa-calendar-alt mr-3 text-gray-400"></i>
                    <span>Appointments</span>
                </a>
                <a href="{{ route('patient.certificate') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-primary transition-all">
                    <i class="fas fa-file-medical mr-3 text-gray-400"></i>
                    <span>Medical Certificates</span>
                </a>
                <a href="{{ route('patient.medical-file') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-primary">
                    <i class="fas fa-notes-medical mr-3 text-primary"></i>
                    <span>Medical File</span>
                </a>
            </div>
        </div>
        <div class="absolute bottom-0 w-64 p-4 border-t">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center text-gray-600 hover:text-primary">
                <i class="fas fa-sign-out-alt mr-3"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>

    <!-- Mobile Sidebar Toggle -->
    <div class="md:hidden fixed bottom-4 right-4 z-50">
        <button id="sidebarToggle" class="bg-primary text-white p-3 rounded-full shadow-lg">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobileSidebar" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-40 hidden">
        <div class="bg-white h-full w-64 shadow-lg">
            <div class="p-4 bg-primary text-white flex justify-between">
                <div>
                    <h2 class="text-2xl font-bold">DocLine</h2>
                    <p class="text-white text-opacity-80 text-sm">Patient Portal</p>
                </div>
                <button id="closeSidebar" class="text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="py-4">
                <div class="px-4 py-3">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-primary flex items-center justify-center text-white font-bold">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">ID: {{ Auth::user()->id }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="{{ route('patient.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-primary transition-all">
                        <i class="fas fa-home mr-3 text-gray-400"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('patient.appointments') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-primary transition-all">
                        <i class="fas fa-calendar-alt mr-3 text-gray-400"></i>
                        <span>Appointments</span>
                    </a>
                    <a href="{{ route('patient.certificate') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-primary transition-all">
                        <i class="fas fa-file-medical mr-3 text-gray-400"></i>
                        <span>Medical Certificates</span>
                    </a>
                    <a href="{{ route('patient.medical-file') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-primary">
                        <i class="fas fa-notes-medical mr-3 text-primary"></i>
                        <span>Medical File</span>
                    </a>
                </div>
            </div>
            <div class="absolute bottom-0 w-64 p-4 border-t">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();" class="flex items-center text-gray-600 hover:text-primary">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Logout</span>
                </a>
                <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <!-- My Medical Files Section -->
    <div class="flex-1 bg-gray-50">
        <div class="bg-white shadow-sm">
            <div class="flex justify-between items-center px-6 py-4">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-700">Medical Files</h1>
                </div>
                <div class="flex items-center">
                    <span class="text-sm text-gray-500 mr-2">Need help?</span>
                    <button class="text-primary hover:text-primary">
                        <i class="fas fa-question-circle"></i>
                    </button>
                </div>
            </div>
        </div>        
        <!-- Medical Files List -->
        <div class="space-y-4 p-6">
            @if ($medicalfiles && count($medicalfiles) > 0)
                @foreach ($medicalfiles as $medicalfile)
                    <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 shadow-lg">
                        <div class="flex flex-col md:flex-row md:items-center justify-between">
                            <div class="flex items-start mb-3 md:mb-0">
                                <div class="bg-gray-100 rounded-full p-3 mr-4 text-primary">
                                    <i class="fas fa-file-medical-alt text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">{{ $medicalfile->raison_consultation }}</h3>
                                    <p class="text-gray-600">Issued by Dr. {{ $medicalfile->doctor->name }} {{ $medicalfile->doctor->last_name }}</p>
                                    <p class="text-sm text-gray-500">Created on: {{ $medicalfile->created_at->format('d M, Y') }}</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="bg-primary hover:bg-primary text-white px-3 py-1 rounded text-sm">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                                <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                    <i class="fas fa-download mr-1"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>

                    <!--Medical consultation file preview-->
                    <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 shadow-lg">
                        <!-- Medical File Header -->
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 pb-4 border-b">
                            <div class="flex items-center">
                                <div class="bg-primary bg-opacity-20 rounded-full p-3 mr-4 text-primary">
                                    <i class="fas fa-user-md text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">Patient Medical File</h2>
                                    <p class="text-gray-600">Last updated: {{ $medicalfile->updated_at->format('d M, Y') }}</p>
                                </div>
                            </div>
                            <div class="flex space-x-2 mt-4 md:mt-0">
                                <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                    <i class="fas fa-download mr-1"></i> Download
                                </button>
                            </div>
                        </div>
                        
                        <!-- Basic Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-info-circle text-primary mr-2"></i> Basic Information
                            </h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Full Name</p>
                                        <p class="font-medium">{{ $medicalfile->patient->name }} {{ $medicalfile->patient->last_name }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Date of Birth</p>
                                        <p class="font-medium">{{ $medicalfile->patient->birthdate }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Gender</p>
                                        <p class="font-medium">{{ $medicalfile->patient->gender ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Weight</p>
                                        <p class="font-medium">{{ $medicalfile->weight }} kg</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Contact</p>
                                        <p class="font-medium">{{ $medicalfile->patient->phone }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Blood Type</p>
                                        <p class="font-medium">{{ $medicalfile->patient->blood_type ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                
                                <!-- Vital Signs -->
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <h4 class="text-md font-medium text-gray-700 mb-2">Recent Vital Signs</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div class="flex items-center">
                                            <div class="bg-primary bg-opacity-20 rounded-full p-2 mr-3">
                                                <i class="fas fa-heartbeat text-primary"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500">Heart Rate</p>
                                                <p class="font-medium">{{ $medicalfile->bpm }} BPM</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="bg-primary bg-opacity-20 rounded-full p-2 mr-3">
                                                <i class="fas fa-weight text-primary"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500">Blood Pressure</p>
                                                <p class="font-medium">{{ $medicalfile->blood_pressure }}/80 mmHg</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="bg-primary bg-opacity-20 rounded-full p-2 mr-3">
                                                <i class="fas fa-tint text-primary"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500">Blood Sugar</p>
                                                <p class="font-medium">{{ $medicalfile->blood_sugar }} mg/dL</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Medical History Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-history text-primary mr-2"></i> Medical History
                            </h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <h4 class="text-md font-medium text-gray-700 mb-2">Past Illnesses</h4>
                                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                                            <li>{{ $medicalfile->patient->past_illnesses }} (2020)</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="text-md font-medium text-gray-700 mb-2">Surgeries</h4>
                                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                                            <li>{{ $medicalfile->patient->surgeries }}</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="text-md font-medium text-gray-700 mb-2">Allergies</h4>
                                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                                            <li>{{ $medicalfile->patient->allergies }}</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="text-md font-medium text-gray-700 mb-2">Chronic Conditions</h4>
                                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                                            <li>{{ $medicalfile->patient->chronic }} (diagnosed 2019)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Current Diagnosis Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-stethoscope text-primary mr-2"></i> Current Diagnosis
                            </h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="mb-4">
                                    <h4 class="text-md font-medium text-gray-700 mb-2">Diagnosis</h4>
                                    <p class="text-gray-600">{{ $medicalfile->current_diagnosis }}</p>
                                </div>
                                <div class="mb-4">
                                    <h4 class="text-md font-medium text-gray-700 mb-2">Symptoms</h4>
                                    <p class="text-gray-600">{{ $medicalfile->symptoms }}</p>
                                </div>
                                <div>
                                    <h4 class="text-md font-medium text-gray-700 mb-2">Date of Diagnosis</h4>
                                    <p class="text-gray-600">{{ $medicalfile->created_at->format('d M, Y') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Treatment Plan Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-prescription-bottle-alt text-primary mr-2"></i> Treatment Plan
                            </h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medication</th>
                                                <th class="px-4 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosage</th>
                                                <th class="px-4 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Frequency</th>
                                                <th class="px-4 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">                                            
                                            <tr>
                                                <td class="px-4 py-3">{{ $medicalfile->appointment->treatment->medicament ?? 'N/A'}}</td>
                                                <td class="px-4 py-3">{{ $medicalfile->appointment->treatment->dosage ?? 'N/A'}}</td>
                                                <td class="px-4 py-3">{{ $medicalfile->appointment->treatment->frequency ?? 'N/A'}}</td>
                                                <td class="px-4 py-3">{{ $medicalfile->appointment->treatment->duration ?? 'N/A'}} days</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Doctor's Notes Section -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-comment-medical text-primary mr-2"></i> Doctor's Notes
                            </h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="mb-2 flex items-start">
                                    <div class="h-8 w-8 rounded-full bg-primary flex items-center justify-center text-white font-bold mr-2 flex-shrink-0 mt-1">
                                        SM
                                    </div>
                                    <div>
                                        <div class="flex items-center">
                                            <p class="font-medium">Dr. {{ $medicalfile->doctor->name }} {{ $medicalfile->doctor->last_name }}</p>
                                            <span class="mx-2 text-gray-400">•</span>
                                            <p class="text-sm text-gray-500">{{ $medicalfile->created_at->format('d M, Y') }}</p>
                                        </div>
                                        <p class="text-gray-600 mt-1">
                                            {{ $medicalfile->doctor_note }} 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="py-8 text-center border border-dashed border-gray-300 rounded-lg">
                    <div class="text-primary mb-2">
                        <i class="fas fa-folder-open text-4xl"></i>
                    </div>
                    <h3 class="text-gray-500 font-medium">No medical files available</h3>
                    <p class="text-gray-400 text-sm">Your medical files will appear here once uploaded by your doctor</p>
                </div>
            @endif
            

        </div>
        
        <!-- No Files Message (hidden by default) -->
    </div>
</div>
@endsection