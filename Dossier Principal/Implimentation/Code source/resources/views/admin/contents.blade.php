@extends('layouts.private_space')
@section('title', 'Content Management')

@section('content')
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="bg-white shadow-lg w-64 flex-shrink-0 hidden md:block">
        <div class="p-4 bg-[#afdddd] text-white bg-cover bg-center" style="background-image: url('{{ asset('images/health-still-life-with-copy-space.jpg') }}');">
            <h2 class="text-2xl font-bold">DocLine</h2>
            <p class="text-white text-opacity-80 text-sm">Admin Portal</p>
        </div>
        <div class="py-4">
            <div class="px-4 py-3">
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                        AA
                    </div>
                    <div class="ml-3">
                        <p class="font-medium">Admin Account</p>
                        <p class="text-xs text-gray-500">System Administrator</p>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                    <i class="fas fa-tachometer-alt mr-3 text-gray-400"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.doctors') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                    <i class="fas fa-user-md mr-3 text-gray-400"></i>
                    <span>Doctors</span>
                </a>
                <a href="{{ route('admin.patients') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                    <i class="fas fa-users mr-3 text-gray-400"></i>
                    <span>Patients</span>
                </a>
                <a href="{{ route('admin.contents') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                    <i class="fas fa-newspaper mr-3 text-[#7fbfbf]"></i>
                    <span>Content</span>
                </a>
                <a href="{{ route('admin.statistics') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                    <i class="fas fa-chart-bar mr-3 text-gray-400"></i>
                    <span>Statistics</span>
                </a>
            </div>
        </div>
        <div class="absolute bottom-0 w-64 p-4 border-t">
            <a href="{{ route('logout') }}" class="flex items-center text-gray-600 hover:text-[#7fbfbf]">
                <i class="fas fa-sign-out-alt mr-3"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <!-- Mobile Sidebar Toggle -->
    <div class="md:hidden fixed bottom-4 right-4 z-50">
        <button id="sidebarToggle" class="bg-[#afdddd] text-white p-3 rounded-full shadow-lg">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobileSidebar" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-40 hidden">
        <div class="bg-white h-full w-64 shadow-lg">
            <div class="p-4 bg-[#afdddd] text-white flex justify-between">
                <div>
                    <h2 class="text-2xl font-bold">DocLine</h2>
                    <p class="text-white text-opacity-80 text-sm">Admin Portal</p>
                </div>
                <button id="closeSidebar" class="text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="py-4">
                <div class="px-4 py-3">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                            AA
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">Admin Account</p>
                            <p class="text-xs text-gray-500">System Administrator</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-tachometer-alt mr-3 text-gray-400"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.doctors') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-user-md mr-3 text-gray-400"></i>
                        <span>Doctors</span>
                    </a>
                    <a href="{{ route('admin.patients') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-users mr-3 text-gray-400"></i>
                        <span>Patients</span>
                    </a>
                    <a href="{{ route('admin.contents') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                        <i class="fas fa-newspaper mr-3 text-[#7fbfbf]"></i>
                        <span>Content</span>
                    </a>
                    <a href="{{ route('admin.statistics') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-chart-bar mr-3 text-gray-400"></i>
                        <span>Statistics</span>
                    </a>
                </div>
            </div>
            <div class="absolute bottom-0 w-64 p-4 border-t">
                <a href="{{ route('logout') }}" class="flex items-center text-gray-600 hover:text-[#7fbfbf]">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 bg-gray-50">
        <!-- Top navigation -->
        <div class="bg-white shadow-sm">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center px-3 md:px-6 py-2 md:py-4 space-y-2 md:space-y-0">
                <div class="flex items-center">
                    <h1 class="text-sm md:text-xl font-semibold text-gray-700">Content Management</h1>
                </div>
                <div class="flex flex-col md:flex-row items-start md:items-center space-y-2 md:space-y-0 md:space-x-3 w-full md:w-auto">
                    <button id="addCityBtn" class="w-full md:w-auto bg-white border border-[#afdddd] text-[#7fbfbf] px-2 py-1.5 md:px-4 md:py-2 rounded-md text-xs md:text-sm flex items-center justify-center hover:bg-[#e6f5f5]">
                        <i class="fas fa-map-marker-alt mr-1 md:mr-2 text-xs md:text-sm"></i> Add City
                    </button>
                    <button id="addSpecialtyBtn" class="w-full md:w-auto bg-white border border-[#afdddd] text-[#7fbfbf] px-2 py-1.5 md:px-4 md:py-2 rounded-md text-xs md:text-sm flex items-center justify-center hover:bg-[#e6f5f5]">
                        <i class="fas fa-plus-circle mr-1 md:mr-2 text-xs md:text-sm"></i> Add Specialty
                    </button>
                    <button id="addArticleBtn" class="w-full md:w-auto bg-[#afdddd] hover:bg-[#8fcece] text-white px-2 py-1.5 md:px-4 md:py-2 rounded-md text-xs md:text-sm flex items-center justify-center">
                        <i class="fas fa-plus mr-1 md:mr-2 text-xs md:text-sm"></i> New Article
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Content Management Content -->
        <div class="p-6">
            <!-- Tabs -->
            <div class="mb-6 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px" id="contentTabs">
                    <li class="mr-2">
                        <a href="#" class="inline-block py-2 px-4 text-sm font-medium text-center border-b-2 border-[#afdddd] text-[#7fbfbf] rounded-t-lg active" data-tab="articles">
                            Articles
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300" data-tab="specialties">
                            Specialties
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300" data-tab="cities">
                            Cities
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Articles Tab Content -->
            <div id="articlesTab" class="tab-content grid grid-cols-1 lg:grid-cols-1 gap-6">
                <!-- Articles List -->
                <div class="bg-white rounded-lg shadow-md mb-6">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Published Articles</h3>
                    </div>
                    <div class="p-5">
                        <div class="w-full overflow-x-auto">
                            <div class="min-w-[800px] md:min-w-full">
                                <table class="w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published</th>
                                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($articles as $article)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 rounded bg-[#e6f5f5] flex items-center justify-center text-[#7fbfbf]">
                                                        <i class="fas fa-file-alt"></i>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">{{ $article->title }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $article->category }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $article->author }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $article->created_at->format('M d, Y') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="flex items-center justify-between mt-6">
                            <div class="text-sm text-gray-500">
                                Showing <span class="font-medium">{{ $articles->firstItem() }}</span> to <span class="font-medium">{{ $articles->lastItem() }}</span> of <span class="font-medium">{{ $articles->total() }}</span> results
                            </div>
                            <div class="flex space-x-2">
                                @if ($articles->onFirstPage())
                                    <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50 disabled:opacity-50" disabled>
                                        Previous
                                    </button>
                                @else
                                    <a href="{{ $articles->previousPageUrl() }}" class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                        Previous
                                    </a>
                                @endif

                                @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)
                                    <a href="{{ $url }}" class="px-3 py-1 border rounded-md {{ $articles->currentPage() == $page ? 'bg-[#afdddd] text-white' : 'text-gray-500 bg-white hover:bg-gray-50' }}">
                                        {{ $page }}
                                    </a>
                                @endforeach

                                @if ($articles->hasMorePages())
                                    <a href="{{ $articles->nextPageUrl() }}" class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                                        Next
                                    </a>
                                @else
                                    <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50 disabled:opacity-50" disabled>
                                        Next
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Specialties Tab Content -->
            <div id="specialtiesTab" class="tab-content hidden grid grid-cols-1 lg:grid-cols-1 gap-6">
                <div class="bg-white rounded-lg shadow-md mb-6">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Medical Specialties</h3>
                    </div>
                    <div class="p-5">
                        <div class="w-full overflow-x-auto">
                            <div class="min-w-[800px] md:min-w-full">
                                <table class="w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctors</th>
                                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($specialties as $specialty)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $specialty->speciality_name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $specialty->doctor_count }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Cities Tab Content -->
            <div id="citiesTab" class="tab-content hidden grid grid-cols-1 lg:grid-cols-1 gap-6">
                <div class="bg-white rounded-lg shadow-md mb-6">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-semibold text-gray-800">Cities</h3>
                    </div>
                    <div class="p-5">
                        <div class="w-full overflow-x-auto">
                            <div class="min-w-[800px] md:min-w-full">
                                <table class="w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctors</th>
                                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($cities as $city)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $city->city }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $city->doctor_count }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Article Modal -->
