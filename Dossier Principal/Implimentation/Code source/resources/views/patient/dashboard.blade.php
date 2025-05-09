@extends('layouts.private_space')
@section('title', 'Patient-Dashboard')

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
                        <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                            {{ substr(Auth::user()->name, 0 , 1) }}{{ substr(Auth::user()->last_name, 0 , 1) }}
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">{{ Auth::user()->name }} {{Auth::user()->last_name }}</p>
                            <p class="text-xs text-gray-500">ID: {{ Auth::user()->id }}</p>
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
                    <a href="{{ route('patient.certificate') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-file-medical mr-3 text-gray-400"></i>
                        <span>Medical Certificates</span>
                    </a>
                    <a href="{{ route('patient.medical-file') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
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
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </div>
                            <div class="ml-3">
                                <p class="font-medium">{{ Auth::user()->name}} {{ Auth::user()->last_name}}</p>
                                <p class="text-xs text-gray-500">ID: {{ Auth::user()->id}}</p>
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
                        <a href="{{ route('patient.certificate') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-file-medical mr-3 text-gray-400"></i>
                            <span>Medical Certificates</span>
                        </a>
                        <a href="{{ route('patient.medical-file') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
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
                                <h2 class="text-lg font-semibold">Welcome back, {{ Auth::user()->name}}!</h2>
                                {{-- <p class="text-white text-opacity-80">Your next appointment is in 2 days</p> --}}
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
                                <h3 class="text-2xl font-bold text-gray-700">{{$appointments->count()}}</h3>
                            </div>
                            <div class="bg-[#e6f5f5] rounded-full p-3 text-[#7fbfbf]">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('patient.appointments') }}" class="text-[#7fbfbf] text-sm hover:underline">View all appointments</a>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm">Pending Certificates</p>
                                <h3 class="text-2xl font-bold text-gray-700">{{$certificates->count()}}</h3>
                            </div>
                            <div class="bg-[#e6f5f5] rounded-full p-3 text-[#7fbfbf]">
                                <i class="fas fa-file-medical"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('patient.certificate') }}" class="text-[#7fbfbf] text-sm hover:underline">Request new certificate</a>
                        </div>
                    </div>
                </div>
                
                <!-- Appointments Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-700">Upcoming Appointments</h3>
                            <a href="{{ route('patient.appointments') }}" class="text-[#7fbfbf] hover:underline text-sm">View all</a>
                        </div>
                        <div class="space-y-4">
                            @if ($appointments && count($appointments) > 0)
                                @foreach ($appointments as $appointment)
                                    <div class="border-l-4 border-[#afdddd] pl-4 py-2">
                                        <div class="flex justify-between">
                                            <div>
                                                <p class="font-medium">Dr. {{ $appointment->doctor->name }} {{ $appointment->doctor->last_name }}</p>
                                                <p class="text-sm text-gray-500">{{ $appointment->visit_type }}</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-[#7fbfbf] font-medium">{{ $appointment->appointment_date->format('d M, Y') }}</p>
                                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex space-x-2">
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="py-8 flex flex-col items-center justify-center text-center">
                                    <div class="bg-gray-100 rounded-full p-3 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#7fbfbf]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-600 font-medium mb-1">No upcoming appointments</p>
                                    <p class="text-gray-500 text-sm mb-4">Schedule a new appointment to see it here</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Medical Records Section -->
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-700">Recent Medical Records</h3>
                            <a href="{{ route('patient.medical-file') }}" class="text-[#7fbfbf] hover:underline text-sm">View all</a>
                        </div>
                        <div class="space-y-4">
                            @if ($consultationFiles && count($consultationFiles) > 0)
                                @foreach ($consultationFiles as $consultationFile)
                                    <div class="p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                        <div class="flex items-center">
                                            <div class="bg-[#e6f5f5] rounded-full p-2 mr-3 text-[#7fbfbf]">
                                                <i class="fas fa-file-medical"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium">{{ $consultationFile->raison_consultation }}</p>
                                                <p class="text-sm text-gray-500">Added by Dr. {{ $consultationFile->doctor->last_name }} • {{ $consultationFile->created_at }}</p>
                                            </div>
                                            <button class="text-gray-400 hover:text-[#7fbfbf]">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="py-8 flex flex-col items-center justify-center text-center">
                                    <div class="bg-gray-100 rounded-full p-3 mb-3">
                                        <i class="fas fa-file-medical-alt text-2xl text-[#7fbfbf]"></i>
                                    </div>
                                    <p class="text-gray-600 font-medium mb-1">No medical consultation files</p>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
                
                <!-- Health Metrics Section -->
                <div class="mt-6">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-700">Health Metrics</h3>
                            <!-- Add Medical Info Button -->
                            <button id="updateMedicalInfoBtn" class="bg-[#afdddd] hover:bg-[#8fcece] text-white px-3 py-1 rounded-md text-sm flex items-center">
                                <i class="fas fa-user-edit mr-2"></i> Update Medical Info
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Blood Pressure</p>
                                        <p class="text-lg font-semibold">{{ $personalInfos->blood_pressure ?? 'N/A'}}</p>
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
                                        <p class="text-lg font-semibold">{{ $personalInfos->bpm ?? 'N/A'}} bpm</p>
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
                                        <p class="text-lg font-semibold">{{ $personalInfos->weight ?? 'N/A'}} kg</p>
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
                                        <p class="text-lg font-semibold">{{ $personalInfos->blood_sugar ?? 'N/A'}} mg/dL</p>
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

    <!-- Medical Information Modal -->
    <div id="medicalInfoModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Update Medical Information</h2>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <form action="{{ route('patient.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Basic Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Birthdate -->
                        <div>
                            <label for="birthdate" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                            <div class="mt-1">
                                <input type="date" name="birthdate" id="birthdate" value="" 
                                    class="shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        
                        <!-- Gender -->
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <div class="mt-1">
                                <select id="gender" name="gender" class="shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="" disabled >Select gender</option>
                                    <option value="male" >Male</option>
                                    <option value="female" >Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Blood Type -->
                    <div>
                        <label for="blood_type" class="block text-sm font-medium text-gray-700">Blood Type</label>
                        <div class="mt-1">
                            <select id="blood_type" name="blood_type" class="shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="" disabled >Select blood type</option>
                                <option value="A+" >A+</option>
                                <option value="A-" >A-</option>
                                <option value="B+" >B+</option>
                                <option value="B-" >B-</option>
                                <option value="AB+" >AB+</option>
                                <option value="AB-" >AB-</option>
                                <option value="O+" >O+</option>
                                <option value="O-" >O-</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Medical History -->
                    <div>
                        <label for="past_illnesses" class="block text-sm font-medium text-gray-700">Past Illnesses</label>
                        <p class="text-xs text-gray-500 mb-1">List any significant past illnesses with years (e.g., Pneumonia (2020))</p>
                        <div class="mt-1">
                            <textarea id="past_illnesses" name="past_illnesses" rows="3" 
                                class="shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>
                    
                    <!-- Surgeries -->
                    <div>
                        <label for="surgeries" class="block text-sm font-medium text-gray-700">Surgeries</label>
                        <p class="text-xs text-gray-500 mb-1">List any surgeries with years (e.g., Appendectomy (2015))</p>
                        <div class="mt-1">
                            <textarea id="surgeries" name="surgeries" rows="3" 
                                class="shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>
                    
                    <!-- Allergies -->
                    <div>
                        <label for="allergies" class="block text-sm font-medium text-gray-700">Allergies</label>
                        <p class="text-xs text-gray-500 mb-1">List any allergies and their severity (e.g., Penicillin - Severe)</p>
                        <div class="mt-1">
                            <textarea id="allergies" name="allergies" rows="3" 
                                class="shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>
                    
                    <!-- Chronic Conditions -->
                    <div>
                        <label for="chronic" class="block text-sm font-medium text-gray-700">Chronic Conditions</label>
                        <p class="text-xs text-gray-500 mb-1">List any chronic conditions with diagnosis year (e.g., Hypertension (diagnosed 2019))</p>
                        <div class="mt-1">
                            <textarea id="chronic" name="chronic" rows="3" 
                                class="shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="flex justify-end pt-4">
                        <button type="button" id="cancelBtn" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50 mr-3">
                            Cancel
                        </button>
                        <button type="submit" class="bg-[#afdddd] hover:bg-[#8fcece] text-white px-4 py-2 rounded-md">
                            Save Information
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add JavaScript for Modal -->
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
            
            // Medical Info Modal
            const updateMedicalInfoBtn = document.getElementById('updateMedicalInfoBtn');
            const medicalInfoModal = document.getElementById('medicalInfoModal');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            
            if (updateMedicalInfoBtn && medicalInfoModal && closeModalBtn && cancelBtn) {
                // Open modal
                updateMedicalInfoBtn.addEventListener('click', function() {
                    medicalInfoModal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden'; // Prevent scrolling behind modal
                });
                
                // Close modal functions
                const closeModal = function() {
                    medicalInfoModal.classList.add('hidden');
                    document.body.style.overflow = ''; // Re-enable scrolling
                };
                
                closeModalBtn.addEventListener('click', closeModal);
                cancelBtn.addEventListener('click', closeModal);
                
                // Close modal when clicking outside
                medicalInfoModal.addEventListener('click', function(e) {
                    if (e.target === medicalInfoModal) {
                        closeModal();
                    }
                });
                
                // Prevent closing when clicking inside the modal content
                medicalInfoModal.querySelector('.bg-white').addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }
        });
    </script>
@endsection