@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $story->title }}</h1>

    <div class="mb-6">
        <p class="text-lg text-gray-700 leading-relaxed">{{ $story->body }}</p>
    </div>

    <div class="flex justify-between items-center">
        <!-- Back to List -->
        <a href="{{ route('stories.index') }}" class="text-blue-500 hover:underline">Back to Stories</a>

        <!-- Edit and Delete Buttons -->
        <div class="flex items-center space-x-4">
            <a href="{{ route('stories.edit', $story->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded shadow">Edit</a>

            <form action="{{ route('stories.destroy', $story->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
