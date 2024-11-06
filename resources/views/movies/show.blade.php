@extends('layouts.app')

@section('title', 'Фильм')

@section('content')

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div>
        <h1 class="text-2xl font-bold mb-6">{{ $movie->title }}</h1>

        <div class="mb-6">
            <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}" class="w-full h-64 object-cover rounded shadow">
        </div>

        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800">Описание</h2>
            <p class="text-gray-700 mt-2">{{ $movie->description ?? 'Нету описания.' }}</p>
        </div>

        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800">Жанр(ы)</h2>
            @if($movie->genres->isNotEmpty())
                <ul class="list-disc list-inside text-gray-700 mt-2">
                    @foreach ($movie->genres as $genre)
                        <li>{{ $genre->name }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-700 mt-2">Жанры не выбраны.</p>
            @endif
        </div>
        <div>
            <a href="{{ route('movies.index') }} " class="btn btn-blue">Назад</a>
            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-yellow">Редактировать</a>
        </div>

    </div>

@endsection