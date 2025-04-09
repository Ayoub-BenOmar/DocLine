@extends('layouts.app')

@section('title', 'register')
@section('content')
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="flex justify-center">
          <img src="images/DocLine_Logo.png" alt="MediCare Logo" class="h-10 w-auto mr-2">
          <a href="index.html" class="text-primary text-3xl font-bold">DocLine</a>
        </div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Create your account
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          Already have an account?
          <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:text-primary-500">
            Sign in
          </a>
        </p>
      </div>
  
      <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
          <form class="space-y-6" action="#" method="POST">
            <div>
              <label for="userType" class="block text-sm font-medium text-gray-700">
                I am registering as a
              </label>
              <div class="mt-1">
                <select id="userType" name="userType" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                  <option value="patient">Patient</option>
                  <option value="doctor">Doctor</option>
                </select>
              </div>
            </div>
  
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              <div>
                <label for="firstName" class="block text-sm font-medium text-gray-700">
                  First name
                </label>
                <div class="mt-1">
                  <input id="firstName" name="firstName" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                </div>
              </div>
  
              <div>
                <label for="lastName" class="block text-sm font-medium text-gray-700">
                  Last name
                </label>
                <div class="mt-1">
                  <input id="lastName" name="lastName" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                </div>
              </div>
            </div>
  
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">
                Email address
              </label>
              <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
              </div>
            </div>
  
            <div>
              <label for="phone" class="block text-sm font-medium text-gray-700">
                Phone number
              </label>
              <div class="mt-1">
                <input id="phone" name="phone" type="tel" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
              </div>
            </div>
  
            <div id="doctorFields" class="hidden space-y-6">
              <div>
                <label for="specialty" class="block text-sm font-medium text-gray-700">
                  Medical specialty
                </label>
                <div class="mt-1">
                  <select id="specialty" name="specialty" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                    <option value="">Select your specialty</option>
                    <option value="general">General Medicine</option>
                    <option value="cardiology">Cardiology</option>
                    <option value="dermatology">Dermatology</option>
                    <option value="neurology">Neurology</option>
                    <option value="pediatrics">Pediatrics</option>
                    <option value="psychiatry">Psychiatry</option>
                    <option value="orthopedics">Orthopedics</option>
                    <option value="gynecology">Gynecology</option>
                    <option value="ophthalmology">Ophthalmology</option>
                    <option value="other">Other</option>
                  </select>
                </div>
              </div>
  
              <div>
                <label for="licenseNumber" class="block text-sm font-medium text-gray-700">
                  Medical License Number
                </label>
                <div class="mt-1">
                  <input id="licenseNumber" name="licenseNumber" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                </div>
              </div>
  
              <div>
                <label for="licenseDocument" class="block text-sm font-medium text-gray-700">
                  Upload Medical License Document (PDF)
                </label>
                <div class="mt-1">
                  <input id="licenseDocument" name="licenseDocument" type="file" accept=".pdf" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                </div>
                <p class="mt-1 text-xs text-gray-500">Your account will need to be verified by an administrator before you can use the platform.</p>
              </div>
            </div>
  
            <div id="patientFields" class="space-y-6">
              <div>
                <label for="dateOfBirth" class="block text-sm font-medium text-gray-700">
                  Date of Birth
                </label>
                <div class="mt-1">
                  <input id="dateOfBirth" name="dateOfBirth" type="date" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                </div>
              </div>
            </div>
  
            <div>
              <label for="password" class="block text-sm font-medium text-gray-700">
                Password
              </label>
              <div class="mt-1">
                <input id="password" name="password" type="password" autocomplete="new-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
              </div>
            </div>
  
            <div>
              <label for="passwordConfirmation" class="block text-sm font-medium text-gray-700">
                Confirm password
              </label>
              <div class="mt-1">
                <input id="passwordConfirmation" name="passwordConfirmation" type="password" autocomplete="new-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
              </div>
            </div>
  
            <div class="flex items-center">
              <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
              <label for="terms" class="ml-2 block text-sm text-gray-900">
                I agree to the <a href="#" class="text-primary-600 hover:text-primary-500">Terms and Conditions</a> and <a href="#" class="text-primary-600 hover:text-primary-500">Privacy Policy</a>
              </label>
            </div>
  
            <div>
              <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                Create account
              </button>
            </div>
          </form>
        </div>
      </div>
  
      <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <p class="text-center text-xs text-gray-500">
          &copy; 2025 MediBook. All rights reserved.
        </p>
      </div>
    </div>
  
    <script>
      // Toggle doctor/patient specific fields based on user type selection
      document.getElementById('userType').addEventListener('change', function() {
        const doctorFields = document.getElementById('doctorFields');
        const patientFields = document.getElementById('patientFields');
        
        if (this.value === 'doctor') {
          doctorFields.classList.remove('hidden');
          patientFields.classList.add('hidden');
        } else {
          doctorFields.classList.add('hidden');
          patientFields.classList.remove('hidden');
        }
      });
    </script>
  </body>
@endsection