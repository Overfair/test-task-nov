@extends('layouts.app')

@section('title', 'Жанр')

@section('content')

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div>
        <p><strong>Название:</strong> {{ $genre->name }}</p>
        <p><strong>Дата создания:</strong> {{ $genre->created_at }}</p>

        <div>
            <a href="{{ route('genres.index') }} " class="btn btn-blue">Назад</a>
            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-yellow">Редактировать</a>
        </div>

    </div>

@endsection