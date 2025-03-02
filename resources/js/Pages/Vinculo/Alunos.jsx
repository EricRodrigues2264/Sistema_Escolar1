import { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function AssociarAlunoTurma({ alunos, turmas }) {
    const [alunoId, setAlunoId] = useState('');
    const [turmaId, setTurmaId] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();
        Inertia.post('/aluno-turma', { aluno_id: alunoId, turma_id: turmaId });
    };

    return (
        <AuthenticatedLayout
            header={<h2 className="text-xl font-semibold text-gray-800">Associar Aluno à Turma</h2>}
        >
            <Head title="Associar Aluno à Turma" />

            <div className="py-8">
                <div className="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6 space-y-6">
                    <form onSubmit={handleSubmit}>
                        <div className="space-y-4">
                            <div>
                                <label htmlFor="aluno" className="block text-sm font-medium text-gray-700">Aluno</label>
                                <select
                                    id="aluno"
                                    value={alunoId}
                                    onChange={(e) => setAlunoId(e.target.value)}
                                    className="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                >
                                    <option value="">Selecione um aluno</option>
                                    {alunos.map((aluno) => (
                                        <option key={aluno.id} value={aluno.id}>{aluno.nome}</option>
                                    ))}
                                </select>
                            </div>

                            <div>
                                <label htmlFor="turma" className="block text-sm font-medium text-gray-700">Turma</label>
                                <select
                                    id="turma"
                                    value={turmaId}
                                    onChange={(e) => setTurmaId(e.target.value)}
                                    className="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                >
                                    <option value="">Selecione uma turma</option>
                                    {turmas.map((turma) => (
                                        <option key={turma.id} value={turma.id}>{turma.Nome}</option>
                                    ))}
                                </select>
                            </div>

                            <button
                                type="submit"
                                className="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition"
                            >
                                Associar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
