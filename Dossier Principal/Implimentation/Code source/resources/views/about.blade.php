@extends('layouts.app')

@section('title', 'About Us')
@section('content')
  <!-- Hero Section -->
  <section class="relative pt-32 pb-20 md:pt-40 md:pb-24 bg-cover bg-center" style="background-image: url('{{ asset('images/health-still-life-with-copy-space.jpg') }}');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-center max-w-3xl mx-auto">
        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
          <svg class="mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
            <circle cx="4" cy="4" r="3" />
          </svg>
          Established in 2020
        </span>
        <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-5xl lg:mt-6 xl:text-6xl">
          <span class="block">About DocLine</span>
          <span class="block text-primary">Our Story & Mission</span>
        </h1>
        <p class="mt-3 text-xl text-white sm:mt-5">
          Transforming healthcare through technology and compassion
        </p>
      </div>
    </div>
  </section>

  <!-- Our Story Section -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-base font-semibold text-green-400 tracking-wide uppercase">Our Story</h2>
        <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
          How DocLine Began
        </p>
      </div>
      
      <div class="mt-12 grid grid-cols-1 gap-16 lg:grid-cols-2 items-center">
        <div>
          <div class="rounded-xl overflow-hidden shadow-lg">
            <img src="{{ asset('images/team-doctors-standing-corridor.jpg') }}" alt="DocLine Founding Team" class="w-full h-auto object-cover" onerror="this.src='https://via.placeholder.com/600x400/e6f5f5/2a7f7f?text=DocLine+Founding+Team'">
          </div>
        </div>
        <div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4">From Vision to Reality</h3>
          <p class="text-gray-600 text-lg mb-6">
            DocLine was founded in 2020 by a team of healthcare professionals and technology experts who recognized a critical gap in healthcare accessibility. Our founders experienced firsthand the challenges patients faced in finding the right doctors, scheduling appointments, and managing their medical records.
          </p>
          <p class="text-gray-600 text-lg">
            What began as a simple idea to connect patients with doctors has evolved into a comprehensive healthcare platform that serves thousands of patients and healthcare providers. Our journey has been guided by a singular vision: to make quality healthcare accessible to everyone through innovative technology.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Mission Section -->
  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-base font-semibold text-primary tracking-wide uppercase">Our Mission</h2>
        <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
          Why We Do What We Do
        </p>
      </div>
      
      <div class="mt-12 grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div class="bg-white rounded-xl shadow-lg p-8 transition-all duration-300 hover:-translate-y-2">
          <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Accessibility</h3>
          <p class="text-gray-600">
            We believe that quality healthcare should be accessible to everyone, regardless of location or circumstance. Our platform breaks down barriers to healthcare access by connecting patients with the right medical professionals at the right time.
          </p>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-8 transition-all duration-300 hover:-translate-y-2">
          <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Innovation</h3>
          <p class="text-gray-600">
            We continuously innovate to improve the healthcare experience. By leveraging technology, we streamline processes, enhance communication, and provide tools that empower both patients and healthcare providers to achieve better health outcomes.
          </p>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-8 transition-all duration-300 hover:-translate-y-2">
          <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Patient-Centered Care</h3>
          <p class="text-gray-600">
            We put patients at the center of everything we do. Our platform is designed to provide a seamless, personalized healthcare experience that respects patients' time, preferences, and individual health needs.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Values Section -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-base font-semibold text-primary tracking-wide uppercase">Our Values</h2>
        <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
          What Guides Us
        </p>
      </div>
      
      <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-primary text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
          </div>
          <div class="ml-4">
            <h3 class="text-lg font-medium text-gray-900">Trust & Transparency</h3>
            <p class="mt-2 text-gray-600">
              We build trust through transparency in our operations, pricing, and communication. We believe that honest, clear information is essential for making informed healthcare decisions.
            </p>
          </div>
        </div>
        
        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-primary text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>
          </div>
          <div class="ml-4">
            <h3 class="text-lg font-medium text-gray-900">Privacy & Security</h3>
            <p class="mt-2 text-gray-600">
              We maintain the highest standards of privacy and security to protect sensitive health information. Our platform employs advanced encryption and follows strict data protection protocols.
            </p>
          </div>
        </div>
        
        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-primary text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
          </div>
          <div class="ml-4">
            <h3 class="text-lg font-medium text-gray-900">Inclusivity</h3>
            <p class="mt-2 text-gray-600">
              We design our platform to be inclusive and accessible to people of all backgrounds, abilities, and health needs. We strive to eliminate disparities in healthcare access and outcomes.
            </p>
          </div>
        </div>
        
        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-primary text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
          </div>
          <div class="ml-4">
            <h3 class="text-lg font-medium text-gray-900">Continuous Improvement</h3>
            <p class="mt-2 text-gray-600">
              We are committed to continuous learning and improvement. We regularly seek feedback from users and healthcare providers to enhance our platform and services.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Team Section -->
  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-base font-semibold text-primary tracking-wide uppercase">Our Team</h2>
        <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
          Meet the People Behind DocLine
        </p>
        <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
          Our diverse team of healthcare professionals, technologists, and industry experts is united by a shared mission to transform healthcare.
        </p>
      </div>
      
      <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Team Member 1 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
          <div class="h-64 overflow-hidden">
            <img class="w-full h-full object-cover" src="{{ asset('images/Me.jpg') }}" alt="Team Member" onerror="this.src='https://via.placeholder.com/400x400/e6f5f5/2a7f7f?text=Team+Member'">
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-900">Dr. Sarah Johnson</h3>
            <p class="text-primary font-medium">Co-Founder & Chief Medical Officer</p>
            <p class="mt-4 text-gray-600">
              Dr. Johnson brings over 15 years of clinical experience as a cardiologist and healthcare administrator. She leads our medical advisory board and ensures all aspects of DocLine meet the highest clinical standards.
            </p>
          </div>
        </div>
        
        <!-- Team Member 2 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
          <div class="h-64 overflow-hidden">
            <img class="w-full h-full object-cover" src="{{ asset('images/Me.jpg') }}" alt="Team Member" onerror="this.src='https://via.placeholder.com/400x400/e6f5f5/2a7f7f?text=Team+Member'">
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-900">Michael Chen</h3>
            <p class="text-primary font-medium">Co-Founder & Chief Technology Officer</p>
            <p class="mt-4 text-gray-600">
              Michael is a technology innovator with a background in healthcare IT. Before DocLine, he developed secure health information systems for major hospitals. He leads our engineering and product development teams.
            </p>
          </div>
        </div>
        
        <!-- Team Member 3 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
          <div class="h-64 overflow-hidden">
            <img class="w-full h-full object-cover" src="{{ asset('images/Me.jpg') }}" alt="Team Member" onerror="this.src='https://via.placeholder.com/400x400/e6f5f5/2a7f7f?text=Team+Member'">
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-900">Amina Patel</h3>
            <p class="text-primary font-medium">Chief Operating Officer</p>
            <p class="mt-4 text-gray-600">
              Amina has extensive experience in healthcare operations and patient experience design. She oversees DocLine's day-to-day operations and ensures our platform delivers exceptional service to both patients and providers.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Impact Section -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-base font-semibold text-primary tracking-wide uppercase">Our Impact</h2>
        <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
          Making a Difference
        </p>
      </div>
      
      <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="bg-white p-6 rounded-xl shadow-lg text-center">
          <div class="text-4xl font-bold text-primary mb-2">10,000+</div>
          <p class="text-gray-600">Patients Served</p>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-lg text-center">
          <div class="text-4xl font-bold text-primary mb-2">500+</div>
          <p class="text-gray-600">Healthcare Providers</p>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-lg text-center">
          <div class="text-4xl font-bold text-primary mb-2">50,000+</div>
          <p class="text-gray-600">Appointments Booked</p>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-lg text-center">
          <div class="text-4xl font-bold text-primary mb-2">98%</div>
          <p class="text-gray-600">Patient Satisfaction</p>
        </div>
      </div>
      
      <div class="mt-16 bg-gray-50 rounded-xl p-8 shadow-lg">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
          <div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Community Initiatives</h3>
            <p class="text-gray-600 mb-6">
              Beyond our platform, DocLine is committed to improving healthcare access in underserved communities. Our initiatives include:
            </p>
            <ul class="space-y-3">
              <li class="flex">
                <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-600">Free health screenings in low-income neighborhoods</span>
              </li>
              <li class="flex">
                <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-600">Health education programs in schools</span>
              </li>
              <li class="flex">
                <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-600">Technology grants for rural healthcare facilities</span>
              </li>
              <li class="flex">
                <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-600">Partnerships with non-profits to expand healthcare access</span>
              </li>
            </ul>
          </div>
          <div>
            <div class="rounded-xl overflow-hidden shadow-lg">
              <img src="{{ asset('images/close-up-team-health-workers.jpg') }}" alt="Community Initiative" class="w-full h-auto" onerror="this.src='https://via.placeholder.com/600x400/e6f5f5/2a7f7f?text=Community+Initiative'">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="relative py-16 bg-[#afdddd] overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
        <div class="mb-10 lg:mb-0">
          <h2 class="text-3xl font-extrabold text-black sm:text-4xl">
            <span class="block">Join us in our mission</span>
            <span class="block text-green-100">to transform healthcare</span>
          </h2>
          <p class="mt-4 text-lg text-black opacity-90">
            Whether you're a patient seeking quality care or a healthcare provider looking to expand your practice, DocLine is here to support your journey.
          </p>
          <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-full text-green-700 bg-white hover:bg-gray-50 transition-colors duration-200">
              Create an Account
            </a>
            <a href="" class="inline-flex items-center justify-center px-5 py-3 border border-white text-base font-medium rounded-full text-white hover:bg-white hover:text-green-700 transition-colors duration-200">
              Contact Us
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
                   src="{{ asset('images/v869-wan-17.jpg') }}" 
                   alt="Doctor with patient" onerror="this.src='https://via.placeholder.com/600x400/e6f5f5/2a7f7f?text=Doctor+with+Patient'">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mb-2 w-fit">
                  Join Our Community
                </span>
                <h3 class="text-xl font-bold text-white">Experience Healthcare Reimagined</h3>
                <p class="text-sm text-white/80 mt-2">Discover how DocLine is changing the way patients and doctors connect</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection