@extends('layout.main')
@section('main-section')

<div class="container mt-5">
    <h1 class="display-4 font-weight-bold text-gray-800 mb-6">{{ $gallery->name }}</h1>

    <!-- Single Image Section -->
    <div class="position-relative overflow-hidden rounded-lg shadow-lg mb-4">
        <img src="{{ asset('storage/' . $gallery->single_image) }}" 
             alt="{{ $gallery->name }}" 
             class="img-fluid w-100 fixed-height">
    </div>

    <!-- Short Description -->
    <p class="text-gray-700 lead mt-4">{{ $gallery->short_description }}</p>

    <!-- Long Description Section -->
    <div class="prose mt-5 text-gray-800">
        {!! $gallery->long_description !!}
    </div>

    <!-- Multiple Images Slider Section -->
    @if (!empty($gallery->multiple_images) && is_array($gallery->multiple_images))
        <h2 class="h4 font-weight-semibold mt-5 mb-4">Explore More</h2>
        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($gallery->multiple_images as $index => $image)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="position-relative overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/' . $image) }}" 
                             alt="Gallery Image {{ $index + 1 }}" 
                             class="img-fluid w-100 fixed-height">
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif

    <!-- Metadata Section -->
    <div class="mt-5 text-muted small">
        <p><strong>Created at:</strong> {{ $gallery->created_at->format('d M Y, h:i A') }}</p>
        <p><strong>Updated at:</strong> {{ $gallery->updated_at->format('d M Y, h:i A') }}</p>
    </div>

    <!-- Back Button with Icon -->
    <a href="/gallery" 
       class="btn btn-link mt-4 text-primary d-flex align-items-center">
        <i class="bi bi-arrow-left-circle-fill me-2"></i>Back to Gallery
    </a>
</div>

<style>
.fixed-height {
    height: 450px; /* Set a uniform height for the images */
    object-fit: cover; /* Ensures the images fit nicely within the container */
    object-position: center; /* Centers the image content */
}

</style>
@endsection
