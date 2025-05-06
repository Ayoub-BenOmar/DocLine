@extends('layouts.private_space')
@section('title', 'Doctor Management')

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
                    <a href="{{ route('admin.doctors') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                        <i class="fas fa-user-md mr-3 text-[#7fbfbf]"></i>
                        <span>Doctors</span>
                    </a>
                    <a href="{{ route('admin.patients') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-users mr-3 text-gray-400"></i>
                        <span>Patients</span>
                    </a>
                    <a href="{{ route('admin.contents') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                        <i class="fas fa-newspaper mr-3 text-gray-400"></i>
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
                        <a href="{{ route('admin.doctors') }}" class="flex items-center px-4 py-3 text-gray-600 bg-gray-100 border-l-4 border-[#afdddd]">
                            <i class="fas fa-user-md mr-3 text-[#7fbfbf]"></i>
                            <span>Doctors</span>
                        </a>
                        <a href="{{ route('admin.patients') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-users mr-3 text-gray-400"></i>
                            <span>Patients</span>
                        </a>
                        <a href="{{ route('admin.contents') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 hover:border-l-4 hover:border-[#afdddd] transition-all">
                            <i class="fas fa-newspaper mr-3 text-gray-400"></i>
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
                <div class="flex justify-between items-center px-6 py-4">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-700">Doctor Management</h1>
                    </div>
                </div>
            </div>
            
            <!-- Doctor Management Content -->
            <div class="p-6">
                <!-- Tabs Navigation -->
                <div class="mb-6">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-8" aria-label="Tabs">
                            <a href="#" class="border-b-2 border-[#afdddd] text-[#7fbfbf] whitespace-nowrap py-4 px-1 text-sm font-medium">
                                All Doctors
                            </a>
                            {{-- <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 text-sm font-medium">
                                Active ({{ $activeDoctors->count() }})
                            </a>
                            <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 text-sm font-medium">
                                Suspended ({{ $suspendedDoctors->count() ?? 0 }})
                            </a> --}}
                        </nav>
                    </div>
                </div>

                <!-- Grid Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Doctor Registration Requests -->
                    <div class="bg-white rounded-lg shadow-md lg:col-span-3">
                        <div class="p-5 border-b border-gray-100">
                            <h3 class="font-semibold text-gray-800">Doctor Registration Requests</h3>
                        </div>
                        <div class="p-5">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Specialty</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">License</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Documents</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($doctors as $doctor)
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                                        {{ substr($doctor->name, 0, 1) }}{{ substr($doctor->last_name, 0, 1) }}
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">Dr. {{ $doctor->name }} {{ $doctor->last_name }}</div>
                                                        <div class="text-sm text-gray-500">{{ $doctor->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $doctor->speciality->speciality_name ?? 'N/A' }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $doctor->medical_licence }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button class="view-document bg-white text-primary px-3 py-1 rounded-md text-xs font-medium hover:bg-primary hover:text-white" data-doctor="{{ $doctor->name }}" data-file="{{ Storage::url($doctor->medical_document) }}">
                                                    <i class="fas fa-file-medical mr-1"></i> View Certificate
                                                </button>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $doctor->created_at->format('d M Y')}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Pending
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex">
                                                <form action="{{ route('admin.accept.doctor', ['doctor' => $doctor->id]) }}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <button type="submit" class="text-[#7fbfbf] hover:text-[#afdddd] mr-3">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.suspend.user', ['user' => $doctor->id]) }}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <button class="text-red-500 hover:text-red-700">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- All Doctors List -->
                    <div class="bg-white rounded-lg shadow-md lg:col-span-3">
                        <div class="p-5 border-b border-gray-100">
                            <h3 class="font-semibold text-gray-800">All Doctors</h3>
                        </div>
                        <div class="p-5">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 text-sm">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Specialty</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patients</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($activeDoctors as $activeDoctor)
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 rounded-full bg-[#afdddd] flex items-center justify-center text-white font-bold">
                                                        SM
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">Dr. {{ $activeDoctor->name }} {{ $activeDoctor->last_name }}</div>
                                                        <div class="text-sm text-gray-500">{{ $activeDoctor->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $activeDoctor->speciality->speciality_name ?? 'N/A'}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">142</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $activeDoctor->created_at->format('d M Y') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Active
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="{{ route('admin.suspend.user', ['user' => $activeDoctor->id]) }}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <button class="text-red-500 hover:text-red-700">
                                                        <i class="fas fa-ban"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            
                            <!-- Pagination -->
                            <div class="flex flex-wrap items-center justify-between mt-6">
                                <div class="text-sm text-gray-500 mb-2 md:mb-0">
                                    Showing <span class="font-medium">{{ $activeDoctors->firstItem() }}</span> to <span class="font-medium">{{ $activeDoctors->lastItem() }}</span> of <span class="font-medium">{{ $activeDoctors->total() }}</span> results
                                </div>
                                <div class="flex flex-wrap">
                                    @if ($activeDoctors->onFirstPage())
                                        <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50 disabled:opacity-50 mr-1 mb-1" disabled>
                                            Previous
                                        </button>
                                    @else
                                        <a href="{{ $activeDoctors->previousPageUrl() }}" class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50 mr-1 mb-1">
                                            Previous
                                        </a>
                                    @endif

                                    @foreach ($activeDoctors->getUrlRange(1, $activeDoctors->lastPage()) as $page => $url)
                                        <a href="{{ $url }}" class="px-3 py-1 border rounded-md {{ $activeDoctors->currentPage() == $page ? 'bg-[#afdddd] text-white' : 'text-gray-500 bg-white hover:bg-gray-50' }} mr-1 mb-1">
                                            {{ $page }}
                                        </a>
                                    @endforeach

                                    @if ($activeDoctors->hasMorePages())
                                        <a href="{{ $activeDoctors->nextPageUrl() }}" class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50 mr-1 mb-1">
                                            Next
                                        </a>
                                    @else
                                        <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50 disabled:opacity-50 mr-1 mb-1" disabled>
                                            Next
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Document Viewer Modal -->
            <div id="documentModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden flex items-center justify-center">
                <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-screen overflow-hidden mx-4">
                    <div class="p-5 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800" id="documentModalTitle">Doctor Certificate</h3>
                        <button class="text-gray-400 hover:text-gray-600" id="closeDocumentModal">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="p-5 flex flex-col">
                        <div class="flex flex-wrap justify-between items-center mb-4">
                            <div class="mb-2 md:mb-0">
                                <p class="text-sm text-gray-500">Document Type: <span class="font-medium text-gray-700">Medical License Certificate</span></p>
                                <p class="text-sm text-gray-500">Uploaded: <span class="font-medium text-gray-700">Mar 18, 2025</span></p>
                            </div>
                            <div>
                                <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm flex items-center">
                                    <i class="fas fa-download mr-1"></i> Download
                                </button>
                            </div>
                        </div>
                        
                        <div class="border rounded-lg p-2 bg-gray-50 h-96 overflow-auto">
                            <!-- Document preview area -->
                            <div id="documentPreview" class="flex items-center justify-center h-full">
                                <!-- This will be populated with the document preview -->
                                <img src="https://via.placeholder.com/800x1100?text=Medical+Certificate+Preview" alt="Certificate Preview" class="max-w-full h-auto" id="previewImage">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="bg-white p-4 border-t mt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-500">© 2025 DocLine Admin Portal. All rights reserved.</p>
                    <div class="flex flex-wrap mt-2 md:mt-0">
                        <a href="#" class="text-sm text-gray-500 hover:text-[#7fbfbf] mx-2 mb-1">Privacy Policy</a>
                        <a href="#" class="text-sm text-gray-500 hover:text-[#7fbfbf] mx-2 mb-1">Terms of Service</a>
                        <a href="#" class="text-sm text-gray-500 hover:text-[#7fbfbf] mx-2 mb-1">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection