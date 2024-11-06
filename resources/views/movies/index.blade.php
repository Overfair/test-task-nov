@extends('layouts.app')

@section('title', 'Фильмы')

@section('content')

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div><a href="{{ route('movies.create') }}" class="btn btn-blue" style="float: right">
    Создать новый фильм</a></div>
    

    <div><table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-200 text-gray-600">
                <tr>
                    <th class="py-2 px-4 text-left border-b">Название</th>
                    <th class="py-2 px-4 text-left border-b">Описание</th>
                    <th class="py-2 px-4 text-left border-b">Жанры</th>
                    <th class="py-2 px-4 text-left border-b">Действия</th>
                    <th class="py-2 px-4 text-left border-b"></th>
                    <th class="py-2 px-4 text-left border-b"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('movies.show', $movie->id) }}" class="text-blue-500 hover:underline">
                                {{ $movie->title }}
                            </a>
                        </td>
                        <td class="py-2 px-4 border-b"> {{ $movie->description }} </td>
                        <td class="py-2 px-4 border-b" style="width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"> 
                            @foreach ($movie->genres as $genre)
                                {{ $genre->name }};
                            @endforeach 
                        </td>
                        <td class="py-2 px-4 border-b"><a href="{{ route('movies.edit', $movie->id) }}">Редактировать</a></td>
                        @if(!$movie->is_published)
                            <td class="py-2 px-4 border-b"><a href="{{ route('movies.publish', $movie->id) }}">Опубликовать</a></td>
                        @else
                            <td class="py-2 px-4 border-b"><a href="{{ route('movies.publish', $movie->id) }}">Скрыть</a></td>
                        @endif
                        <td class="py-2 px-4 border-b"><form action="{{ route('movies.delete', $movie->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form></td>
                    </tr>
                @endforeach
            </tbody>
    </table></div>

    
    
    <div>{{ $movies->links() }}</div>
@endsection