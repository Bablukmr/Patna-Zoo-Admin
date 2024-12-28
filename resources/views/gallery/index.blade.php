@extends('layout.main')
@section('main-section')

<div class="mt-24">
    <div class="max-w-7xl mx-auto p-8">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-8">Gallery</h1>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4"> 
            @foreach($gallery as $galleryItem)
            <a href="gallery/{{$galleryItem->id}}" class="block transition-transform transform hover:scale-105">
                <div class="border bg-white shadow-lg rounded-lg overflow-hidden cursor-pointer">
                    <div class="relative h-48 w-full">
                        <img
                            src="{{ asset('storage/' . $galleryItem->single_image) }}" 
                            alt="{{$galleryItem->name}}" 
                            class="h-full w-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">{{$galleryItem->name}}</h3>
                        <p class="text-gray-600 text-sm mt-2">
                            {{ Str::limit(strip_tags($galleryItem->short_description), 100) }}
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

@endsection