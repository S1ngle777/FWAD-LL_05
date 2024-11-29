@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Логин</h2>
    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-lg font-semibold mb-2">Почта</label>
            <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        @error('email')
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
        @enderror
        <div class="mb-4">
            <label for="password" class="block text-lg font-semibold mb-2">Пароль</label>
            <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        @error('password')
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
        @enderror
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-700">Логин</button>
    </form>
</div>
@endsection