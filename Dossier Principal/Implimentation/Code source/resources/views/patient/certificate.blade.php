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
                <form action="" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="doctor">
                            Select Doctor
                        </label>
                        <select id="doctor" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                            <option value="" disabled selected>Choose a doctor from your appointments</option>
                            <option value="dr-johnson">Dr. Sarah Johnson (Last appointment: Mar 19, 2025)</option>
                            <option value="dr-chen">Dr. Michael Chen (Last appointment: Mar 25, 2025)</option>
                            <option value="dr-miller">Dr. Robert Miller (Last appointment: Feb 10, 2025)</option>
                        </select>
                    </div>
            
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2" for="from_date">
                                Start Date
                            </label>
                            <input type="date" id="from_date" name="from_date" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2" for="to_date">
                                End Date
                            </label>
                            <input type="date" id="to_date" name="to_date" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="reason">
                            Purpose of Certificate
                        </label>
                        <textarea id="reason" rows="3" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Briefly explain why you need this certificate..."></textarea>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="bg-[#afdddd] hover:bg-[#8acaca] text-white px-4 py-2 rounded-md">
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
                        <tbody>
                            <!-- Request 1 -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 text-sm text-gray-700">Dr. Sarah Johnson</td>
                                <td class="p-3 text-sm text-gray-700">Mar 15, 2025</td>
                                <td class="p-3 text-sm text-center">
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">Pending</span>
                                </td>
                            </tr>
                            <!-- Request 2 -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 text-sm text-gray-700">Dr. Michael Chen</td>
                                <td class="p-3 text-sm text-gray-700">Mar 10, 2025</td>
                                <td class="p-3 text-sm text-center">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Approved</span>
                                </td>
                            </tr>
                            <!-- Request 3 -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 text-sm text-gray-700">Dr. Robert Miller</td>
                                <td class="p-3 text-sm text-gray-700">Mar 5, 2025</td>
                                <td class="p-3 text-sm text-center">
                                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Rejected</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- My Certificates Section -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">My Certificates</h2>
                <div class="space-y-4">
                    <!-- Certificate 1 -->
                    <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50">
                        <div class="flex flex-col md:flex-row md:items-center justify-between">
                            <div class="flex items-start mb-3 md:mb-0">
                                <div class="bg-green-100 rounded-full p-3 mr-4 text-green-500">
                                    <i class="fas fa-file-medical text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Sick Leave Certificate</h3>
                                    <p class="text-gray-600">Issued by Dr. Sarah Johnson</p>
                                    <p class="text-sm text-gray-500">Issued on: Feb 16, 2025</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <!-- View Button -->
                                <button id="view-certificate-btn" class="bg-primary hover:bg-white text-white hover:text-primary px-3 py-1 rounded text-sm">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                                <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                    <i class="fas fa-download mr-1"></i> Download
                                </button>
                                <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                    <i class="fas fa-print mr-1"></i> Print
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Certificate Preview (initially hidden) -->
                    <div id="certificate-preview" class="border hidden border-gray-200 rounded-lg p-6 bg-white">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Certificate Preview</h3>
                            <!-- Close Button -->
                            <button id="close-certificate-btn" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        
                        <!-- Certificate Document -->
                        <div class="border border-gray-300 rounded-lg p-6 bg-gray-50">
                            <div class="text-center mb-6">
                                <h2 class="text-xl font-bold text-gray-800">MEDICAL CERTIFICATE</h2>
                                <p class="text-gray-600">MediConsult Medical Center</p>
                            </div>
                            
                            <div class="mb-4">
                                <p class="text-gray-800">This is to certify that <span class="font-semibold">John Patient</span> has been examined by me on <span class="font-semibold">February 15, 2025</span> and found to be suffering from <span class="font-semibold">Acute Bronchitis</span>.</p>
                            </div>
                            
                            <div class="mb-4">
                                <p class="text-gray-800">The patient is advised to rest and abstain from work/school for a period of <span class="font-semibold">7 days</span> from <span class="font-semibold">February 15, 2025</span> to <span class="font-semibold">February 22, 2025</span>.</p>
                            </div>
                            
                            <div class="mb-6">
                                <p class="text-gray-800">This certificate is issued upon the request of the patient for whatever legal purpose it may serve.</p>
                            </div>
                            
                            <div class="flex justify-between items-end">
                                <div>
                                    <p class="font-semibold text-gray-800">Dr. Sarah Johnson, MD</p>
                                    <p class="text-gray-600">License No: 12345678</p>
                                    <p class="text-gray-600">MediConsult Medical Center</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-gray-600">Issued on: February 16, 2025</p>
                                    <p class="text-gray-600">Valid until: February 23, 2025</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Certificate Actions -->
                        <div class="flex justify-end mt-4 space-x-2">
                            <button class="bg-white border border-gray-300 text-gray-600 px-4 py-2 rounded-md hover:bg-gray-50">
                                <i class="fas fa-download mr-1"></i> Download
                            </button>
                            <button class="bg-white border border-gray-300 text-gray-600 px-4 py-2 rounded-md hover:bg-gray-50">
                                <i class="fas fa-print mr-1"></i> Print
                            </button>
                            <button class="bg-white border border-gray-300 text-gray-600 px-4 py-2 rounded-md hover:bg-gray-50">
                                <i class="fas fa-share-alt mr-1"></i> Share
                            </button>
                        </div>
                    </div>

                    <!-- Certificate 2 -->
                    <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50">
                        <div class="flex flex-col md:flex-row md:items-center justify-between">
                            <div class="flex items-start mb-3 md:mb-0">
                                <div class="bg-green-100 rounded-full p-3 mr-4 text-green-500">
                                    <i class="fas fa-file-medical text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Fitness Certificate</h3>
                                    <p class="text-gray-600">Issued by Dr. Michael Chen</p>
                                    <p class="text-sm text-gray-500">Issued on: Jan 30, 2025</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="bg-primary hover:bg-white text-white hover:text-primary px-3 py-1 rounded text-sm">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                                <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                    <i class="fas fa-download mr-1"></i> Download
                                </button>
                                <button class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded text-sm hover:bg-gray-50">
                                    <i class="fas fa-print mr-1"></i> Print
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Certificate preview functionality
        const certificatePreview = document.getElementById('certificate-preview');
        const closeCertificateBtn = document.getElementById('close-certificate-btn');
        const viewCertificateBtns = document.querySelectorAll('.view-certificate-btn');
        const certificateContent = document.getElementById('certificate-content');
        const downloadCertificateLink = document.getElementById('download-certificate-link');
        const printCertificateBtn = document.getElementById('print-certificate-btn');
        
        viewCertificateBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const certificateId = this.getAttribute('data-certificate-id');
                
                // Fetch certificate data with AJAX
                fetch(`/patient/certificates/${certificateId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Populate certificate content
                        certificateContent.innerHTML = `
                            <div class="mb-4">
                                <p class="text-gray-800">This is to certify that <span class="font-semibold">${data.patient_name}</span> has been examined by me on <span class="font-semibold">${data.examination_date}</span> and found to be suffering from <span class="font-semibold">${data.diagnosis}</span>.</p>
                            </div>
                            
                            <div class="mb-4">
                                <p class="text-gray-800">The patient is advised to rest and abstain from work/school for a period of <span class="font-semibold">${data.days} days</span> from <span class="font-semibold">${data.start_date}</span> to <span class="font-semibold">${data.end_date}</span>.</p>
                            </div>
                            
                            <div class="mb-6">
                                <p class="text-gray-800">This certificate is issued upon the request of the patient for whatever legal purpose it may serve.</p>
                            </div>
                            
                            <div class="flex justify-between items-end">
                                <div>
                                    <p class="font-semibold text-gray-800">${data.doctor_name}</p>
                                    <p class="text-gray-600">License No: ${data.license_number}</p>
                                    <p class="text-gray-600">DocLine Medical Center</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-gray-600">Issued on: ${data.issued_date}</p>
                                    <p class="text-gray-600">Valid until: ${data.valid_until}</p>
                                </div>
                            </div>
                        `;
                        
                        // Update download link
                        downloadCertificateLink.href = `/patient/certificates/${certificateId}/download`;
                        
                        // Update print button
                        printCertificateBtn.onclick = function() {
                            window.open(`/patient/certificates/${certificateId}/print`, '_blank');
                        };
                        
                        // Show certificate preview
                        certificatePreview.classList.remove('hidden');
                    })
                    .catch(error => {
                        console.error('Error fetching certificate:', error);
                    });
            });
        });
        
        // Close certificate preview
        if (closeCertificateBtn) {
            closeCertificateBtn.addEventListener('click', function() {
                certificatePreview.classList.add('hidden');
            });
        }
    });
    
    // Print certificate function
    function printCertificate(certificateId) {
        window.open(`/patient/certificates/${certificateId}/print`, '_blank');
    }
</script>
@endsection