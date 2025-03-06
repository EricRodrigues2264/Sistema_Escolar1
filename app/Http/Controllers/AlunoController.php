<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;
use Inertia\Inertia;
use Inertia\Response;

class AlunoController extends Controller
{
    public function store(Request $request)
    {

        //Checar requisições
        $request->validate([
            'nome' => 'required|string|max:200',
        
            'email' => 'nullable|email|unique:alunos,email',
        
            'turma_id' => 'required|exists:turmas,id',  
        
        ]);

        // Criar um novo aluno
        $aluno = Aluno::create([
            'nome' => $request->nome,

            'email' => $request->email
        ]);

        // Associar aluno à turma
        $aluno->turmas()->attach($request->turma_id);

        // Redirecionar para a página de alunos
        return Inertia::location(route('alunos.index'));
    }

    public function index(): Response
    {
        // Variavel Todos os alunos
        $alunos = Aluno::all();
        
        // Retornar a lista de alunos
        return Inertia::render('Alunos/Index', ['alunos' => $alunos->map(function ($aluno) {
            return [
                'id' => $aluno->id,
                'nome' => $aluno->nome,
                'email' => $aluno->email
            ];
        })
    ]);}

    // Método para cadastrar aluno em turma 
    public function cadastrarEmTurma(Request $request)
    {
        $request->validate([
            'turma_id' => 'required|exists:turmas,id',
            'aluno_id' => 'required|exists:alunos,id',
        ]);

        // Encontrar aluno e turma
        $turma = Turma::find($request->turma_id);
        $aluno = Aluno::find($request->aluno_id);

        // Verificar se a turma já não está associada
        if ($aluno->turmas->contains($turma->id)) {
            return redirect()->route('turmas.index');
        }

        // Associar aluno à turma
        $aluno->turmas()->attach($turma->id);

        // Redirecionar após o cadastro
        return redirect()->route('turmas.index');
    }
}
    
