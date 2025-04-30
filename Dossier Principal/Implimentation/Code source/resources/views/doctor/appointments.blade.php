@extends('layouts.private_space')
@section('title', 'Doctor-Appointments')

@section('content')
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
                  <a href="{{ route('doctor.appointments') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                      <i class="fas fa-calendar-alt mr-3 text-[#7fbfbf]"></i>
                      <span>Appointments</span>
                  </a>
                  <a href="{{ route('doctor.certificates') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                      <i class="fas fa-file-medical mr-3 text-gray-400"></i>
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
                      <a href="{{ route('doctor.certificates') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                          <i class="fas fa-file-medical mr-3 text-gray-400"></i>
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
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Reschedule
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
                                    <td>
                                        <button type="button" 
                                            class="open-reschedule-modal text-xs bg-[#e6f5f5] text-[#7fbfbf] px-2 py-1 rounded"
                                            data-modal-target="reschedule-modal-{{ $appointment->id }}"
                                            data-doctor-id="{{ Auth::user()->id }}">
                                            <i class="fas fa-calendar-alt mr-1"></i> Reschedule
                                        </button>
                                    </td>
                                </tr>
                            </tbody>

                            <div id="reschedule-modal-{{ $appointment->id }}" class="modal hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <!-- Background overlay -->
                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                                    <!-- Modal panel -->
                                    <div class="modal-content inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                        <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-[#e6f5f5] sm:mx-0 sm:h-10 sm:w-10">
                                                    <svg class="h-6 w-6 text-[#afdddd]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                        Reschedule Appointment with {{ $appointment->patient->name }} {{ $appointment->patient->last_name }}
                                                    </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">
                                                            Please select a new date and time for this appointment.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-6">
                                                <form action="{{ route('doctor.appointment.reschedule', $appointment) }}" method="POST" class="space-y-4">
                                                    @csrf
                                                    
                                                    <div>
                                                        <label for="appointment_date_{{ $appointment->id }}" class="block text-sm font-medium text-gray-700">New Date</label>
                                                        <input type="date" name="appointment_date" id="appointment_date_{{ $appointment->id }}" value="{{ $appointment->appointment_date }}" class="mt-1 py-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] sm:text-sm" required>
                                                    </div>

                                                    <div>
                                                        <label for="appointment_time_{{ $appointment->id }}" class="block text-sm font-medium text-gray-700">New Time</label>
                                                        <select name="appointment_time" id="appointment_time_{{ $appointment->id }}" class="mt-1 py-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] sm:text-sm" required>
                                                            <option value="">Select a time</option>
                                                            <option value="09:00" {{ $appointment->appointment_time == '09:00' ? 'selected' : '' }}>9:00 AM</option>
                                                            <option value="09:30" {{ $appointment->appointment_time == '09:30' ? 'selected' : '' }}>9:30 AM</option>
                                                            <option value="10:00" {{ $appointment->appointment_time == '10:00' ? 'selected' : '' }}>10:00 AM</option>
                                                            <option value="10:30" {{ $appointment->appointment_time == '10:30' ? 'selected' : '' }}>10:30 AM</option>
                                                            <option value="11:00" {{ $appointment->appointment_time == '11:00' ? 'selected' : '' }}>11:00 AM</option>
                                                            <option value="11:30" {{ $appointment->appointment_time == '11:30' ? 'selected' : '' }}>11:30 AM</option>
                                                            <option value="13:00" {{ $appointment->appointment_time == '13:00' ? 'selected' : '' }}>1:00 PM</option>
                                                            <option value="13:30" {{ $appointment->appointment_time == '13:30' ? 'selected' : '' }}>1:30 PM</option>
                                                            <option value="14:00" {{ $appointment->appointment_time == '14:00' ? 'selected' : '' }}>2:00 PM</option>
                                                            <option value="14:30" {{ $appointment->appointment_time == '14:30' ? 'selected' : '' }}>2:30 PM</option>
                                                            <option value="15:00" {{ $appointment->appointment_time == '15:00' ? 'selected' : '' }}>3:00 PM</option>
                                                            <option value="15:30" {{ $appointment->appointment_time == '15:30' ? 'selected' : '' }}>3:30 PM</option>
                                                            <option value="16:00" {{ $appointment->appointment_time == '16:00' ? 'selected' : '' }}>4:00 PM</option>
                                                            <option value="16:30" {{ $appointment->appointment_time == '16:30' ? 'selected' : '' }}>4:30 PM</option>
                                                        </select>
                                                    </div>

                                                    <div class="mt-6 flex justify-end space-x-3">
                                                        <button type="button" class="close-reschedule-modal inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#afdddd] sm:mt-0 sm:w-auto sm:text-sm">
                                                            Cancel
                                                        </button>
                                                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#afdddd] text-base font-medium text-white hover:bg-[#8acaca] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#afdddd] sm:w-auto sm:text-sm">
                                                            Reschedule
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        document.addEventListener('DOMContentLoaded', function() {
        const openRescheduleButtons = document.querySelectorAll('.open-reschedule-modal');
            openRescheduleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const modalId = this.getAttribute('data-modal-target');
                    const doctorId = this.getAttribute('data-doctor-id');
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.classList.remove('hidden');
                        modal.setAttribute('data-doctor-id', doctorId);
                    }
                });
            });

        const closeRescheduleButtons = document.querySelectorAll('.close-reschedule-modal');
        closeRescheduleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) {
                    modal.classList.add('hidden');
                }
            });
        });

        const rescheduleModals = document.querySelectorAll('.modal');
        rescheduleModals.forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.add('hidden');
                }
            });
        });

        const dateInputs = document.querySelectorAll('input[name="appointment_date"]');
        dateInputs.forEach(input => {
            input.addEventListener('change', function() {
                const modal = this.closest('.modal');
                const doctorId = modal.getAttribute('data-doctor-id');
                const appointmentId = modal.id.split('-').pop();
                
                if (doctorId) {
                    fetchUnavailableTimes(doctorId, this.value, appointmentId);
                }
            });
        });

        async function fetchUnavailableTimes(doctorId, selectedDate, currentAppointmentId) {
            if (!doctorId || !selectedDate) return;

            try {
                const res = await fetch(`/unavailable-times?doctor_id=${doctorId}&appointment_date=${selectedDate}`);
                const rawTimes = await res.json();
                console.log('Raw response:', rawTimes);
                
                const takenTimes = rawTimes.map(time => time.slice(0, 5));
                console.log('Processed taken times:', takenTimes);
                
                const timeSelect = document.querySelector(`#appointment_time_${currentAppointmentId}`);
                
                if (timeSelect) {
                    for (const option of timeSelect.options) {
                        option.disabled = false;
                    }
                    
                    for (const option of timeSelect.options) {
                        if (option.value === "") continue;
                        option.disabled = takenTimes.includes(option.value);
                    }
                }
            } catch (error) {
                console.error('Failed to fetch unavailable times:', error);
            }
        }
    });
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
                  alert(data.message);
                  closeTreatmentModal();
                  window.location.reload();
              } else {
                  alert(data.message);
              }
          })
          .catch(error => {
              console.error('Error:', error);
              alert('An error occurred while saving the treatment plan.');
          });
      });

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