import { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function Cadastro({ turmas }) {
    const [dados, setDados] = useState({ nome: "", email: "", turma_id: "", turmaNome: "", turmaDesc: "" });

    const handleChange = (e) => setDados({ ...dados, [e.target.name]: e.target.value });

    const handleSubmit = (e, rota) => {
        e.preventDefault();
        Inertia.post(rota, rota === "/alunos" ? { nome: dados.nome, email: dados.email, turma_id: dados.turma_id } : { Nome: dados.turmaNome, Descrição: dados.turmaDesc });
    };

    return (
        <AuthenticatedLayout header={<h2 className="text-xl font-semibold text-gray-800">Cadastrar - Aluno - Turmas</h2>}>
            <Head title="Cadastro" />
            <div className="py-8 max-w-4xl mx-auto grid gap-20 md:grid-cols-2">
                {[
                    { title: "Cadastrar Aluno", fields: [{ name: "nome", type: "text", placeholder: "Nome" }, { name: "email", type: "email", placeholder: "Email" }, { name: "turma_id", type: "select", options: turmas }], route: "/alunos", btnColor: "bg-blue-600" },
                    { title: "Cadastrar Turma", fields: [{ name: "turmaNome", type: "text", placeholder: "Nome da Turma" }, { name: "turmaDesc", type: "text", placeholder: "Descrição" }], route: "/Turmas", btnColor: "bg-blue-600" }
                ].map(({ title, fields, route, btnColor }) => (
                    <form key={title} onSubmit={(e) => handleSubmit(e, route)} className="bg-white shadow-lg rounded-lg p-6 space-y-4">
                        <h3 className="text-lg font-semibold">{title}</h3>
                        {fields.map(({ name, type, placeholder, options }) =>
                            type === "select" ? (
                                <select key={name} name={name} onChange={handleChange} className="w-full p-2 border rounded" required>
                                    <option value="">Selecione uma turma</option>
                                    {options.map(({ id, Nome, Descrição }) => <option key={id} value={id}>{Nome} - {Descrição}</option>)}
                                </select>
                            ) : (
                                <input key={name} name={name} type={type} placeholder={placeholder} onChange={handleChange} className="w-full p-2 border rounded"  />
                            )
                        )}
                        <button type="submit" className={`w-full text-white py-2 rounded-md hover:opacity-80 transition ${btnColor}`}>Cadastrar</button>
                    </form>
                ))}
            </div>
        </AuthenticatedLayout>
    );
}
