@extends('layouts.app')

@section('content')
    <div class="create-task-container">
        <h1 class="create-task-title">Создать задачу</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="create-task-form">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Название:</label>
                <input type="text" name="title" id="title" class="form-input" required>
            </div>
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="description" class="form-label">Описание:</label>
                <textarea name="description" id="description" class="form-textarea"></textarea>
            </div>
            @error('description')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="due_date" class="form-label">Дедлайн:</label>
                <input type="date" name="due_date" id="due_date" class="form-input">
            </div>
            @error('due_date')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="category_id" class="form-label">Категория:</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="tags" class="form-label">Тэги:</label>
                <select name="tags[]" id="tags" class="form-select" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('tags')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
