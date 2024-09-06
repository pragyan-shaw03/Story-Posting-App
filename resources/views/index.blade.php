@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-900 mb-8">All Stories</h1>

    @if($stories->isEmpty())
        <p class="text-lg text-gray-600">No stories available at the moment.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($stories as $story)
                <div class="p-6 bg-gray-100 rounded-lg shadow hover:shadow-xl transition-shadow">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $story->title }}</h2>
                    <p class="text-gray-600 mb-6">{{ Str::limit($story->body, 100, '...') }}</p>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('stories.show', $story->id) }}" class="text-blue-500 hover:underline">Read More</a>

                        <div class="flex space-x-3">
                            <!-- Edit Button -->
                            <a href="{{ route('stories.edit', $story->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-1 px-4 rounded">Edit</a>
                            
                            <!-- Delete Button -->
                            <form action="{{ route('stories.destroy', $story->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this story?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Create New Story Button -->
    <div class="mt-8">
        <a href="{{ route('stories.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow">Create New Story</a>
    </div>
</div>
@endsection
