@extends('layouts.app')

@section('title', 'Жанры')

@section('content')

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div><a href="{{ route('genres.create') }}" class="btn btn-blue" style="float: right">
    Создать новый жанр</a></div>
    

    <div><table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-200 text-gray-600">
                <tr>
                    <th class="py-2 px-4 text-left border-b">Название</th>
                    <th class="py-2 px-4 text-left border-b">Действия</th>
                    <th class="py-2 px-4 text-left border-b"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($genres as $genre)
                    <tr>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('genres.show', $genre->id) }}" class="text-blue-500 hover:underline">
                                {{ $genre->name }}
                            </a>
                        </td>
                        <td class="py-2 px-4 border-b"><a href="{{ route('genres.edit', $genre->id) }}">Редактировать</a></td>
                        <td class="py-2 px-4 border-b"><form action="{{ route('genres.delete', $genre->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form></td>
                    </tr>
                @endforeach
            </tbody>
    </table></div>

    
    
    <div>{{ $genres->links() }}</div>
@endsection