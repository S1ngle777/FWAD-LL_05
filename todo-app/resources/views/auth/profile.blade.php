@extends('layouts.app')

@section('content')
<div class="home-container mt-10">
    <h1 class="h1">Личный кабинет</h1>
    <p class="text-gray-600 mb-4">Добро пожаловать, {{ $user->name }}!</p>
    <p class="text-gray-600 mb-4">Ваш Email: {{ $user->email }}</p>

    @can('view-all-profiles')
        <h2 class="text-xl font-bold mt-6 mb-2">Список пользователей:</h2>
        <ul>
            @foreach(App\Models\User::all() as $u)
                <li>
                    <a href="{{ route('profile', ['id' => $u->id]) }}">{{ $u->name }}</a>
                </li>
            @endforeach
        </ul>
    @endcan

    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700">Выйти</button>
    </form>
</div>
@endsection