<div id="addArticleModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden flex items-center justify-center p-4 md:p-6">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
        <div class="p-4 md:p-5 border-b border-gray-200 flex justify-between items-center sticky top-0 bg-white z-10">
            <h3 class="text-base md:text-lg font-semibold text-gray-800">Add New Article</h3>
            <button class="text-gray-400 hover:text-gray-600 closeModal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-4 md:p-5">
            <form method="post" action="{{ route('admin.article.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="articleTitle" class="block text-sm font-medium text-gray-700 mb-1">Article Title</label>
                    <input type="text" id="articleTitle" name="title" class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Enter article title">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="articleCategory" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <input type="text" id="articleCategory" name="category" class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Enter article category">
                    </div>
                    <div>
                        <label for="articleAuthor" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                        <input type="text" id="articleAuthor" name="author" class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Enter article author">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="articleContent" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                    <textarea id="articleContent" name="content" rows="8" class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Write your article content here..."></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="articleImage" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-md p-4 md:p-6 text-center">
                        <input type="file" id="article_image" name="article_image" class="hidden">
                        <label for="article_image" class="cursor-pointer">
                            <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl md:text-3xl mb-2"></i>
                            <p class="text-xs md:text-sm text-gray-500">Click to upload or drag and drop</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 2MB</p>
                        </label>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row justify-end space-y-2 md:space-y-0 md:space-x-3">
                    <button type="button" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 closeModal">Cancel</button>
                    <button type="submit" class="w-full md:w-auto px-4 py-2 bg-[#afdddd] hover:bg-[#8fcece] text-white rounded-md text-sm">Add Article</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Specialty Modal -->
