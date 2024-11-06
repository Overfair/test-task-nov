@extends('layouts.app')

@section('title', 'Создать жанр')

@section('content')

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div>
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-medium mb-2">Название</label>
                <input type="text" name="name" id="name" required class="w-2/4 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div><button type="submit" class="btn btn-blue">Создать</button></div>
        </form>
    </div>
@endsection