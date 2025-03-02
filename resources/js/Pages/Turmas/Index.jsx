import { Head } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function TurmasIndex({ turmas }) {
    return (
        <AuthenticatedLayout header={<h2 className="text-xl font-semibold text-gray-800">Turmas</h2>}>
            <Head title="Turmas" />

            <div className="py-8">
                <div className="max-w-7xl mx-auto">
                    {turmas.map((turma) => (
                        <div key={turma.id} className="bg-white shadow-lg rounded-lg p-6 mb-6">
                            <h3 className="text-2xl font-semibold text-gray-800">{turma.Nome}</h3>
                            <p className="text-gray-600">{turma.Descrição}</p>

                            <table className="mt-6 w-full table-auto border-collapse border border-gray-300 rounded-md">
                                <thead className="bg-gray-100">
                                    <tr>
                                        <th className="px-4 py-2 text-left text-sm font-medium text-gray-700">Aluno</th>
                                        <th className="px-4 py-2 text-left text-sm font-medium text-gray-700">E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {turma.alunos.map((aluno) => (
                                        <tr key={aluno.id} className="border-t">
                                            <td className="px-4 py-2 text-sm text-gray-800">{aluno.nome}</td>
                                            <td className="px-4 py-2 text-sm text-gray-600">{aluno.email}</td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    ))}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
