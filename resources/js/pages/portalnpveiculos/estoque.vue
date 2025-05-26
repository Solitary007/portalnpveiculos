<template>
  <div class="p-4">
    <h2 class="text-xl font-bold mb-4">Cadastro de Veículos</h2>

    <form @submit.prevent="salvarVeiculo" class="grid grid-cols-3 gap-2 mb-4">
      <div v-for="campo in campos" :key="campo">
        <label class="block text-sm font-medium">{{ formatarCampo(campo) }}</label>
        <input
          v-model="form[campo]"
          type="text"
          class="w-full border p-1 rounded text-sm"
        />
      </div>
      <button type="submit" class="col-span-3 bg-blue-600 text-white py-2 rounded mt-2">
        {{ editandoId ? 'Atualizar' : 'Cadastrar' }} Veículo
      </button>
    </form>

    <table class="table-auto w-full border-collapse border border-gray-300">
      <thead>
        <tr class="bg-gray-100 text-xs">
          <th v-for="campo in campos" :key="campo" class="border p-2">{{ formatarCampo(campo) }}</th>
          <th class="border p-2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="veiculo in veiculos" :key="veiculo.id" class="text-xs">
          <td v-for="campo in campos" :key="campo" class="border p-1">{{ veiculo[campo] }}</td>
          <td class="border p-1 flex gap-2">
            <button @click="editarVeiculo(veiculo)" class="text-blue-600 text-xs">Editar</button>
            <button @click="deletarVeiculo(veiculo.id)" class="text-red-600 text-xs">Excluir</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      campos: [
        'observacao', 'ipva', 'lic', 'chave', 'loja', 'tipo_estoque', 'situacao',
        'vistoria_cautelar', 'modelo', 'marca', 'cor', 'cbl', 'fab', 'ano', 'placa',
        'fipe', 'custo_ga', 'venda', 'preco_oferta', 'km', 'origem', 'est',
        'data_entrada', 'nota_fiscal'
      ],
      veiculos: [],
      form: {},
      editandoId: null
    };
  },
  created() {
    this.resetForm();
    this.carregarVeiculos();
  },
  methods: {
    formatarCampo(campo) {
      return campo.replace(/_/g, ' ').toUpperCase();
    },
    resetForm() {
      this.form = {};
      this.campos.forEach(c => this.form[c] = '');
      this.editandoId = null;
    },
    async carregarVeiculos() {
      const response = await axios.get('/api/veiculos');
      this.veiculos = response.data;
    },
    async salvarVeiculo() {
      try {
        if (this.editandoId) {
          await axios.put(`/api/veiculos/${this.editandoId}`, this.form);
        } else {
          await axios.post('/api/veiculos', this.form);
        }
        this.resetForm();
        this.carregarVeiculos();
      } catch (error) {
        alert('Erro ao salvar: ' + error.message);
      }
    },
    editarVeiculo(veiculo) {
      this.form = { ...veiculo };
      this.editandoId = veiculo.id;
    },
    async deletarVeiculo(id) {
      if (confirm('Tem certeza que deseja excluir?')) {
        await axios.delete(`/api/veiculos/${id}`);
        this.carregarVeiculos();
      }
    }
  }
};
</script>

<style scoped>
table {
  font-size: 12px;
}
</style>
