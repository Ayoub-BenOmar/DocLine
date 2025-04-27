@extends('layouts.private_space')
@section('title', 'Patient Certificate')

@section('content')
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="bg-white shadow-lg w-64 flex-shrink-0 hidden md:block">
        <div class="p-4 bg-primary text-white">
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
                <a href="{{ route('patient.certificate') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-primary">
                    <i class="fas fa-file-medical mr-3 text-primary"></i>
                    <span>Medical Certificates</span>
                </a>
                <a href="{{ route('patient.medical-file') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-primary transition-all">
                    <i class="fas fa-notes-medical mr-3 text-gray-400"></i>
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
                    <a href="{{ route('patient.certificate') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-primary">
                        <i class="fas fa-file-medical mr-3 text-primary"></i>
                        <span>Medical Certificates</span>
                    </a>
                    <a href="{{ route('patient.medical-file') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-primary transition-all">
                        <i class="fas fa-notes-medical mr-3 text-gray-400"></i>
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

    <!-- Main Content - Medical Certificate Page -->
    <div class="flex-1 bg-gray-50">
        <!-- Top navigation -->
        <div class="bg-white shadow-sm">
            <div class="flex justify-between items-center px-6 py-4">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-700">Medical Certificates</h1>
                </div>
                <div class="flex items-center">
                    <span class="text-sm text-gray-500 mr-2">Need help?</span>
                    <button class="text-primary hover:text-primary">
                        <i class="fas fa-question-circle"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Medical Certificate Content -->
        <div class="p-6">
            <!-- Request Certificate Section -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Request a Medical Certificate</h2>
                <form action="{{ route('patient.medical-certificate.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="doctor_id">
                            Select Doctor
                        </label>
                        <select id="doctor_id" name="doctor_id" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#afdddd] @error('doctor_id') border-red-500 @enderror">
                            <option value="" disabled selected>Choose a doctor from your appointments</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                    Dr. {{ $doctor->name }} {{ $doctor->last_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2" for="from_date">
                                From Date
                            </label>
                            <input type="date" id="from_date" name="from_date" 
                                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#afdddd] @error('from_date') border-red-500 @enderror"
                                value="{{ old('from_date') }}"
                                min="{{ date('Y-m-d') }}">
                            @error('from_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2" for="to_date">
                                To Date
                            </label>
                            <input type="date" id="to_date" name="to_date" 
                                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#afdddd] @error('to_date') border-red-500 @enderror"
                                value="{{ old('to_date') }}"
                                min="{{ date('Y-m-d') }}">
                            @error('to_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="reason">
                            Reason for Certificate
                        </label>
                        <textarea id="reason" name="reason" rows="4" 
                            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#afdddd] @error('reason') border-red-500 @enderror"
                            placeholder="Please provide a reason for requesting the medical certificate...">{{ old('reason') }}</textarea>
                        @error('reason')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-[#afdddd] hover:bg-[#7fbfbf] text-white font-medium py-2 px-4 rounded-md transition-colors">
                            Submit Request
                        </button>
                    </div>
                </form>
            </div>

            <!-- Certificate Requests Table -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Certificate Requests</h2>
                
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Doctor</th>
                                <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Date Requested</th>
                                <th class="p-3 text-center text-sm font-medium text-gray-600 border-b">Status</th>
                            </tr>
                        </thead>
                        @foreach ($certificates as $certificate)
                            <tbody>
                                <!-- Request 1 -->
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3 text-sm text-gray-700">Dr. {{ $certificate->doctor->name }} {{ $certificate->doctor->last_name }}</td>
                                    <td class="p-3 text-sm text-gray-700">{{ $certificate->created_at->format('d M, Y') }}</td>
                                    @if ($certificate->status == 'pending')
                                        <td class="p-3 text-sm text-center">
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">Pending</span>
                                        </td>
                                    @elseif ($certificate->status == 'accepted')
                                        <td class="p-3 text-sm text-center">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Approved</span>
                                        </td>
                                    @else
                                        <td class="p-3 text-sm text-center">
                                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Rejected</span>
                                        </td>
                                    @endif
                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
            
            <!-- My Certificates Section -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">My Certificates</h2>
                <div class="space-y-4">
                    @foreach($certificates as $certificate)
                    <!-- Certificate Card -->
                    <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50">
                        <div class="flex flex-col md:flex-row md:items-center justify-between">
                            <div class="flex items-start mb-3 md:mb-0">
                                <div class="bg-green-100 rounded-full p-3 mr-4 text-green-500">
                                    <i class="fas fa-file-medical text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Medical Certificate</h3>
                                    <p class="text-gray-600">Issued by Dr. {{ $certificate->doctor->name }} {{ $certificate->doctor->last_name }}</p>
                                    <p class="text-sm text-gray-500">Issued on: {{ \Carbon\Carbon::parse($certificate->created_at)->format('d F, Y') }}</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                @if($certificate->status === 'accepted')
                                <button onclick="toggleCertificatePreview({{ $certificate->id }})" class="bg-primary hover:bg-white text-white hover:text-primary px-3 py-1 rounded text-sm">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                                <button onclick="downloadCertificate({{ $certificate->id }})" class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                    <i class="fas fa-download mr-1"></i> Download
                                </button>
                                @endif
                            </div>
                        </div>

                        <!-- Certificate Preview (initially hidden) -->
                        <div id="certificate-preview-{{ $certificate->id }}" class="border hidden border-gray-200 rounded-lg p-6 bg-white mt-4">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-lg font-semibold text-gray-800">Certificate Preview</h3>
                                <button onclick="toggleCertificatePreview({{ $certificate->id }})" class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            
                            <!-- Certificate Document -->
                            <div class="border border-gray-300 rounded-lg p-6 bg-gray-50">
                                <div class="text-center mb-6">
                                    <h2 class="text-xl font-bold text-gray-800">MEDICAL CERTIFICATE</h2>
                                    <p class="text-gray-600">DocLine Medical Platform</p>
                                </div>
                                
                                <div class="mb-4">
                                    <p class="text-gray-800">This is to certify that <span class="font-semibold">{{ $certificate->patient->name }} {{ $certificate->patient->last_name }}</span> has been examined by me on <span class="font-semibold">{{ \Carbon\Carbon::parse($certificate->created_at)->format('d F, Y') }}</span> and found to be suffering from <span class="font-semibold">{{ $certificate->reason }}</span>.</p>
                                </div>
                                
                                <div class="mb-4">
                                    <p class="text-gray-800">The patient is advised to rest and abstain from work/school for a period of <span class="font-semibold">{{ \Carbon\Carbon::parse($certificate->from_date)->diffInDays($certificate->to_date) + 1 }} days</span> from <span class="font-semibold">{{ \Carbon\Carbon::parse($certificate->from_date)->format('d F, Y') }}</span> to <span class="font-semibold">{{ \Carbon\Carbon::parse($certificate->to_date)->format('d F, Y') }}</span>.</p>
                                </div>
                                
                                <div class="mb-6">
                                    <p class="text-gray-800">This certificate is issued upon the request of the patient for whatever legal purpose it may serve.</p>
                                </div>
                                
                                <div class="flex justify-between items-end">
                                    <div>
                                        <p class="font-semibold text-gray-800">Dr. {{ $certificate->doctor->name }} {{ $certificate->doctor->last_name }}, MD</p>
                                        <p class="text-gray-600">License No: {{ $certificate->doctor->medical_licence }}</p>
                                        <p class="text-gray-600">DocLine Medical Platform</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-gray-600">Issued on: {{ \Carbon\Carbon::parse($certificate->created_at)->format('d F, Y') }}</p>
                                        <p class="text-gray-600">Valid until: {{ \Carbon\Carbon::parse($certificate->to_date)->format('d F, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Certificate Actions -->
                            <div class="flex justify-end mt-4 space-x-2">
                                <button onclick="downloadCertificate({{ $certificate->id }})" class="bg-white border border-gray-300 text-gray-600 px-4 py-2 rounded-md hover:bg-gray-50">
                                    <i class="fas fa-download mr-1"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle certificate preview
        const certificatePreview = document.getElementById('certificate-preview');
        const closeCertificateBtn = document.getElementById('close-certificate-btn');
        const viewCertificateBtns = document.querySelectorAll('.view-certificate-btn');
        
        viewCertificateBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const certificateId = this.getAttribute('data-certificate-id');
                // Show certificate preview
                certificatePreview.classList.remove('hidden');
            });
        });
        
        // Close certificate preview
        if (closeCertificateBtn) {
            closeCertificateBtn.addEventListener('click', function() {
                certificatePreview.classList.add('hidden');
            });
        }
    });
    
    // Toggle certificate preview
    function toggleCertificatePreview(certificateId) {
        const preview = document.getElementById(`certificate-preview-${certificateId}`);
        preview.classList.toggle('hidden');
    }
    
    // Download certificate function
    function downloadCertificate(certificateId) {
        window.location.href = `/patient/certificates/${certificateId}/download`;
    }
    
    // Print certificate function
    function printCertificate(certificateId) {
        window.open(`/patient/certificates/${certificateId}/print`, '_blank');
    }
    
    // Share certificate function
    function shareCertificate(certificateId) {
        // Implement sharing functionality
        alert('Sharing functionality will be implemented soon');
    }
</script>
@endsection 