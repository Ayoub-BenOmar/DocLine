<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>{{ config('app.name', 'Docline') }} - @yield('title')</title>

    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                'primary': '#afdddd',
              }
            }
          }
        }
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/doctors.js') }}"></script>
</head>
<body class="font-sans antialiased">
    @include('components.header')
    
    <main class="pt-20">
        @yield('content')
    </main>
    
    @include('components.footer')

    <script>
      document.addEventListener('DOMContentLoaded', function () {
          @if(session('success'))
              Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: '{{ session('success') }}',
                  timer: 3000,
                  showConfirmButton: false
              });
          @endif
  
          @if(session('error'))
              Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: '{{ session('error') }}',
                  timer: 3000,
                  showConfirmButton: false
              });
          @endif
  
          @if($errors->any())
              Swal.fire({
                  icon: 'warning',
                  title: 'Validation Error',
                  html: `{!! implode('<br>', $errors->all()) !!}`,
                  timer: 5000,
                  showConfirmButton: true
              });
          @endif
      });
  </script>
  
</body>
</html>