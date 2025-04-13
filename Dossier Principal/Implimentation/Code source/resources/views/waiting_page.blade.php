@extends('layouts.app')

@section('title', 'Registration Submitted')
@section('content')
  <!-- Confirmation Header -->
  <section class="relative pt-32 pb-10 md:pt-40 md:pb-16 bg-cover bg-center" style="background-image: url('{{ asset('images/health-still-life-with-copy-space.jpg') }}');">
    <div class="absolute inset-0 bg-gradient-to-r from-[#afdddd] to-[#6aacac]/90"></div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
          Registration Submitted
        </h1>
        <p class="mt-6 max-w-2xl mx-auto text-xl text-white">
          Thank you for completing your profile. Your information is now being reviewed.
        </p>
      </div>
    </div>
  </section>

  <!-- Confirmation Content -->
  <section class="py-16 bg-[#f0f7f7]">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Status Card -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden border-2 border-[#afdddd]/30">
        <div class="p-6 sm:p-10">
          <div class="flex items-center justify-center mb-8">
            <div class="h-20 w-20 rounded-full bg-[#afdddd]/30 flex items-center justify-center">
              <svg class="h-10 w-10 text-[#2a7f7f]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
          </div>
          
          <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-3">Your Profile is Pending Review</h2>
            <p class="text-gray-600 max-w-md mx-auto">
              Our team will review your credentials and verify your medical license. This process typically takes 1-2 business days.
            </p>
          </div>
          
          <!-- Status Timeline -->
          <div class="max-w-md mx-auto mb-8">
            <div class="relative">
              <!-- Line -->
              <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-0.5 bg-[#afdddd]"></div>
              
              <!-- Step 1: Submitted -->
              <div class="relative flex items-center mb-8">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-[#2a7f7f] text-white absolute left-1/2 transform -translate-x-1/2">
                  1
                </div>
                <div class="ml-12 pl-4">
                  <h3 class="text-lg font-medium text-[#2a7f7f]">Profile Submitted</h3>
                  <p class="text-sm text-gray-500">{{ now()->format('F j, Y') }}</p>
                </div>
              </div>
              
              <!-- Step 2: Under Review -->
              <div class="relative flex items-center mb-8">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-[#afdddd] text-[#2a7f7f] absolute left-1/2 transform -translate-x-1/2">
                  2
                </div>
                <div class="ml-12 pl-4">
                  <h3 class="text-lg font-medium text-gray-500">Under Review</h3>
                  <p class="text-sm text-gray-500">In progress</p>
                </div>
              </div>
              
              <!-- Step 3: Approved -->
              <div class="relative flex items-center">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 text-gray-500 absolute left-1/2 transform -translate-x-1/2">
                  3
                </div>
                <div class="ml-12 pl-4">
                  <h3 class="text-lg font-medium text-gray-400">Approved</h3>
                  <p class="text-sm text-gray-400">Pending</p>
                </div>
              </div>
            </div>
          </div>
          
          <!-- What's Next -->
          <div class="bg-[#e6f3f3] rounded-lg p-6 mb-8">
            <h3 class="text-lg font-medium text-[#2a7f7f] mb-3">What's Next?</h3>
            <ul class="space-y-3 text-gray-600">
              <li class="flex items-start">
                <svg class="h-5 w-5 text-[#2a7f7f] mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>You'll receive an email notification once your profile is approved</span>
              </li>
              <li class="flex items-start">
                <svg class="h-5 w-5 text-[#2a7f7f] mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Set up your availability schedule once approved</span>
              </li>
              <li class="flex items-start">
                <svg class="h-5 w-5 text-[#2a7f7f] mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Start accepting patient appointments</span>
              </li>
            </ul>
          </div>
          
          <!-- Actions -->
          {{-- <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-full text-white bg-[#2a7f7f] hover:bg-[#afdddd] hover:text-[#2a7f7f] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#afdddd] transition-colors duration-200">
              Go to Dashboard
            </a>
            <a href="" class="inline-flex justify-center py-2 px-6 border border-[#2a7f7f] shadow-sm text-sm font-medium rounded-full text-[#2a7f7f] bg-white hover:bg-[#f0f7f7] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#afdddd] transition-colors duration-200">
              Edit Profile
            </a>
          </div> --}}
        </div>
      </div>
      
      <!-- Contact Support -->
      <div class="mt-8 bg-white rounded-xl shadow-md p-6 border border-[#afdddd]/30">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <svg class="h-6 w-6 text-[#2a7f7f]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
          </div>
          <div class="ml-3">
            <h3 class="text-sm font-medium text-gray-900">Need Help?</h3>
            <p class="text-sm text-gray-500">
              If you have any questions or need assistance, please contact our support team at 
              <a href="mailto:support@docline.com" class="text-[#2a7f7f] hover:text-[#afdddd]">support@docline.com</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection