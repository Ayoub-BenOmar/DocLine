@extends('layouts.app')

@section('title', 'Home')
@section('content')
  <!-- Hero Section -->
  <section class="relative pt-32 pb-20 md:pt-40 md:pb-24 bg-cover bg-center" style="background-image: url('{{ asset('images/health-still-life-with-copy-space.jpg') }}');">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="lg:grid lg:grid-cols-12 lg:gap-8">
        <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
          <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
            <svg class="mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
              <circle cx="4" cy="4" r="3" />
            </svg>
            Trusted by 10,000+ patients
          </span>
          <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-gray-900 sm:mt-5 sm:text-5xl lg:mt-6 xl:text-6xl">
            <span class="block">Your Health, Our</span>
            <span class="block text-white">Priority</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-xl">
            Book appointments with top doctors in your area in just a few clicks. Get personalized care and manage your health journey seamlessly.
          </p>
          
          <div class="mt-8 sm:mt-12">
            <form class="sm:max-w-xl sm:mx-auto lg:mx-0">
              @csrf
              <div class="sm:flex">
                <div class="min-w-0 flex-1">
                  <select class="block w-full px-4 py-3 rounded-l-full border-gray-300 focus:ring-green-300 focus:border-green-300 sm:text-sm">
                    <option value="" disabled selected>Select specialty</option>
                    @foreach ($specialties as $specialty)
                        <option name="" id="{{ $specialty->id }}">{{$specialty->speciality_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mt-3 sm:mt-0 sm:ml-3">
                  <button type="submit" class="block w-full px-5 py-3 rounded-r-full bg-white text-black hover:bg-primary hover:text-white font-medium hover:border-2 sm:px-10 transition-colors duration-200">
                    <a href="{{ route('find-doctor') }}">Find Doctor</a>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-base font-semibold text-green-400 tracking-wide uppercase">Our Services</h2>
        <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
          Comprehensive Healthcare Solutions
        </p>
      </div>

      <div class="mt-16 grid gap-8 md:grid-cols-3">
        <!-- Service Cards -->
        {{-- @foreach($services ?? [] as $service)
          <div class="bg-white rounded-xl shadow-xl p-8 transition-all duration-300 hover:-translate-y-2">
            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mb-5">
              {!! $service->icon_svg ?? '<svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>' !!}
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service->title ?? 'Online Appointment' }}</h3>
            <p class="text-gray-600">{{ $service->description ?? 'Book appointments with your preferred doctors anytime, anywhere.' }}</p>
          </div>
        @endforeach --}}
        
        {{-- @empty($services) --}}
          <div class="bg-white rounded-xl shadow-xl p-8 transition-all duration-300 hover:-translate-y-2">
            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mb-5">
              <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Online Appointment</h3>
            <p class="text-gray-600">Book appointments with your preferred doctors anytime, anywhere.</p>
          </div>

          <div class="bg-white rounded-xl shadow-xl p-8 transition-all duration-300 hover:-translate-y-2">
            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mb-5">
              <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Digital Prescriptions</h3>
            <p class="text-gray-600">Receive and manage your prescriptions digitally.</p>
          </div>

          <div class="bg-white rounded-xl shadow-xl p-8 transition-all duration-300 hover:-translate-y-2">
            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mb-5">
              <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Medical Records</h3>
            <p class="text-gray-600">Access your complete medical history securely.</p>
          </div>
        {{-- @endempty --}}
      </div>
    </div>
  </section>

  <!-- Specialties Section -->
  <section id="specialties" class="py-16 bg-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-base font-semibold text-green-400 tracking-wide uppercase">Medical Specialties</h2>
        <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
          Expert Care in Every Field
        </p>
        <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
          Our platform connects you with specialists across all major medical disciplines.
        </p>
      </div>

      <div class="mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <!-- Specialty Cards -->
        {{-- @foreach($medicalSpecialties ?? [] as $specialty)
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-2">
            <div class="p-6">
              <div class="flex items-center">
                <div class="flex-shrink-0">
                  <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">
                    {!! $specialty->icon_svg ?? '<svg class="h-8 w-8 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>' !!}
                  </div>
                </div>
                <div class="ml-4">
                  <h3 class="text-xl font-bold text-gray-900">{{ $specialty->name ?? 'Cardiology' }}</h3>
                  <p class="text-gray-600 mt-1">{{ $specialty->short_description ?? 'Heart and cardiovascular system specialists' }}</p>
                </div>
              </div>
              <p class="mt-4 text-gray-600">{{ $specialty->description ?? 'Our cardiologists diagnose and treat conditions affecting the heart and blood vessels, from hypertension to heart failure.' }}</p>
              <div class="mt-5">
                <a href="{{ route('specialists.by-specialty', $specialty->slug ?? 'cardiology') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 transition-colors duration-200">
                  Find a {{ $specialty->specialist_title ?? 'Specialist' }}
                </a>
              </div>
            </div>
          </div>
        @endforeach --}}

        {{-- @empty($medicalSpecialties)
          @for($i = 0; $i < 3; $i++) --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-2">
              <div class="p-6">
                <div class="flex items-center">
                  <div class="flex-shrink-0">
                    <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">
                      <svg class="h-8 w-8 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                      </svg>
                    </div>
                  </div>
                  <div class="ml-4">
                    <h3 class="text-xl font-bold text-gray-900">Cardiology</h3>
                    <p class="text-gray-600 mt-1">Heart and cardiovascular system specialists</p>
                  </div>
                </div>
                <p class="mt-4 text-gray-600">Our cardiologists diagnose and treat conditions affecting the heart and blood vessels, from hypertension to heart failure.</p>
                <div class="mt-5">
                  <a href="" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 transition-colors duration-200">
                    Find a Cardiologist
                  </a>
                </div>
              </div>
            </div>
          {{-- @endfor
        @endempty --}}
      </div>
    </div>
  </section>

  <!-- Top Doctors Section -->
  <section id="doctors" class="py-16 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-base font-semibold text-green-300 tracking-wide uppercase">Meet Our Doctors</h2>
        <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
          Top-Rated Medical Professionals
        </p>
        <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
          Our platform features verified doctors with exceptional qualifications and patient reviews.
        </p>
      </div>

      <div class="mt-16 grid gap-8 md:grid-cols-3">
        <!-- Doctor Cards -->
          @foreach ($doctors as $doctor)
            <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-300 hover:-translate-y-2">
              <div class="relative">
                <div class="overflow-hidden h-64">
                  <img class="w-full h-full object-cover transition-transform duration-300 hover:scale-105" 
                      src="{{ asset('storage/' . $doctor->profile_pic) }}" 
                      alt="Dr. Sarah Johnson">
                </div>
                <div class="absolute top-4 right-4 bg-green-300 text-white text-xs font-bold px-3 py-1 rounded-full">
                  Top Rated
                </div>
              </div>
              <div class="p-6">
                <div class="flex items-center justify-between">
                  <div>
                    <h3 class="text-xl font-bold text-gray-900">Dr. {{ $doctor->name }} {{ $doctor->last_name }}</h3>
                    <p class="text-green-300 font-medium">{{ $doctor->speciality->speciality_name }}</p>
                  </div>
                  <div class="flex items-center">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-gray-700 font-medium">4.9</span>
                  </div>
                </div>
                <div class="mt-4 flex flex-wrap gap-2">
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Heart Disease
                  </span>
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Hypertension
                  </span>
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Cardiac Surgery
                  </span>
                </div>
                <p class="mt-4 text-gray-600">
                  Dr. {{ $doctor->name }} is a board-certified {{ $doctor->speciality->speciality_name }} specialist with over {{ $doctor->experience }} years of experience in treating conditions related to {{ strtolower($doctor->speciality->speciality_name) }}.
                </p>
                <div class="mt-6 flex items-center justify-between">
                  <span class="text-gray-700 font-medium">Next available: Today</span>
                  <a href="" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 transition-colors duration-200">
                    Book Now
                  </a>
                </div>
              </div>
            </div>
          @endforeach
      </div>

      <div class="mt-12 text-center">
        <a href="{{ route('find-doctor') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-primary hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 transition-colors duration-200">
          View All Doctors
          <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="relative py-16 bg-[#afdddd] overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
        <div class="mb-10 lg:mb-0">
          <h2 class="text-3xl font-extrabold text-black sm:text-4xl">
            <span class="block">Looking for medical guidance?</span>
            <span class="block text-green-100">Explore our expert articles and FAQs.</span>
          </h2>
          <p class="mt-4 text-lg text-black opacity-90">
            Browse our comprehensive library of medical articles written by healthcare professionals. Find answers to common questions and gain valuable insights about your health concerns.
          </p>
          <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('articles') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-full text-green-700 bg-white hover:bg-gray-50 transition-colors duration-200">
              Read Articles
            </a>
            <a href="{{ route('articles') }}" class="inline-flex items-center justify-center px-5 py-3 border border-white text-base font-medium rounded-full text-white hover:bg-white hover:text-green-700 transition-colors duration-200">
              View FAQs
              <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>
        <div class="relative">
          <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="relative">
              <img class="w-full h-full object-cover" 
                   src="{{ asset('images/national-cancer-institute-NFvdKIhxYlU-unsplash.jpg') }}" 
                   alt="Medical professionals discussing healthcare articles">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mb-2 w-fit">
                  Evidence-Based Content
                </span>
                <h3 class="text-xl font-bold text-white">Stay Informed With Expert Medical Articles</h3>
                <p class="text-sm text-white/80 mt-2">Access the latest healthcare information written by our team of medical professionals</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section id="testimonials" class="py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-green-300 tracking-wide uppercase">Testimonials</h2>
                <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                    What Our Patients Say
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Don't just take our word for it — hear from our satisfied patients.
                </p>
            </div>

            <div class="mt-16 grid gap-8 lg:grid-cols-3">
                <!-- Testimonial cards -->
                    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100 hover:border-green-200 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <div class="h-12 w-12 rounded-full overflow-hidden bg-gray-200">
                                <img src="{{ asset('images/Me.jpg') }}" 
                                    alt="Client" class="h-full w-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900">Ayoub</h4>
                                <div class="flex text-yellow-400">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 italic">"DocLine has transformed how I manage my healthcare. The booking process is incredibly simple, and I love having all my medical records in one secure place."</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100 hover:border-green-200 transition-all duration-300">
                      <div class="flex items-center mb-6">
                          <div class="h-12 w-12 rounded-full overflow-hidden bg-gray-200">
                              <img src="{{ asset('images/Me.jpg') }}" 
                                  alt="Client" class="h-full w-full object-cover">
                          </div>
                          <div class="ml-4">
                              <h4 class="text-lg font-bold text-gray-900">Ayoub</h4>
                              <div class="flex text-yellow-400">
                                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                      </svg>
                              </div>
                          </div>
                      </div>
                      <p class="text-gray-600 italic">"DocLine has transformed how I manage my healthcare. The booking process is incredibly simple, and I love having all my medical records in one secure place."</p>
                  </div>
                  <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100 hover:border-green-200 transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="h-12 w-12 rounded-full overflow-hidden bg-gray-200">
                            <img src="{{ asset('images/Me.jpg') }}" 
                                alt="Client" class="h-full w-full object-cover">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-bold text-gray-900">Ayoub</h4>
                            <div class="flex text-yellow-400">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"DocLine has transformed how I manage my healthcare. The booking process is incredibly simple, and I love having all my medical records in one secure place."</p>
                </div>
            </div>
        </div>
  </section>
@endsection