<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use Inertia\Inertia;
use Inertia\Response;

class TurmaController extends Controller
{
    public function Turmas_Store(Request $request)
    {
        $request->validate([
            'Nome' => 'required|string|max:200',
            'Descrição' => 'nullable|string|max:200',
        ]);

        // Criar uma nova turma
        Turma::create([
            'Nome' => $request->Nome,
            'Descrição' => $request->Descrição
        ]);

        return redirect()->route('turmas.index');
    }

    // Em TurmaController

    public function Turmas_Index(): Response
{
    // Carregar as turmas e os alunos associados
    $turmas = Turma::with('alunos')->get();

    return Inertia::render('Turmas/Index', [
        'turmas' => $turmas->map(function ($turma) {
            return [
                'id' => $turma->id,
                'Nome' => $turma->Nome,
                'Descrição' => $turma->Descrição,
                'alunos' => $turma->alunos->map(function ($aluno) {
                    return [
                        'id' => $aluno->id,
                        'email' => $aluno->email,
                        'nome' => $aluno->nome
                        
                    ];
                }),
            ];
        }),
    ]);
}
}