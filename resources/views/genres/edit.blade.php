@extends('layouts.app')

@section('title', 'Редактировать жанр')

@section('content')

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div>
        <form action="{{ route('genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Название</label>
                    <input type="text" name="name" value="{{ $genre->name }}" id="name" required class="w-2/4 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div><button type="submit" class="btn btn-blue">Сохранить</button></div>
        </form>
    </div>
@endsection