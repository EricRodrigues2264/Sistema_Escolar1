<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Turmas</title>
</head>
<body>
    <h1>Lista de Turmas</h1>

    <ul>
        @foreach ($turmas as $turma) <!-- Certifique-se de usar $Turmas com 'T' maiúsculo -->
            <li>
                <strong>{{ $turma->Nome }}</strong> - 
                <em>{{ $turma->Descrição }}</em>
                <ul>
                    @foreach ($turma->alunos as $aluno)
                        <li>{{ $aluno->nome }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</body>
</html>
