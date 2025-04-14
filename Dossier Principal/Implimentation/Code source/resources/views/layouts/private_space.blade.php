<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
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

{{-- 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script> --}}
</head>
<body class="font-sans antialiased">
    
    <main class="p-0">
        @yield('content')
    </main>

    <!-- Simple script for mobile sidebar toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const closeSidebar = document.getElementById('closeSidebar');
            
            if (sidebarToggle && mobileSidebar && closeSidebar) {
                sidebarToggle.addEventListener('click', function() {
                    mobileSidebar.classList.toggle('hidden');
                });
                
                closeSidebar.addEventListener('click', function() {
                    mobileSidebar.classList.add('hidden');
                });
            }
        });
    </script>
    
</body>
</html>