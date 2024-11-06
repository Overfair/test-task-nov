@extends('layouts.app')

@section('title', 'Создать фильм')

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
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold">Название</label>
                <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold">Описание</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border rounded"></textarea>
            </div>

            <div class="mb-4">
                <label for="poster" class="block text-gray-700 font-semibold">Постер</label>
                <input type="file" name="poster" id="poster" class="w-full px-3 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="genres" class="block text-gray-700 font-semibold">Жанры</label>
                <select name="genres[]" id="genres" class="w-full px-3 py-2 border rounded" multiple>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div><button type="submit" class="btn btn-blue">Создать</button></div>
        </form>
    </div>
@endsection