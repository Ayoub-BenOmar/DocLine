@extends('layouts.app')

@section('title', 'Complete Your Profile')
@section('content')
  <!-- Registration Completion Header -->
  <section class="relative pt-32 pb-10 md:pt-40 md:pb-16 bg-cover bg-center" style="background-image: url('{{ asset('images/health-still-life-with-copy-space.jpg') }}');">
    <div class="absolute inset-0 bg-gradient-to-r from-[#afdddd] to-[#6aacac]/90"></div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
          Complete Your Doctor Profile
        </h1>
        <p class="mt-6 max-w-2xl mx-auto text-xl text-white">
          Thank you for joining DocLine. Please provide your professional details to complete your registration and start accepting appointments.
        </p>
      </div>
    </div>
  </section>

  <!-- Registration Form Section -->
  <section class="py-16 bg-[#f0f7f7]">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden border-2 border-[#afdddd]/30">
        <div class="p-6 sm:p-10">
          <div class="mb-8">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <div class="h-12 w-12 rounded-full bg-[#afdddd] flex items-center justify-center">
                  <svg class="h-6 w-6 text-[#2a7f7f]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                </div>
              </div>
              <div class="ml-4">
                <h2 class="text-2xl font-bold text-gray-900">Professional Information</h2>
                <p class="text-gray-500">Please fill out all required fields to complete your registration</p>
              </div>
            </div>
          </div>
          
          @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
              <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <!-- Form -->
          <form action="{{route('doctor.store-profile')}}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            
            <!-- Profile Picture Upload -->
            <div>
              <label for="profile_pic" class="block text-sm font-medium text-gray-700">Profile Picture</label>
              <p class="text-xs text-gray-500 mb-2">Upload a professional photo of yourself (JPG, PNG)</p>
              <div class="mt-1 flex items-center">
                <div class="flex-1">
                  <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-[#afdddd]/30 border-dashed rounded-md hover:border-[#afdddd] transition-colors duration-200">
                    <div class="space-y-1 text-center">
                      <svg class="mx-auto h-12 w-12 text-[#8acaca]" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path d="M24 8c4.4 0 8 3.6 8 8s-3.6 8-8 8-8-3.6-8-8 3.6-8 8-8zm0 20c8.8 0 16 3.6 16 8v4H8v-4c0-4.4 7.2-8 16-8z" 
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                      <div class="flex text-sm text-gray-600">
                        <label for="profile_pic" class="relative cursor-pointer bg-white rounded-md font-medium text-[#2a7f7f] hover:text-[#afdddd] focus-within:outline-none">
                          <span>Upload a photo</span>
                          <input id="profile_pic" name="profile_pic" type="file" class="sr-only" accept=".jpg,.jpeg,.png">
                        </label>
                      </div>
                      <p class="text-xs text-gray-500">JPG or PNG up to 20MB</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
            <!-- Medical License -->
            <div>
              <label for="medical_licence" class="block text-sm font-medium text-gray-700">Medical License Number <span class="text-red-500">*</span></label>
              <div class="mt-1">
                <input type="text" name="medical_licence" id="medical_licence" value="{{ old('medical_licence') }}" required
                  class="shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] py-1.5 px-1.5 block w-full sm:text-sm border-gray-300 rounded-md">
              </div>
            </div>
          
            <!-- Medical Document Upload -->
            <div>
              <label for="medical_document" class="block text-sm font-medium text-gray-700">Medical License Document <span class="text-red-500">*</span></label>
              <p class="text-xs text-gray-500 mb-2">Upload a scanned copy of your medical license (PDF, JPG, PNG)</p>
              <div class="mt-1 flex items-center">
                <div class="flex-1">
                  <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-[#afdddd]/30 border-dashed rounded-md hover:border-[#afdddd] transition-colors duration-200">
                    <div class="space-y-1 text-center">
                      <svg class="mx-auto h-12 w-12 text-[#8acaca]" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" 
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                      <div class="flex text-sm text-gray-600">
                        <label for="medical_document" class="relative cursor-pointer bg-white rounded-md font-medium text-[#2a7f7f] hover:text-[#afdddd] focus-within:outline-none">
                          <span>Upload a file</span>
                          <input id="medical_document" name="medical_document" type="file" class="sr-only" accept=".pdf,.jpg,.jpeg,.png">
                        </label>
                      </div>
                      <p class="text-xs text-gray-500">PDF, JPG or PNG up to 10MB</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
            <!-- Specialty -->
            <div>
              <label for="speciality_id" class="block text-sm font-medium text-gray-700">Medical Specialty <span class="text-red-500">*</span></label>
              <div class="mt-1">
                <select id="speciality_id" name="speciality_id" required class="shadow-sm py-1.5 px-1.5 focus:ring-[#afdddd] focus:border-[#afdddd] block w-full sm:text-sm border-gray-300 rounded-md">
                  <option value="" selected disabled>Select your specialty</option>
                  @foreach($specialties as $specialty)
                    <option value="{{ $specialty->id }}" {{ old('speciality_id') == $specialty->id ? 'selected' : '' }}>{{ $specialty->speciality_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          
            <!-- Location Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label for="city_id" class="block text-sm font-medium text-gray-700">City <span class="text-red-500">*</span></label>
                <div class="mt-1">
                  <select id="city_id" name="city_id" required class="shadow-sm py-1.5 px-1.5 focus:ring-[#afdddd] focus:border-[#afdddd] block w-full sm:text-sm border-gray-300 rounded-md">
                    <option value="" selected disabled>Select your city</option>
                    @foreach($cities as $city)
                      <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->city }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
          
              <div>
                <label for="office_address" class="block text-sm font-medium text-gray-700">Office Address <span class="text-red-500">*</span></label>
                <div class="mt-1">
                  <input type="text" name="office_address" id="office_address" value="{{ old('office_address') }}" required
                    class="shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] py-1.5 px-1.5 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
              </div>
            </div>
          
            <!-- Education -->
            <div>
              <label for="education" class="block text-sm font-medium text-gray-700">Education & Qualifications <span class="text-red-500">*</span></label>
              <p class="text-xs text-gray-500 mb-2">List your degrees, universities, and years of graduation</p>
              <div class="mt-1">
                <textarea id="education" name="education" rows="3" required
                  class="shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] block w-full sm:text-sm border-gray-300 rounded-md">{{ old('education') }}</textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500">Example: MD from Harvard Medical School (2015), Residency at Johns Hopkins Hospital (2015-2018)</p>
            </div>
          
            <!-- Experience -->
            <div>
              <label for="experience" class="block text-sm font-medium text-gray-700">Years of Experience <span class="text-red-500">*</span></label>
              <div class="mt-1">
                <input type="number" name="experience" id="experience" min="0" max="70" value="{{ old('experience') }}" required
                  class="shadow-sm focus:ring-[#afdddd] focus:border-[#afdddd] py-1.5 px-1.5 block w-full sm:text-sm border-gray-300 rounded-md">
              </div>
            </div>
          
            <!-- Consultation Fees -->
            <div>
              <label for="fees" class="block text-sm font-medium text-gray-700">Consultation Fees ($) <span class="text-red-500">*</span></label>
              <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <span class="text-gray-500 sm:text-sm">$</span>
                </div>
                <input type="number" name="fees" id="fees" min="0" step="0.01" value="{{ old('fees') }}" required
                  class="focus:ring-[#afdddd] focus:border-[#afdddd] py-1.5 px-1.5 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                  <span class="text-gray-500 sm:text-sm">USD</span>
                </div>
              </div>
            </div>
          
            <!-- Submit Button -->
            <div class="pt-5">
              <div class="flex justify-end">
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-full text-white bg-[#2a7f7f] hover:bg-[#afdddd] hover:text-[#2a7f7f] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#afdddd] transition-colors duration-200">
                  Complete Registration
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Information Box -->
      <div class="mt-8 bg-[#e6f3f3] rounded-xl shadow-md p-6 border border-[#afdddd]/30">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="h-6 w-6 text-[#2a7f7f]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-3">
            <h3 class="text-sm font-medium text-[#2a7f7f]">Important Information</h3>
            <div class="mt-2 text-sm text-[#2a7f7f]/80">
              <p>Your profile will be reviewed by our team for verification before it becomes visible to patients. This process typically takes 1-2 business days.</p>
              <ul class="list-disc pl-5 mt-2 space-y-1">
                <li>Make sure your medical license is valid and current</li>
                <li>Provide accurate and detailed professional information</li>
                <li>You can update your profile information at any time from your dashboard</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-base font-semibold text-[#2a7f7f] tracking-wide uppercase">Why Join DocLine</h2>
        <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
          Benefits of Being a DocLine Doctor
        </p>
      </div>

      <div class="mt-12 grid gap-8 md:grid-cols-3">
        <!-- Benefit Card 1 -->
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:border-[#afdddd] hover:shadow-lg transition-all duration-300">
          <div class="w-12 h-12 rounded-full bg-[#afdddd] flex items-center justify-center mb-5">
            <svg class="h-6 w-6 text-[#2a7f7f]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Time Management</h3>
          <p class="text-gray-600">Take control of your schedule with our easy-to-use appointment system. Set your own availability and manage bookings effortlessly.</p>
        </div>

        <!-- Benefit Card 2 -->
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:border-[#afdddd] hover:shadow-lg transition-all duration-300">
          <div class="w-12 h-12 rounded-full bg-[#afdddd] flex items-center justify-center mb-5">
            <svg class="h-6 w-6 text-[#2a7f7f]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Expand Your Patient Base</h3>
          <p class="text-gray-600">Connect with thousands of patients looking for quality healthcare services. Grow your practice through our trusted platform.</p>
        </div>

        <!-- Benefit Card 3 -->
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:border-[#afdddd] hover:shadow-lg transition-all duration-300">
          <div class="w-12 h-12 rounded-full bg-[#afdddd] flex items-center justify-center mb-5">
            <svg class="h-6 w-6 text-[#2a7f7f]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Secure Platform</h3>
          <p class="text-gray-600">Our HIPAA-compliant platform ensures that all patient data and communications are protected with the highest security standards.</p>
        </div>
      </div>
    </div>
  </section>
@endsection