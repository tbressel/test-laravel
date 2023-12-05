<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/sass/app.scss')

    <title>@yield('title')</title>
</head>
<body>
    <h1>@yield('title')</h1>


        <nav>
            <ul>
                <li>
                    <a href={{ @route('home')}}>Page d'accueil</a>    
                </li>
                <li>
                    <a href={{ @route('task.list')}}>Liste des taches</a>    
                </li>
                <li>
                    <a href={{ @route('task.add')}}>Ajouter des taches</a>    
                </li>
            </ul>
        </nav>
    
@section ('content')
@show

        
</body>
</html>

