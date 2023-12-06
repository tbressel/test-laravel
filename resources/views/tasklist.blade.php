<?php
use Illuminate\Support\Facades\Route;
?>
@extends('template')
@section('title', 'Liste des tâches')
@section('content')
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->task_name }}</li>
            <a href="{{ route('task.edit', ['id' => $task->id]) }}">modifier</a>
            <a href="{{ route('task.delete', ['id' => $task->id]) }}">effacer</a>
            <a href="{{ route('task.done', ['id' => $task->id]) }}">tâche effectuée</a>
            {{-- <p>Theme :<span>{{ $task->themes()->pluck('theme_name')->implode(', ') }}</span></p>  --}}
            @foreach($task->themes as $theme)
            <li>{{ $theme->theme_name }}</li>
        @endforeach
        @endforeach
    </ul>
@endsection

<div id="notification">
    @if (session('notif'))
        <p>{{ session('notif') }}</p>
    @endif
</div>

@vite('resources/js/app.js')
