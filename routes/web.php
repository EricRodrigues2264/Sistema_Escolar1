<?php
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TurmaController;
use App\Models\Aluno;
use App\Models\Turma;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Responsavel por redirecionar o Cadastro de Alunos.
Route::get('/CadastrarAlunos', function(){

    $alunos1 = Aluno::all();
    $turmas1 = Turma::all();
    return Inertia::render('Cadastrar/Index');
})->name('alunos.create');

Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');

Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');


Route::get('/CadastrarTurmas', function() {
    $alunos = Aluno::all();
    $turmas = Turma::all();
    return Inertia::render('CadastrarTurmas', compact('alunos', 'turmas'));  // Corrigir para Inertia
})->name('turmas.create');

Route::post('/Turmas', [TurmaController::class,'Turmas_Store'])->name('turmas.store');
 
Route::get('/Turmas', [TurmaController::class, 'Turmas_Index'])->name('turmas.index');


Route::get('/cadastrar-aluno-turma', function () {
    $alunos = Aluno::all();
    $turmas = Turma::all();
    return Inertia::render('Vinculo/Alunos',[
        'alunos' => $alunos,
        'turmas' => $turmas,

    ]);
})->name('associação');

Route::post('/aluno-turma', [AlunoController::class, 'cadastrarEmTurma'])->name('aluno.turma.store');



?>