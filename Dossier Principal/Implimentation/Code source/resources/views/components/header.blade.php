<!-- resources/views/components/header.blade.php -->
<header class="bg-white shadow-md fixed w-full z-50 top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <div class="flex items-center">
                <a href="" class="flex items-center">
                    <img src="{{ asset('images/DocLine_Logo.png') }}" alt="DcoLine Logo" class="h-10 w-auto mr-2">
                    <span class="text-2xl font-bold text-gray-900">DocLine</span>
                </a>
            </div>
            <nav class="hidden md:flex md:space-x-8">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Home</a>
                <a href="{{ route('find_doctor') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Find Doctors</a>
                <a href="{{ route('articles') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Articles</a>
                <a href="" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">About</a>
                <a href="" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Contact</a>
                <a href="" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">My Space</a>
            </nav>
            <!-- Burger Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="menu-toggle" class="text-gray-700 focus:outline-none">
                    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <nav id="mobile-menu" class="hidden md:hidden bg-white shadow-md absolute top-20 left-0 w-full py-4">
        <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Home</a>
        <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Find Doctors</a>
        <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Articles</a>
        <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">About</a>
        <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Contact</a>
        <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Space</a>
    </nav>
</header>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>