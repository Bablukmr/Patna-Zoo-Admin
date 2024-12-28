@extends('layout.main')
@section('main-section')

<div class="mt-[100px] mx-auto p-8 max-w-7xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">{{ $gallery->name }}</h1>

    <!-- Single Image Section -->
    <div class="relative overflow-hidden rounded-lg shadow-lg">
        <img src="{{ asset('storage/' . $gallery->single_image) }}" 
             alt="{{ $gallery->name }}" 
             class="w-full h-96 object-cover">
    </div>

    <!-- Short Description -->
    <p class="text-gray-700 text-lg mt-6 leading-relaxed">{{ $gallery->short_description }}</p>

    <!-- Long Description Section -->
    <div class="prose max-w-none mt-6 text-gray-800 leading-relaxed">
        {!! $gallery->long_description !!}
    </div>

    <!-- Multiple Images Section -->
    @if (!empty($gallery->multiple_images) && is_array($gallery->multiple_images))
        <h2 class="text-2xl font-semibold mt-8 mb-4">Explore More</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($gallery->multiple_images as $image)
                <div class="relative overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('storage/' . $image) }}" 
                         alt="Gallery Image" 
                         class="w-full h-64 object-cover rounded-lg">
                </div>
            @endforeach
        </div>
    @endif

    <!-- Metadata Section -->
    <div class="mt-8 text-gray-500 text-sm">
        <p><strong>Created at:</strong> {{ $gallery->created_at->format('d M Y, h:i A') }}</p>
        <p><strong>Updated at:</strong> {{ $gallery->updated_at->format('d M Y, h:i A') }}</p>
    </div>

    <!-- Back Button -->
    <a href="/gallery" 
       class="inline-block mt-6 text-blue-500 hover:underline font-medium">
        ← Back to Gallery
    </a>
</div>

@endsection
