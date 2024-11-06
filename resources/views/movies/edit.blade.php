@extends('layouts.app')

@section('title', 'Редактировать фильм')

@section('content')

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                    <label for="title" class="block text-gray-700 font-medium mb-2">Название</label>
                    <input type="text" name="title" value="{{ $movie->title }}" id="title" required class="w-2/4 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold">Описание</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border rounded">{{ $movie->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="poster" class="block text-gray-700 font-semibold">Постер</label>
                <input type="file" name="poster" id="poster" class="w-full px-3 py-2 border rounded">
                <img src="{{ asset('storage/' . $movie->poster) }}" alt="poster" class="w-32 h-32 object-cover rounded mt-2">
            </div>

            <div class="mb-4">
                <label for="genres" class="block text-gray-700 font-semibold">Жанры</label>
                <select name="genres[]" id="categories" class="w-full px-3 py-2 border rounded" multiple>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $movie->genres->contains($genre->id) ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div><button type="submit" class="btn btn-blue">Сохранить</button></div>
        </form>
    </div>
@endsection