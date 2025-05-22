<template>
  <div>
    <h3>teste</h3>
    <button @click="adicionarLinha">Adicionar Linha</button>
    <table>
      <thead>
        <tr>
          <th v-for="col in colunas" :key="col">{{ col }}</th>
          <th>Ações</th>
          
        </tr>
      </thead>
      <tbody>
        <tr v-for="(linha, i) in linhas" :key="linha.id || i">
          <td v-for="col in colunas" :key="col">
            <input v-model="linha[col]" @blur="salvarLinha(linha)" />
          </td>
          <td>
            <button @click="salvarLinha(linha)">Salvar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      colunas: [
        'observacao', 'ipva', 'lic', 'chave', 'loja', 'tipo_estoque', 'situacao', 'vistoria_cautelar',
        'modelo', 'marca', 'cor', 'cbl', 'fab_ano', 'placa', 'fipe', 'custo', 'ga', 'venda',
        'preco_oferta', 'km', 'origem', 'est_venda', 'data_entrada', 'nota_fiscal'
      ],
      linhas: []
    };
  },
  created() {
    this.carregarLinhas();
  },
  methods: {
    async carregarLinhas() {
      const resp = await fetch('/api/estoques');
      this.linhas = await resp.json();
    },
    adicionarLinha() {
      this.linhas.push({});
    },
    async salvarLinha(linha) {
      if (linha.id) {
        await fetch(`/api/estoques/${linha.id}`, {
          method: 'PUT',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(linha)
        });
      } else {
        const resp = await fetch('/api/estoques', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(linha)
        });
        const novo = await resp.json();
        Object.assign(linha, novo);
      }
    }
  }
};
</script>

<style scoped>
body, html, #app {
  background: #fff !important;
  font-family: 'Segoe UI', sans-serif;
  margin: 0;
  padding: 0;
}

div {
  padding: 2rem 0;
  min-height: 100vh;
  background: #fff;
  display: flex;
  flex-direction: column;
  align-items: center;
}

button {
  background-color: #e53935;
  color: white;
  border: none;
  border-radius: 0.5rem;
  padding: 0.6rem 1.2rem;
  font-weight: bold;
  cursor: pointer;
  margin-bottom: 1.5rem;
  transition: background 0.2s;
}
button:hover {
  background-color: #b71c1c;
}

table {
  width: 95vw;
  max-width: 1200px;
  border-collapse: collapse;
  background: #fafafa;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  border-radius: 1rem;
  overflow: hidden;
}

th, td {
  padding: 0.6rem 0.4rem;
  border-bottom: 1px solid #ddd;
  text-align: left;
  font-size: 0.98rem;
}

th {
  background: #f5f5f5;
  font-weight: bold;
  color: #222;
}

tr:last-child td {
  border-bottom: none;
}

input {
  width: 100%;
  padding: 0.4rem 0.3rem;
  border: 1px solid #ccc;
  border-radius: 0.3rem;
  font-size: 0.97rem;
  background: #fff;
  box-sizing: border-box;
}

input:focus {
  outline: 2px solid #e53935;
  border-color: #e53935;
  background: #fff9f9;
}

@media (max-width: 900px) {
  table, th, td {
    font-size: 0.85rem;
  }
  table {
    width: 99vw;
  }
}
</style>