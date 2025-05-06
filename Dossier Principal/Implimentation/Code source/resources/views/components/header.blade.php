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
                @auth
                    @if(auth()->user()->role === 'doctor' && !auth()->user()->is_activated)
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-[#afdddd] hover:bg-[#9acccc] text-gray-800 font-medium px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('home') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Home</a>
                        <a href="{{ route('find-doctor') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Find Doctors</a>
                        <a href="{{ route('articles') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Articles</a>
                        <a href="{{ route('about-us') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">About</a>
                        <a href="{{ route('contact-us') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Contact</a>
                        <a href="{{ route('patient.dashboard') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">My Space</a>
                        
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-[#afdddd] hover:bg-[#9acccc] text-gray-800 font-medium px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
                                Logout
                            </button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('home') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Home</a>
                    <a href="{{ route('find-doctor') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Find Doctors</a>
                    <a href="{{ route('articles') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Articles</a>
                    <a href="{{ route('about-us') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">About</a>
                    <a href="{{ route('contact-us') }}" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Contact</a>
                    
                    <a href="{{ route('login') }}" class="bg-[#afdddd] hover:bg-[#9acccc] text-gray-800 font-medium px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">Login</a>
                    <a href="{{ route('register') }}" class="bg-[#afdddd] hover:bg-[#9acccc] text-gray-800 font-medium px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">Register</a>
                @endauth
            </nav>
            <!-- Burger Menu Button -->
            <div class="md:hidden flex items-center">
                @guest
                    <a href="{{ route('login') }}" class="bg-[#afdddd] hover:bg-[#9acccc] text-gray-800 font-medium px-3 py-1 rounded-md text-sm mr-2 transition duration-150 ease-in-out">Login</a>
                    <a href="{{ route('register') }}" class="bg-[#afdddd] hover:bg-[#9acccc] text-gray-800 font-medium px-3 py-1 rounded-md text-sm mr-4 transition duration-150 ease-in-out">Register</a>
                @else
                    <form method="POST" action="{{ route('logout') }}" class="inline mr-4">
                        @csrf
                        <button type="submit" class="bg-[#afdddd] hover:bg-[#9acccc] text-gray-800 font-medium px-3 py-1 rounded-md text-sm transition duration-150 ease-in-out">
                            Logout
                        </button>
                    </form>
                @endguest
                
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
        <a href="{{ route('home') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Home</a>
        <a href="{{ route('find-doctor') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Find Doctors</a>
        <a href="{{ route('articles') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Articles</a>
        <a href="{{ route('about-us') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">About</a>
        <a href="{{ route('contact-us') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Contact</a>
        <a href="{{ route('patient.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Space</a>
        
        <!-- Mobile Authentication Links -->
        @guest
            <div class="mt-2 px-4 py-2">
                <a href="{{ route('login') }}" class="block w-full bg-[#afdddd] hover:bg-[#9acccc] text-gray-800 font-medium px-4 py-2 rounded-md text-sm text-center mb-2 transition duration-150 ease-in-out">Login</a>
                <a href="{{ route('register') }}" class="block w-full bg-[#afdddd] hover:bg-[#9acccc] text-gray-800 font-medium px-4 py-2 rounded-md text-sm text-center transition duration-150 ease-in-out">Register</a>
            </div>
        @else
            <div class="mt-2 px-4 py-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full bg-[#afdddd] hover:bg-[#9acccc] text-gray-800 font-medium px-4 py-2 rounded-md text-sm text-center transition duration-150 ease-in-out">
                        Logout
                    </button>
                </form>
            </div>
        @endguest
    </nav>
</header>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>