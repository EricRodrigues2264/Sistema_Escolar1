<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro De Turmas</title>
</head>
<body>
    <h1>
        Cadastro de Turmas
    </h1>
    <form action="{{ route('turmas.store') }}" method="POST">
        @csrf
        <label for="Nome">Nome:</label>
        <input type="text" name="Nome" id="Nome">     
        </br>
        <label for="Descrição">Descrição:</label>
        <input type="text" name="Descrição" id="Descrição">
        </br>
        <button type="submit">Cadastrar</button>  


    </form>
</body>
</html>