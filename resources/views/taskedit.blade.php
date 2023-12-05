
@extends('template')

@section ('title', 'Editer des tâches')

@section ('content')
    <form id="update-add" method="POST" action="{{ @Route('task.update', ['id' =>$task->id]) }}">
        @csrf
    <input type="text" name="taskname_field" placeholder="saisir le nom d'une tache" value="{{ $task->task_name }}">
    
    <!--add a token hidden field -->
    {{ csrf_field() }}


    <input type="submit" value="Modifier">
  </form>
  
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection


</body>
</html>