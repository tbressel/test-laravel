
@extends('template')

@section ('title', 'Ajouter des tâches')

@section ('content')
    <form id="form-add" method="POST" action="{{ @Route('task.created') }}">
    <input type="text" name="taskname_field" placeholder="saisir le nom d'une tache" value="">
    
    <!--add a token hidden field -->
    {{ csrf_field() }}


    <input type="submit" value="Envoyer">
  </form>
  
<!--display a user message if input form is empty--> 
@if($errors->has('taskname_field'))
<p>Le champ « task » ne doit pas etre vide</p>
@endif


@endsection


</body>
</html>