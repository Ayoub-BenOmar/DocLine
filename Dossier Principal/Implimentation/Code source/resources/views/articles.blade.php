@extends('layouts.app')
@section('title', 'Articles')

@section('content')

    <!-- Hero Section -->
    <section class="pt-32 pb-10 md:pt-40 md:pb-16 bg-gradient-to-r from-green-300 to-green-500 bg-cover bg-center bg-no-repeat" style="background-image: url('https://img.freepik.com/free-photo/flat-lay-medical-elements-arrangement-with-copy-space_23-2148502906.jpg?t=st=1742209468~exp=1742213068~hmac=4ec48c67c9596cabc200bed32cd80b3fc579bf57b67bfceee965b3acd04eba77&w=1380');">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-left"> <!-- Changed from text-center to text-left -->
            <h1 class="text-3xl font-extrabold text-white sm:text-4xl md:text-5xl">
                Health Articles & FAQs
            </h1>
            <p class="mt-3 max-w-md text-base text-white sm:text-lg md:mt-5 md:text-xl">
                Expert insights and answers to your most common health questions
            </p>
          </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Latest Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($articles as $article)
                    
                @endforeach
                <article class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <!-- Article Image -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset(('storage/' . $article->image)) }}" alt="Cardiovascular Health" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                        <div class="absolute top-4 right-4 bg-primary text-black text-xs font-bold px-3 py-1 rounded-full">
                            Featured
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <!-- Category and Date -->
                        <div class="flex items-center mb-3">
                            <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-md mr-3">Health</span>
                            <span class="text-gray-500 text-sm">{{ $article->created_at->format('d M, Y') }}</span>
                        </div>
                        
                        <!-- Title -->
                        <h3 class="text-xl font-bold mb-3 text-gray-900 hover:text-green-600 transition-colors">{{ $article->title }}</h3>
                        
                        <!-- Description -->
                        <p class="text-gray-600 mb-4">{{ $article->content }}</p>
                        
                        <!-- Author -->
                        <div class="flex items-center mb-4">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Author" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <span class="block text-sm font-medium text-gray-900">Dr. {{ $article->author }}</span>
                                <span class="block text-xs text-gray-500">{{ $article->category }}</span>
                            </div>
                        </div>
                        
                        {{-- <!-- Read time and Stats -->
                        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-500">8 min read</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm text-gray-500 mr-3">
                                    <svg class="w-4 h-4 text-gray-400 mr-1 inline" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                    1.2k
                                </span>
                            </div>
                        </div> --}}
                        
                        <!-- CTA Button -->
                        <a href="#" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors w-full justify-center">
                            Read Full Article
                            <svg class="ml-2 -mr-1 w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </article>
                
                <!-- Add more articles here -->
                
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 rounded-md m-8 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Frequently Asked Questions</h2>
            </div>

            <div class="max-w-3xl mx-auto space-y-4">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <button
                        class="faq-toggle w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                        <span class="text-lg font-medium text-gray-900">How do I schedule an appointment?</span>
                        <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden px-6 pb-4">
                        <p class="text-gray-600">You can schedule an appointment online or by calling our helpline.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>{{ asset('js/articles.js')}}</script>
@endpush