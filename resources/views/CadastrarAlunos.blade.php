<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required><br>

        <label for="turma_id">Turma: </label>
        <select name="turma_id" id="turma_id" required>
            @foreach ($turmas as $turma)
                <option value="{{ $turma->id }}">{{ $turma->Nome }} - {{ $turma->Descrição }}</option>
            @endforeach
        </select><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
