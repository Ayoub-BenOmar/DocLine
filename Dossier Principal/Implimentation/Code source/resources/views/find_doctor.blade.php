@extends('layouts.app')

@section('title', 'Find Doctor')

@section('content')
  <!-- Page Title Section -->
  <section class="pt-32 pb-10 md:pt-40 md:pb-16 bg-gradient-to-r from-green-300 to-green-500 bg-cover bg-center bg-no-repeat" style="background-image: url('https://img.freepik.com/free-photo/flat-lay-medical-elements-arrangement-with-copy-space_23-2148502906.jpg?t=st=1742209468~exp=1742213068~hmac=4ec48c67c9596cabc200bed32cd80b3fc579bf57b67bfceee965b3acd04eba77&w=1380');">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
          <!-- Specialty Filter -->
          <div>
            <label for="specialty" class="block text-sm font-medium text-gray-700 mb-1">Specialty</label>
            <select id="specialty" name="specialty"
              class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-green-300 focus:border-green-300 sm:text-sm rounded-lg">
              <option value="">All Specialties</option>
              <option value="cardiology">Cardiology</option>
              <option value="dermatology">Dermatology</option>
              <option value="neurology">Neurology</option>
              <option value="orthopedics">Orthopedics</option>
              <option value="pediatrics">Pediatrics</option>
              <option value="psychiatry">Psychiatry</option>
              <option value="gynecology">Gynecology</option>
              <option value="ophthalmology">Ophthalmology</option>
            </select>
          </div>

          <!-- City/Location Filter -->
          <div>
            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
            <select id="location" name="location"
              class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-green-300 focus:border-green-300 sm:text-sm rounded-lg">
              <option value="">All Locations</option>
              <option value="new-york">New York</option>
              <option value="los-angeles">Los Angeles</option>
              <option value="chicago">Chicago</option>
              <option value="houston">Houston</option>
              <option value="miami">Miami</option>
              <option value="san-francisco">San Francisco</option>
              <option value="boston">Boston</option>
              <option value="dallas">Dallas</option>
            </select>
          </div>

          <!-- Price Range Filter -->
          <div>
            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price Range</label>
            <select id="price" name="price"
              class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-green-300 focus:border-green-300 sm:text-sm rounded-lg">
              <option value="">Any Price</option>
              <option value="budget">$0 - $50</option>
              <option value="moderate">$50 - $100</option>
              <option value="premium">$100 - $200</option>
              <option value="luxury">$200+</option>
            </select>
          </div>

          <!-- Experience Filter -->
          <div>
            <label for="experience" class="block text-sm font-medium text-gray-700 mb-1">Experience</label>
            <select id="experience" name="experience"
              class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-green-300 focus:border-green-300 sm:text-sm rounded-lg">
              <option value="">Any Experience</option>
              <option value="1-5">1-5 years</option>
              <option value="5-10">5-10 years</option>
              <option value="10-15">10-15 years</option>
              <option value="15+">15+ years</option>
            </select>
          </div>
        </div>

        <!-- Search Button -->
        <div class="mt-6 flex justify-center">
          <button type="button" id="search-button"
            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-green-300 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 transition-colors duration-200">
            <svg class="mr-2 -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd" />
            </svg>
            Search Doctors
          </button>
        </div>
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
          <p class="mt-1 text-sm text-gray-500">Showing 12 doctors matching your criteria</p>
        </div>
        <div class="mt-4 md:mt-0 flex items-center">
          <span class="text-sm text-gray-700 mr-2">Sort by:</span>
          <select id="sort-by"
            class="text-sm border-gray-300 rounded-md focus:outline-none focus:ring-green-300 focus:border-green-300">
            <option value="relevance">Relevance</option>
            <option value="rating-high">Highest Rating</option>
            <option value="price-low">Lowest Price</option>
            <option value="price-high">Highest Price</option>
            <option value="experience">Most Experienced</option>
            <option value="availability">Earliest Available</option>
          </select>
        </div>
      </div>
  
      <!-- Results Grid -->
      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        <!-- Single Doctor Card -->
        <div class="doctor-card bg-white rounded-xl shadow-xl overflow-hidden">
          <div class="relative">
            <div class="overflow-hidden h-64">
              <img class="w-full h-full object-cover doctor-image"
                src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                alt="Dr. Sarah Johnson">
            </div>
            <div class="absolute top-4 right-4 bg-green-300 text-white text-xs font-bold px-3 py-1 rounded-full">Top Rated</div>
          </div>
          <div class="p-6">
            <div class="flex items-center justify-between">
              <div>
                <h3 class="text-xl font-bold text-gray-900">Dr. Sarah Johnson</h3>
                <p class="text-green-400 font-medium">Cardiologist</p>
              </div>
            </div>
            <div class="mt-4 flex flex-wrap gap-2">
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Heart Disease</span>
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Hypertension</span>
            </div>
            <div class="mt-4 space-y-2">
              <div class="flex items-center text-sm text-gray-500">
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                New York, NY
              </div>
              <div class="flex items-center text-sm text-gray-500">
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 013 10a1 1 0 11-2 0 5 5 0 015.21-5 5 5 0 013.508 1.851A1 1 0 0111 8.5V9h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1H8a1 1 0 110-2h1V8.5a1 1 0 00-.5-.866A3 3 0 0010 13a1 1 0 11-2 0 1 1 0 00-1-1 1 1 0 110-2 1 1 0 001-1 1 1 0 11-2 0 3 3 0 003-3z" clip-rule="evenodd" />
                </svg>
                $150 per visit
              </div>
              <div class="flex items-center text-sm text-gray-500">
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
                15+ years experience
              </div>
            </div>
            <div class="mt-6 flex items-center justify-between">
              <a href="#" class="text-green-400 hover:text-green-500 text-sm font-medium">
                View Profile
              </a>
              <button type="button" id="open-modal" class="book-now-btn inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-green-300 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 transition-colors duration-200" data-doctor="Dr. Sarah Johnson" data-specialty="Cardiologist">
                Book Now
              </button>
            </div>
          </div>
        </div>
        
        <!-- Additional doctor cards would go here in a real implementation -->
      </div>
  
      <!-- Pagination -->
      <div class="mt-12 flex justify-center">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
          <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
            <span class="sr-only">Previous</span>
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="#" aria-current="page" class="z-10 bg-green-50 border-green-300 text-green-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
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

  <!-- Booking Modal -->
  <div id="booking-modal" class="modal hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Background overlay -->
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- Modal panel -->
      <div class="modal-content inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
              <svg class="h-6 w-6 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

          <div class="mt-6">
            <form id="booking-form" class="space-y-4">
              <div>
                <label for="patient-name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="patient-name" id="patient-name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-300 focus:border-green-300 sm:text-sm" required>
              </div>

              <div>
                <label for="patient-email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="patient-email" id="patient-email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-300 focus:border-green-300 sm:text-sm" required>
              </div>

              <div>
                <label for="patient-phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="tel" name="patient-phone" id="patient-phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-300 focus:border-green-300 sm:text-sm" required>
              </div>

              <div>
                <label for="appointment-date" class="block text-sm font-medium text-gray-700">Preferred Date</label>
                <input type="date" name="appointment-date" id="appointment-date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-300 focus:border-green-300 sm:text-sm" required>
              </div>

              <div>
                <label for="appointment-time" class="block text-sm font-medium text-gray-700">Preferred Time</label>
                <select id="appointment-time" name="appointment-time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-300 focus:border-green-300 sm:text-sm" required>
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
                <label for="visit-type" class="block text-sm font-medium text-gray-700">Visit Type</label>
                <select id="visit-type" name="visit-type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-300 focus:border-green-300 sm:text-sm" required>
                  <option value="">Select visit type</option>
                  <option value="new-patient">New Patient Consultation</option>
                  <option value="follow-up">Follow-up Visit</option>
                  <option value="annual-checkup">Annual Checkup</option>
                  <option value="urgent">Urgent Care</option>
                </select>
              </div>

              <div>
                <label for="insurance" class="block text-sm font-medium text-gray-700">Insurance Provider</label>
                <select id="insurance" name="insurance" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-300 focus:border-green-300 sm:text-sm">
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
                    <label for="medical-documents" class="block text-sm font-medium text-gray-700">Ajout de documents tels que des analyses, radios ou antécédents médicaux</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                      <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                          <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex justify-center text-sm text-gray-600">
                          <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-green-300 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-300">
                            <span>Télécharger des fichiers</span>
                            <input id="file-upload" name="medical-documents[]" type="file" class="sr-only" multiple accept=".pdf,.jpg,.jpeg,.png">
                          </label>
                        </div>
                        <p class="text-xs text-gray-500">
                          PDF ou images (JPG, PNG) jusqu'à 10MB
                        </p>
                      </div>
                    </div>
                  </div>

                  <div id="file-list" class="hidden">
                    <h3 class="text-sm font-medium text-gray-700 mb-2">Documents téléchargés</h3>
                    <ul class="divide-y divide-gray-200 border border-gray-200 rounded-md overflow-hidden"></ul>
                  </div>
                </div>
              </div>

              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input id="terms" name="terms" type="checkbox" class="focus:ring-green-300 h-4 w-4 text-green-300 border-gray-300 rounded" required>
                </div>
                <div class="ml-3 text-sm">
                  <label for="terms" class="font-medium text-gray-700">I agree to the <a href="#" class="text-green-300 hover:text-green-500">terms and conditions</a></label>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" id="confirm-booking" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-300 text-base font-medium text-white hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 sm:ml-3 sm:w-auto sm:text-sm">
            Confirm Booking
          </button>
          <button type="button" id="close-modal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Success Modal -->
  <div id="success-modal" class="modal hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Background overlay -->
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- Modal panel -->
      <div class="modal-content inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
              <svg class="h-6 w-6 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="success-modal-title">
                Appointment Booked Successfully!
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  Your appointment has been confirmed. You will receive a confirmation email shortly with all the details.
                </p>
              </div>
            </div>
          </div>

          <div class="mt-6 bg-gray-50 p-4 rounded-lg">
            <h4 class="text-sm font-medium text-gray-900">Appointment Details:</h4>
            <div class="mt-2 space-y-2">
              <p class="text-sm text-gray-600">Doctor: <span id="success-doctor" class="font-medium">Dr. Sarah Johnson</span></p>
              <p class="text-sm text-gray-600">Specialty: <span id="success-specialty" class="font-medium">Cardiologist</span></p>
              <p class="text-sm text-gray-600">Date: <span id="success-date" class="font-medium">March 15, 2025</span></p>
              <p class="text-sm text-gray-600">Time: <span id="success-time" class="font-medium">10:00 AM</span></p>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" id="close-success-modal" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-300 text-base font-medium text-white hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 sm:ml-3 sm:w-auto sm:text-sm">
            Done
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/doctors.js') }}"></script>
@endpush