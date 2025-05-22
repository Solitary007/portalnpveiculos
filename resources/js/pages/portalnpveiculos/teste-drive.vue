<template>
    <div class="container">
        <header class="header">Ficha de uso Teste Drive</header>
        <main class="main">
            <div class="card">
                <h2>Registro Test Drive</h2>
                <form @submit.prevent="registrarSaida">
                    <input
                        v-model="form.nome"
                        type="text"
                        placeholder="Nome do responsável"
                        required
                    />
                    <input
                        v-model="form.modelo"
                        type="text"
                        placeholder="Modelo ou Placa do veículo"
                        required
                    />
                    <textarea
                        v-model="form.observacoes"
                        placeholder="Observações"
                    ></textarea>
                    <button type="submit">Registrar Saída</button>
                </form>
            </div>

            <table class="tabela">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Data/Hora Saída</th>
                        <th>Nome</th>
                        <th>Veículo</th>
                        <th>Observações</th>
                        <th>Data/Hora Entrada</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in registros" :key="index">
                        <td>
                            <span class="status-indicator" :class="item.status"></span>
                        </td>
                        <td>{{ item.saida }}</td>
                        <td>{{ item.nome }}</td>
                        <td>{{ item.veiculo }}</td>
                        <td>{{ item.obs }}</td>
                        <td>{{ item.entrada }}</td>
                        <td>
                            <button
                                v-if="!item.entrada"
                                @click="registrarEntrada(index)"
                            >
                                Registrar Entrada
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>
        <footer class="footer">
            Todos os direitos reservados a NP Veículos.
        </footer>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                nome: '',
                modelo: '',
                observacoes: ''
            },
            registros: []
        };
    },
    created() {
        this.carregarDadosLocalStorage();
    },
    methods: {
        registrarSaida() {
            const dataHoraSaida = new Date().toLocaleString();
            this.registros.push({
                status: 'red',
                saida: dataHoraSaida,
                nome: this.form.nome,
                veiculo: this.form.modelo,
                obs: this.form.observacoes,
                entrada: ''
            });
            this.salvarDadosLocalStorage();
            this.form.nome = '';
            this.form.modelo = '';
            this.form.observacoes = '';
        },
        registrarEntrada(index) {
            this.registros[index].entrada = new Date().toLocaleString();
            this.registros[index].status = 'green';
            this.salvarDadosLocalStorage();
        },
        salvarDadosLocalStorage() {
            localStorage.setItem('testeDriveRegistros', JSON.stringify(this.registros));
        },
        carregarDadosLocalStorage() {
            const dados = localStorage.getItem('testeDriveRegistros');
            this.registros = dados ? JSON.parse(dados) : [];
        }
    }
};
</script>

<style scoped>
* {
    box-sizing: border-box;
}
html, body, .container {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', sans-serif;
    background-color: #fff !important; /* Garante fundo branco */
    min-height: 100vh;
    width: 100vw;
}
.container {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    background-color: #fff;
}
.main {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center; /* Centraliza verticalmente */
    min-height: 80vh;
}
.header, .footer {
    background-color: white;
    color: black;
    width: 100%;
    text-align: center;
    padding: 1rem;
    box-shadow: 0 2px 12px rgb(125, 125, 125);
    font-weight: bold;
    position: static;
}
.footer {
    font-weight: normal;
    font-size: 0.9rem;
    margin-top: auto;
    position: static;
    bottom: 0;
    left: 0;
}
.card {
    background: #fafafa;
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: -1px 2px 9px rgb(125, 125, 125);
    max-width: 400px;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 auto;
}
h2 {
    color: black;
    font-weight: bold;
    text-align: center;
    margin-bottom: 1rem;
}
input, textarea, button {
    color: black;
    width: 100%;
    margin-top: 0.75rem;
    padding: 0.75rem;
    border: 1px solid #777777;
    border-radius: 0.5rem;
    font-size: 1rem;
    text-align: center;
}
button {
    background-color: #e53935;
    color: white;
    border: none;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.2s;
}
button:hover {
    background-color: #b71c1c;
}
table {
    color: black;
    margin-top: 2rem;
    border-collapse: collapse;
    width: 90%;
    background: rgb(255, 255, 255);
}
th, td {
    padding: 0.75rem;
    text-align: left;
    border-bottom: 1px solid gray;
}
.status-indicator {
    height: 12px;
    width: 12px;
    border-radius: 50%;
    display: inline-block;
}
.red { background-color: red; }
.green { background-color: green; }
</style>