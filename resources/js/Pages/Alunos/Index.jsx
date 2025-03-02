import { Head } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function AlunosIndex({ alunos }) {
    return (
        <AuthenticatedLayout header={<h2 className="text-xl font-semibold text-gray-800">Alunos</h2>}>
            <Head title="Alunos" />

            <div className="py-8">
                <div className="max-w-7xl mx-auto">
                    <table className="min-w-full bg-white shadow-lg rounded-lg table-auto border-collapse">
                        <thead className="bg-gray-100">
                            <tr>
                                <th className="px-4 py-2 text-left text-sm font-medium text-gray-700">Aluno</th>
                                <th className="px-4 py-2 text-left text-sm font-medium text-gray-700">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            {alunos.map((aluno) => (
                                <tr key={aluno.id} className="border-t hover:bg-gray-50">
                                    <td className="px-4 py-2 text-sm text-gray-800">{aluno.nome}</td>
                                    <td className="px-4 py-2 text-sm text-gray-600">{aluno.email}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
