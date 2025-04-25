@extends('layouts.private_space')
@section('title', 'Doctor-Appointments')

@section('content')
  <div class="flex min-h-screen">
      <!-- Sidebar -->
      <div class="bg-white shadow-lg w-64 flex-shrink-0 hidden md:block">
          <div class="p-4 bg-[#afdddd] text-white">
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
                  <a href="{{ route('doctor.appointments') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                      <i class="fas fa-calendar-alt mr-3 text-[#7fbfbf]"></i>
                      <span>Appointments</span>
                  </a>
                  <a href="" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                      <i class="fas fa-file-medical mr-3 text-gray-400"></i>
                      <span>Certificate Requests</span>
                  </a>
                  <a href="" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                      <i class="fas fa-users mr-3 text-gray-400"></i>
                      <span>My Patients</span>
                  </a>
                  <a href="" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
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
          <button id="sidebarToggle" class="bg-[#7fbfbf] text-white p-3 rounded-full shadow-lg">
              <i class="fas fa-bars"></i>
          </button>
      </div>

      <!-- Mobile Sidebar -->
      <div id="mobileSidebar" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-40 hidden">
          <div class="bg-white h-full w-64 shadow-lg">
              <div class="p-4 bg-[#7fbfbf] text-white flex justify-between">
                  <div>
                      <h2 class="text-2xl font-bold">DocLine</h2>
                      <p class="text-[#e6f5f5] text-sm">Doctor Portal</p>
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
                      <a href="{{ route('doctor.appointments') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                          <i class="fas fa-calendar-alt mr-3 text-[#7fbfbf]"></i>
                          <span>Appointments</span>
                      </a>
                      <a href="" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                          <i class="fas fa-file-medical mr-3 text-gray-400"></i>
                          <span>Certificate Requests</span>
                      </a>
                      <a href="" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                          <i class="fas fa-users mr-3 text-gray-400"></i>
                          <span>My Patients</span>
                      </a>
                      <a href="" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
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
      </div>

      <!-- Main Content -->
      <div class="flex-1 bg-gray-50">
          <!-- Header -->
          <div class="bg-white shadow-sm">
              <div class="flex justify-between items-center px-6 py-4">
                  <div class="flex items-center">
                      <h1 class="text-xl font-semibold text-gray-700">Appointments</h1>
                  </div>
                  <div class="flex items-center">
                      <span class="text-sm text-gray-500 mr-4">Today: {{ date('d M, Y') }}</span>
                      <button class="text-gray-500 hover:text-gray-600 mr-4">
                          <i class="fas fa-bell"></i>
                      </button>
                      <button class="text-[#7fbfbf] hover:text-[#afdddd]">
                          <i class="fas fa-question-circle"></i>
                      </button>
                  </div>
              </div>
          </div>
          
          <!-- Appointments Content -->
          <div class="p-6">
              <!-- Upcoming Appointments Section -->
              <div class="mb-8">
                  <div class="flex justify-between items-center mb-4">
                      <h2 class="text-lg font-semibold text-gray-800">Upcoming Appointments</h2> 
                  </div>
                  
                  <div class="bg-white rounded-lg shadow overflow-hidden">
                      <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                              <tr>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Patient
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Date & Time
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Status
                                  </th>
                              </tr>
                          </thead>
                          @foreach ($appointments as $appointment)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                                <img src="{{ asset('images/Me.jpg') }}" alt="John Patient" class="h-10 w-10 object-cover"/>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->name }} {{ $appointment->patient->last_name }}</div>
                                                <div class="text-sm text-gray-500">ID: {{ $appointment->patient->id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $appointment->appointment_date->format('d M, Y') }}</div>
                                        <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#e6f5f5] text-[#2a7f7f]">
                                            Upcoming
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                          @endforeach
                      </table>
                  </div>
              </div>
              
              <!-- Completed Appointments Section -->
              <div>
                  <div class="flex justify-between items-center mb-4">
                      <h2 class="text-lg font-semibold text-gray-800">Completed Appointments</h2>
                      <div class="flex space-x-2">
                          <div class="relative">
                              <input type="text" placeholder="Search patient..." class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#afdddd]">
                              <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                          </div>
                          <button class="border border-gray-300 rounded-lg px-3 py-2 bg-white text-gray-600 hover:bg-gray-50">
                              <i class="fas fa-filter"></i>
                          </button>
                      </div>
                  </div>
                  
                  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($completedAppointments as $completedAppointment)
                      <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-4 border-b border-gray-100">
                            <div class="flex items-center">
                                <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                    <img src="{{ asset('images/Me.jpg') }}" alt="Emily Johnson" class="h-12 w-12 object-cover"/>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-medium text-gray-800">{{ $completedAppointment->patient->name }} {{ $completedAppointment->patient->last_name }}</h3>
                                    <p class="text-sm text-gray-500">ID: {{ $completedAppointment->patient->id }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 mb-1">Appointment Date:</p>
                                <p class="font-medium">{{ $completedAppointment->appointment_date->format('d M, Y') }} | {{ \Carbon\Carbon::parse($completedAppointment->appointment_time)->format('H:i') }}</p>
                            </div>
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 mb-1">Type:</p>
                                <p class="font-medium">{{ $completedAppointment->visit_type }}</p>
                            </div>
                            <div class="flex space-x-2 pt-2 border-t">
                                <button class="flex-1 bg-[#afdddd] hover:bg-[#8acaca] text-white px-3 py-2 rounded text-sm" onclick="openConsultationModal({{ $completedAppointment->id }})">
                                    <i class="fas fa-file-medical mr-1"></i> Add Medical File
                                </button>
                                <button class="flex-1 bg-[#afdddd] hover:bg-[#8acaca] text-white px-3 py-2 rounded text-sm" onclick="openTreatmentModal({{ $completedAppointment->id }})">
                                    <i class="fas fa-clipboard-list mr-1"></i> Add Treatment Plan
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

  <!-- Treatment Plan Modal -->
  <div id="treatmentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
      <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
          <div class="mt-3">
              <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Add Treatment Plan</h3>
              <form id="treatmentForm" action="{{ route('doctor.treatments.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="appointment_id" id="appointment_id">
                  <div class="mb-4">
                      <label for="medicament" class="block text-sm font-medium text-gray-700">Medication</label>
                      <input type="text" name="medicament" id="medicament" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required>
                  </div>
                  <div class="mb-4">
                      <label for="dosage" class="block text-sm font-medium text-gray-700">Dosage (mg)</label>
                      <input type="number" name="dosage" id="dosage" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required>
                  </div>
                  <div class="mb-4">
                      <label for="frequency" class="block text-sm font-medium text-gray-700">Frequency</label>
                      <select name="frequency" id="frequency" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required>
                          <option value="Once daily">Once daily</option>
                          <option value="Twice daily">Twice daily</option>
                          <option value="Three times daily">Three times daily</option>
                          <option value="Four times daily">Four times daily</option>
                          <option value="As needed">As needed</option>
                      </select>
                  </div>
                  <div class="mb-4">
                      <label for="duration" class="block text-sm font-medium text-gray-700">Duration (days)</label>
                      <input type="number" name="duration" id="duration" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required>
                  </div>
                  <div class="flex justify-end space-x-3 mt-4">
                      <button type="button" onclick="closeTreatmentModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                          Cancel
                      </button>
                      <button type="submit" class="px-4 py-2 bg-[#afdddd] text-white rounded-md hover:bg-[#8acaca] focus:outline-none focus:ring-2 focus:ring-[#afdddd] focus:ring-opacity-50">
                          Save Treatment
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Medical Consultation Modal -->
  <div id="consultationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
      <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
          <div class="mt-3">
              <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Add Medical Consultation</h3>
              <form id="consultationForm" action="{{ route('doctor.consultations.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="appointment_id" id="consultation_appointment_id">
                  <div class="mb-4">
                      <label for="raison_consultation" class="block text-sm font-medium text-gray-700">Reason for Consultation</label>
                      <textarea name="raison_consultation" id="raison_consultation" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required></textarea>
                  </div>
                  <div class="mb-4">
                      <label for="weight" class="block text-sm font-medium text-gray-700">Weight (kg)</label>
                      <input type="number" name="weight" id="weight" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required>
                  </div>
                  <div class="mb-4">
                      <label for="bpm" class="block text-sm font-medium text-gray-700">Heart Rate (BPM)</label>
                      <input type="number" name="bpm" id="bpm" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required>
                  </div>
                  <div class="mb-4">
                      <label for="blood_pressure" class="block text-sm font-medium text-gray-700">Blood Pressure (mmHg)</label>
                      <input type="number" name="blood_pressure" id="blood_pressure" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required>
                  </div>
                  <div class="mb-4">
                      <label for="blood_sugar" class="block text-sm font-medium text-gray-700">Blood Sugar (mg/dL)</label>
                      <input type="number" name="blood_sugar" id="blood_sugar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required>
                  </div>
                  <div class="mb-4">
                      <label for="current_diagnosis" class="block text-sm font-medium text-gray-700">Current Diagnosis</label>
                      <textarea name="current_diagnosis" id="current_diagnosis" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required></textarea>
                  </div>
                  <div class="mb-4">
                      <label for="symptoms" class="block text-sm font-medium text-gray-700">Symptoms</label>
                      <textarea name="symptoms" id="symptoms" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required></textarea>
                  </div>
                  <div class="mb-4">
                      <label for="doctor_note" class="block text-sm font-medium text-gray-700">Doctor's Notes</label>
                      <textarea name="doctor_note" id="doctor_note" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#afdddd] focus:ring focus:ring-[#afdddd] focus:ring-opacity-50" required></textarea>
                  </div>
                  <div class="flex justify-end space-x-3 mt-4">
                      <button type="button" onclick="closeConsultationModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                          Cancel
                      </button>
                      <button type="submit" class="px-4 py-2 bg-[#afdddd] text-white rounded-md hover:bg-[#8acaca] focus:outline-none focus:ring-2 focus:ring-[#afdddd] focus:ring-opacity-50">
                          Save Consultation
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <script>
      function openTreatmentModal(appointmentId) {
          document.getElementById('appointment_id').value = appointmentId;
          document.getElementById('treatmentModal').classList.remove('hidden');
      }

      function closeTreatmentModal() {
          document.getElementById('treatmentModal').classList.add('hidden');
          document.getElementById('treatmentForm').reset();
      }

      function openConsultationModal(appointmentId) {
          document.getElementById('consultation_appointment_id').value = appointmentId;
          document.getElementById('consultationModal').classList.remove('hidden');
      }

      function closeConsultationModal() {
          document.getElementById('consultationModal').classList.add('hidden');
          document.getElementById('consultationForm').reset();
      }

      // Close modal when clicking outside
      window.onclick = function(event) {
          const modal = document.getElementById('treatmentModal');
          if (event.target == modal) {
              closeTreatmentModal();
          }
          const consultationModal = document.getElementById('consultationModal');
          if (event.target == consultationModal) {
              closeConsultationModal();
          }
      }

      // Handle form submission
      document.getElementById('treatmentForm').addEventListener('submit', function(e) {
          e.preventDefault();
          
          const formData = new FormData(this);
          
          fetch(this.action, {
              method: 'POST',
              body: formData,
              headers: {
                  'X-Requested-With': 'XMLHttpRequest',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
              }
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  // Show success message
                  alert(data.message);
                  closeTreatmentModal();
                  // Optionally refresh the page or update the UI
                  window.location.reload();
              } else {
                  // Show error message
                  alert(data.message);
              }
          })
          .catch(error => {
              console.error('Error:', error);
              alert('An error occurred while saving the treatment plan.');
          });
      });

      // Handle consultation form submission
      document.getElementById('consultationForm').addEventListener('submit', function(e) {
          e.preventDefault();
          
          const formData = new FormData(this);
          
          fetch(this.action, {
              method: 'POST',
              body: formData,
              headers: {
                  'X-Requested-With': 'XMLHttpRequest',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
              }
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  alert(data.message);
                  closeConsultationModal();
                  window.location.reload();
              } else {
                  alert(data.message);
              }
          })
          .catch(error => {
              console.error('Error:', error);
              alert('An error occurred while saving the consultation.');
          });
      });
  </script>
@endsection