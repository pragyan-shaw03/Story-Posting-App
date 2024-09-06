@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Story</h1>

    <form action="{{ route('stories.update', $story->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Title Field -->
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold text-gray-700 mb-2">Title</label>
            <input type="text" name="title" value="{{ $story->title }}" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>

        <!-- Body Field -->
        <div class="mb-6">
            <label for="body" class="block text-lg font-semibold text-gray-700 mb-2">Body</label>
            <textarea name="body" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ $story->body }}</textarea>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between items-center">
            <a href="{{ route('stories.index') }}" class="text-blue-500 hover:underline">Cancel</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg">Update Story</button>
        </div>
    </form>
</div>
@endsection
