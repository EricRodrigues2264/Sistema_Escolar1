<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associar Aluno a Turma</title>
</head>
<body>
    <h1>Associar Aluno a Turma</h1>

    <form action="{{ route('aluno.turma.store') }}" method="POST">
        @csrf
        <label for="aluno_id">Aluno: </label>
        <select name="aluno_id" id="aluno_id" required>
            @foreach ($alunos as $aluno)
                <option value="{{ $aluno->id }}">{{ $aluno->nome }} - {{ $aluno->email }}</option>
            @endforeach
        </select><br>

        <label for="turma_id">Turma: </label>
        <select name="turma_id" id="turma_id" required>
            @foreach ($turmas as $turma)
                <option value="{{ $turma->id }}">{{ $turma->Nome }} - {{ $turma->Descrição }}</option>
            @endforeach
        </select><br>

        <button type="submit">Associar</button>
    </form>
</body>
</html>
