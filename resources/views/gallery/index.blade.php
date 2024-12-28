@extends('layout.main')
@section('main-section')
<style>
    .fixed-card-height {
    height: 250px; /* Fixed height for all cards */
    overflow: hidden; /* Ensure images don’t exceed the container */
}

.fixed-card-height img {
    height: 100%; /* Stretch image to fill container height */
    width: 100%; /* Stretch image to fill container width */
    object-fit: cover; /* Crop the image to maintain aspect ratio */
}

</style>
<div class="mt-24">
    <div class="container p-8">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-8">Gallery</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-4">
            @foreach($gallery as $galleryItem)
            <div class="col">
                <a href="gallery/{{$galleryItem->id}}" class="block transition-transform transform hover:scale-105">
                    <div class="card border bg-white shadow-lg rounded-lg overflow-hidden cursor-pointer">
                        <div class="relative fixed-card-height">
                            <img
                                src="{{ asset('storage/' . $galleryItem->single_image) }}" 
                                alt="{{$galleryItem->name}}" 
                                class="w-100 h-100 object-cover">
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-image-fill text-primary me-2"></i>
                                <h3 class="text-lg font-semibold text-gray-800 truncate">{{$galleryItem->name}}</h3>
                            </div>
                            <p class="text-gray-600 text-sm mt-2">
                                {{ Str::limit(strip_tags($galleryItem->short_description), 100) }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
