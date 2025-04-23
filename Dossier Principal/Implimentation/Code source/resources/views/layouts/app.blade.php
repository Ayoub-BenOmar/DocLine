<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>

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

    @stack('scripts')
</body>
</html>