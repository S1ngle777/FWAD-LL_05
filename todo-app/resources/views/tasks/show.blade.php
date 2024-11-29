@extends('layouts.app')

@section('content')
    <div class="task-detail-container">
        <h1 class="task-detail-title">{{ $task->title }}</h1>
        <p class="task-detail-description">{{ $task->description }}</p>
        <p class="task-detail-category">Категория: {{ $task->category->name }}</p>
        <p class="task-detail-tags">Тэги: 
            @foreach ($task->tags as $tag)
                <span class="task-detail-tag">{{ $tag->name }}</span>
            @endforeach
        </p>
        <p class="task-detail-due-date">Дедлайн: {{ $task->due_date }}</p>
        <p class="task-detail-created-at">Создано: {{ $task->created_at }}</p>
        <p class="task-detail-updated-at">Обновлено: {{ $task->updated_at }}</p>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary">Редактировать</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="task-delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    
        <div class="task-comments-container">
            <h2>Комментарии</h2>
            <ul class="task-comments">
                @foreach ($task->comments as $comment)
                    <li class="task-comment">{{ $comment->content }}</li>
                @endforeach
            </ul>
            <form action="{{ route('tasks.addComment', $task->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="content" class="form-label">Добавление комментария:</label>
                    <textarea name="content" id="content" class="form-textarea"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Добавить комментарий</button>
            </form>
        </div>
    </div>
@endsection