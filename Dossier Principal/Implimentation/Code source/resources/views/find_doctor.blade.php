@extends('layouts.app')

@section('title', 'Find Doctor')

@section('content')
  <!-- Page Title Section -->
  <section class="pt-40 pb-20 md:pt-52 md:pb-28 relative bg-cover bg-center bg-no-repeat" style="background-image: url('https://img.freepik.com/free-photo/senior-man-using-his-phone_53876-93006.jpg?t=st=1745413977~exp=1745417577~hmac=1ec1d6183825028d2b812239fcfb9dc55f3ebf1a9020589ae43783a0fc27e7f2&w=1800');">
    <!-- Soft overlay with primary color -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#afdddd]/80 to-[#8acaca]/70"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-left">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl md:text-5xl">
          Find Your Perfect Doctor
        </h1>
        <p class="mt-3 max-w-md text-base text-white sm:text-lg md:mt-5 md:text-xl">
          Search from our network of qualified healthcare professionals based on your specific needs.
        </p>
      </div>
    </div>
  </section>

  <!-- Search and Filter Section -->
  <section class="py-8 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
        <form action="{{ route('find-doctor') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6">
          <!-- Specialty Filter -->
          <div>
            <label for="speciality_id" class="block text-sm font-medium text-gray-700 mb-1">Specialty</label>
            <select id="speciality_id" name="speciality_id"
              class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-[#afdddd] focus:border-[#afdddd] sm:text-sm rounded-lg">
              <option value="">All Specialties</option>
              @foreach ($specialties as $speciality)
                <option value="{{ $speciality->id }}">{{ $speciality->speciality_name }}</option>
              @endforeach
            </select>
          </div>
        
          <!-- City/Location Filter -->
          <div>
            <label for="city_id" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
            <select id="city_id" name="city_id"
              class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-[#afdddd] focus:border-[#afdddd] sm:text-sm rounded-lg">
              <option value="">All Locations</option>
              @foreach ($cities as $city)
                  <option value="{{ $city->id }}">{{ $city->city }}</option>
              @endforeach
            </select>
          </div>
        
          <!-- Price Range Filter -->
          <div>
            <label for="fees" class="block text-sm font-medium text-gray-700 mb-1">Price Range</label>
            <select id="fees" name="fees"
              class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-[#afdddd] focus:border-[#afdddd] sm:text-sm rounded-lg">
              <option value="">Any Price</option>
              <option value="">$0 - $50</option>
              <option value="">$50 - $100</option>
              <option value="">$100 - $200</option>
              <option value="">$200+</option>
            </select>
          </div>
        
          <!-- Experience Filter -->
          <div>
            <label for="experience" class="block text-sm font-medium text-gray-700 mb-1">Experience</label>
            <select id="experience" name="experience"
              class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-[#afdddd] focus:border-[#afdddd] sm:text-sm rounded-lg">
              <option value="">Any Experience</option>
              <option value="1-5">1-5 years</option>
              <option value="5-10">5-10 years</option>
              <option value="10-15">10-15 years</option>
              <option value="15+">15+ years</option>
            </select>
          </div>
          
          <!-- Search Button - Centered across all columns -->
          <div class="mt-6 col-span-1 md:col-span-4 flex justify-center">
            <button type="submit" id="search-button"
              class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-[#afdddd] hover:bg-[#8acaca] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#afdddd] transition-colors duration-200">
              <svg class="mr-2 -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                  clip-rule="evenodd" />
              </svg>
              Search Doctors
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- Search Results Section -->
  <section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Results Header -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
          <h2 class="text-2xl font-bold text-gray-900">Search Results</h2>
          <p class="mt-1 text-sm text-gray-500">Showing {{ $doctors->count() }} doctors matching your criteria</p>
        </div>
      </div>
  
      <!-- Results Grid -->
      @if($doctors->count())
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
          <!-- Single Doctor Card -->
          @foreach ($doctors as $doctor)
          <div class="doctor-card bg-white rounded-xl shadow-xl overflow-hidden">
            <div class="relative">
              <div class="overflow-hidden h-64">
                <img class="w-full h-full object-cover doctor-image"
                  src="{{ asset('storage/' . $doctor->profile_pic) }}"
                  alt="Dr. Sarah Johnson">
              </div>
              <div class="absolute top-4 right-4 bg-[#afdddd] text-white text-xs font-bold px-3 py-1 rounded-full">Top Rated</div>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between">
                <div>
                  <h3 class="text-xl font-bold text-gray-900">Dr. {{ $doctor->name }} {{ $doctor->last_name }}</h3>
                  <p class="text-[#7fbfbf] font-medium">{{ $doctor->speciality->speciality_name }}</p>
                </div>
              </div>
              <div class="mt-4 flex flex-wrap gap-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#e6f5f5] text-[#2a7f7f]">Heart Disease</span>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#e6f5f5] text-[#2a7f7f]">Hypertension</span>
              </div>
              <div class="mt-4 space-y-2">
                <div class="flex items-center text-sm text-gray-500">
                  <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                  </svg>
                  {{ $doctor->city?->city ?? 'N/A' }}
                </div>
                <div class="flex items-center text-sm text-gray-500">
                  <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 013 10a1 1 0 11-2 0 5 5 0 015.21-5 5 5 0 013.508 1.851A1 1 0 0111 8.5V9h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1H8a1 1 0 110-2h1V8.5a1 1 0 00-.5-.866A3 3 0 0010 13a1 1 0 11-2 0 1 1 0 00-1-1 1 1 0 110-2 1 1 0 001-1 1 1 0 11-2 0 3 3 0 003-3z" clip-rule="evenodd" />
                  </svg>
                  ${{ $doctor->fees }} per visit
                </div>
                <div class="flex items-center text-sm text-gray-500">
                  <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                  </svg>
                  {{ $doctor->experience }}+ years experience
                </div>
              </div>
              <div class="mt-6 flex items-center justify-between">
                <a href="#" class="text-[#7fbfbf] hover:text-[#afdddd] text-sm font-medium">
                  View Profile
                </a>
                <button type="button" class="book-now-btn inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-[#afdddd] hover:bg-[#8acaca] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#afdddd] transition-colors duration-200" 
                    data-doctor-id="{{ $doctor->id }}"
                    data-doctor="Dr. {{ $doctor->name }} {{ $doctor->last_name }}"
                    data-specialty="{{ $doctor->speciality->speciality_name }}">
                  Book Now
                </button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      @else
        <p>No doctors found matching your criteria.</p>
      @endif
  
      <!-- Pagination -->
      <div class="mt-12 flex justify-center">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
          <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
            <span class="sr-only">Previous</span>
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="#" aria-current="page" class="z-10 bg-[#e6f5f5] border-[#afdddd] text-[#2a7f7f] relative inline-flex items-center px-4 py-2 border text-sm font-medium">
            1
          </a>
          <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
            2
          </a>
          <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
            3
          </a>
          <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
            ...
          </span>
          <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
            8
          </a>
          <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
            9
          </a>
          <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
            10
          </a>
          <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
            <span class="sr-only">Next</span>
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
          </a>
        </nav>
      </div>
    </div>
  </section>

  @if ($errors->any())
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  @endif

  <!-- Booking Modal -->
  <div id="booking-modal" class="modal hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
                Book Appointment with <span id="doctor-name">Dr. Sarah Johnson</span>
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  Please fill out the form below to book your appointment with <span id="doctor-specialty">Cardiologist</span>.
                </p>
              </div>
            </div>
          </div>

          <div id="success-message" class="hidden p-4 bg-green-100 text-green-800 rounded mb-4">
              Appointment booked successfully!
          </div>

          <div class="mt-6">
            <form id="booking-form" class="space-y-4" action="{{ route('appointments.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="doctor_id" id="doctor_id">
              
              <div>
                <label for="appointment_date" class="block text-sm font-medium text-gray-700">Preferred Date</label>
                <input type="date" name="appointment_date" id="appointment_date" class="mt-1 py-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] sm:text-sm" required>
              </div>

              <div>
                <label for="appointment_time" class="block text-sm font-medium text-gray-700">Preferred Time</label>
                <select id="appointment_time" name="appointment_time" class="mt-1 py-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] sm:text-sm" required>
                  <option value="">Select a time</option>
                  <option value="09:00">9:00 AM</option>
                  <option value="09:30">9:30 AM</option>
                  <option value="10:00">10:00 AM</option>
                  <option value="10:30">10:30 AM</option>
                  <option value="11:00">11:00 AM</option>
                  <option value="11:30">11:30 AM</option>
                  <option value="13:00">1:00 PM</option>
                  <option value="13:30">1:30 PM</option>
                  <option value="14:00">2:00 PM</option>
                  <option value="14:30">2:30 PM</option>
                  <option value="15:00">3:00 PM</option>
                  <option value="15:30">3:30 PM</option>
                  <option value="16:00">4:00 PM</option>
                  <option value="16:30">4:30 PM</option>
                </select>
              </div>

              <div>
                <label for="visit_type" class="block text-sm font-medium text-gray-700">Visit Type</label>
                <select id="visit_type" name="visit_type" class="mt-1 py-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] sm:text-sm" required>
                  <option value="">Select visit type</option>
                  <option value="new-patient">New Patient Consultation</option>
                  <option value="follow-up">Follow-up Visit</option>
                  <option value="annual-checkup">Annual Checkup</option>
                  <option value="urgent">Urgent Care</option>
                </select>
              </div>

              <div>
                <label for="insurance" class="block text-sm font-medium text-gray-700">Insurance Provider</label>
                <select id="insurance" name="insurance" class="mt-1 py-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] sm:text-sm">
                  <option value="">Select insurance (optional)</option>
                  <option value="blue-cross">Blue Cross Blue Shield</option>
                  <option value="aetna">Aetna</option>
                  <option value="cigna">Cigna</option>
                  <option value="united">UnitedHealthcare</option>
                  <option value="medicare">Medicare</option>
                  <option value="medicaid">Medicaid</option>
                  <option value="other">Other</option>
                  <option value="none">Self-Pay (No Insurance)</option>
                </select>
              </div>

              <div class="mt-8 border-t border-gray-200 pt-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Documents Médicaux</h2>
                <div class="space-y-6">
                  <div>
                    <label for="medical-document" class="block text-sm font-medium text-gray-700">Ajout de documents tels que des analyses, radios ou antécédents médicaux</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                      <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                          <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex justify-center text-sm text-gray-600">
                          <label for="medical-document" class="relative cursor-pointer bg-white rounded-md font-medium text-[#afdddd] hover:text-[#7fbfbf] focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-[#afdddd]">
                            <span>Télécharger un fichier</span>
                            <input id="medical-document" name="medical-document" type="file" class="sr-only" accept=".pdf,.jpg,.jpeg,.png">
                          </label>
                        </div>
                        <p class="text-xs text-gray-500">
                          PDF ou images (JPG, PNG) jusqu'à 10MB
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input id="terms" name="terms" type="checkbox" class="focus:ring-[#afdddd] h-4 w-4 text-[#afdddd] border-gray-300 rounded" required>
                </div>
                <div class="ml-3 text-sm">
                  <label for="terms" class="font-medium text-gray-700">I agree to the <a href="#" class="text-[#afdddd] hover:text-[#7fbfbf]">terms and conditions</a></label>
                </div>
              </div>
              <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#afdddd] text-base font-medium text-white hover:bg-[#8acaca] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#afdddd] sm:ml-3 sm:w-auto sm:text-sm">
                Confirm Booking
              </button>
            </form>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" id="close-modal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#afdddd] sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const bookingModal = document.getElementById('booking-modal');
        const bookNowButtons = document.querySelectorAll('.book-now-btn');
        const closeModalButton = document.getElementById('close-modal');
        const bookingForm = document.getElementById('booking-form');
        const doctorIdInput = document.getElementById('doctor_id');
        const dateInput = document.getElementById('appointment_date');
        const timeSelect = document.getElementById('appointment_time');

        async function fetchUnavailableTimes() {
          const doctorId = doctorIdInput.value;
          const selectedDate = dateInput.value;

          if (!doctorId || !selectedDate) return;

          try {
            const res = await fetch(`/unavailable-times?doctor_id=${doctorId}&appointment_date=${selectedDate}`);
            const rawTimes = await res.json();
            const takenTimes = rawTimes.map(time => time.slice(0, 5));

            console.log(takenTimes);

            for (const option of timeSelect.options) {
              if (option.value === "") continue;
              option.disabled = takenTimes.includes(option.value);
            }
          } catch (error) {
            console.error('Failed to fetch unavailable times:', error);
          }
        }

        bookNowButtons.forEach(button => {
            button.addEventListener('click', function() {
                const doctorId = this.getAttribute('data-doctor-id');
                document.getElementById('doctor_id').value = doctorId;
                
                bookingModal.classList.remove('hidden');
                fetchUnavailableTimes();
            });
        });

        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            console.log('Form Data:', Object.fromEntries(formData));
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => {
                console.log('Response:', response);
                return response.json();
            })
            .then(data => {
                console.log('Response Data:', data);
                if (data.success) {
                    bookingModal.classList.add('hidden');
                    window.location.reload();
                } else {
                    alert('Failed to book appointment: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while booking the appointment. Please try again.');
            });
        });

        closeModalButton.addEventListener('click', function() {
            bookingModal.classList.add('hidden');
            bookingForm.reset();
        });

        window.addEventListener('click', function(e) {
            if (e.target === bookingModal) {
                bookingModal.classList.add('hidden');
                bookingForm.reset();
            }
        });

        dateInput.addEventListener('change', fetchUnavailableTimes);
        doctorIdInput.addEventListener('change', fetchUnavailableTimes);
    }); 
  </script>
@endsection