<div id="addSpecialtyModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden flex items-center justify-center p-4 md:p-6">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
        <div class="p-4 md:p-5 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-base md:text-lg font-semibold text-gray-800">Add New Specialty</h3>
            <button class="text-gray-400 hover:text-gray-600 closeModal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-4 md:p-5">
            <form method="post" action="{{ route('admin.speciality.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="specialtyName" class="block text-sm font-medium text-gray-700 mb-1">Specialty Name</label>
                    <input type="text" id="specialtyName" name="speciality" class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Enter specialty name">
                </div>
                
                <div class="flex flex-col md:flex-row justify-end space-y-2 md:space-y-0 md:space-x-3">
                    <button type="button" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 closeModal">Cancel</button>
                    <button type="submit" class="w-full md:w-auto px-4 py-2 bg-[#afdddd] hover:bg-[#8fcece] text-white rounded-md text-sm">Save Specialty</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add City Modal -->
<div id="addCityModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden flex items-center justify-center p-4 md:p-6">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
        <div class="p-4 md:p-5 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-base md:text-lg font-semibold text-gray-800">Add New City</h3>
            <button class="text-gray-400 hover:text-gray-600 closeModal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-4 md:p-5">
            <form method="post" action="{{ route('admin.city.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="cityName" class="block text-sm font-medium text-gray-700 mb-1">City Name</label>
                    <input type="text" id="cityName" name="city" class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#afdddd]" placeholder="Enter city name">
                </div>
                
                <div class="flex flex-col md:flex-row justify-end space-y-2 md:space-y-0 md:space-x-3">
                    <button type="button" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 closeModal">Cancel</button>
                    <button type="submit" class="w-full md:w-auto px-4 py-2 bg-[#afdddd] hover:bg-[#8fcece] text-white rounded-md text-sm">Save City</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab switching functionality
        const tabs = document.querySelectorAll('#contentTabs a');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active', 'border-[#afdddd]', 'text-[#7fbfbf]'));
                tabs.forEach(t => t.classList.add('text-gray-500', 'border-transparent'));
                
                // Add active class to clicked tab
                this.classList.add('active', 'border-[#afdddd]', 'text-[#7fbfbf]');
                this.classList.remove('text-gray-500', 'border-transparent');
                
                // Hide all tab contents
                tabContents.forEach(content => content.classList.add('hidden'));
                
                // Show selected tab content
                const tabId = this.getAttribute('data-tab') + 'Tab';
                document.getElementById(tabId).classList.remove('hidden');
            });
        });

        // Modal functionality
        const modals = {
            article: document.getElementById('addArticleModal'),
            city: document.getElementById('addCityModal'),
            specialty: document.getElementById('addSpecialtyModal')
        };

        // Open modal buttons
        const openButtons = {
            article: document.getElementById('addArticleBtn'),
            city: document.getElementById('addCityBtn'),
            specialty: document.getElementById('addSpecialtyBtn')
        };

        // Close modal buttons
        const closeButtons = document.querySelectorAll('.closeModal');

        // Open modal function
        function openModal(modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
        }

        // Close modal function
        function closeModal(modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = ''; // Restore scrolling
        }

        // Add click event listeners to open buttons
        Object.entries(openButtons).forEach(([type, button]) => {
            if (button) {
                button.addEventListener('click', () => openModal(modals[type]));
            }
        });

        // Add click event listeners to close buttons
        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = button.closest('.fixed');
                closeModal(modal);
            });
        });

        // Close modal when clicking outside
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('fixed')) {
                closeModal(e.target);
            }
        });

        // Close modal when pressing Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                Object.values(modals).forEach(modal => {
                    if (!modal.classList.contains('hidden')) {
                        closeModal(modal);
                    }
                });
            }
        });
    });
</script>
@endsection