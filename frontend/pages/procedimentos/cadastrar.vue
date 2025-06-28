<script setup>
import { ref, onMounted } from 'vue'
const config = useRuntimeConfig()
const route = useRoute()

const cliente_id = ref('')
const tipo = ref('depilacao')
const descricao_procedimento = ref('')
const numero_secao = ref('')
const data_procedimento = ref('')
const observacao = ref('')
const mensagem = ref('')
const erro = ref('')
const carregando = ref(false)

onMounted(() => {
  if (route.query.cliente_id) {
    cliente_id.value = route.query.cliente_id
  }
})

async function cadastrar() {
  carregando.value = true
  mensagem.value = ''
  erro.value = ''

  try {
    await $fetch(`${config.public.apiBase}/procedimentos`, {
      method: 'POST',
      body: {
        cliente_id: cliente_id.value,
        tipo: tipo.value,
        descricao_procedimento: descricao_procedimento.value,
        numero_secao: numero_secao.value,
        data_procedimento: data_procedimento.value,
        observacao: observacao.value
      }
    })

    mensagem.value = '✅ Procedimento cadastrado com sucesso!'
    
    // Limpar campos (exceto cliente_id)
    tipo.value = 'depilacao'
    descricao_procedimento.value = ''
    numero_secao.value = ''
    data_procedimento.value = ''
    observacao.value = ''
  } catch (e) {
    erro.value = '❌ Erro ao cadastrar procedimento. Verifique os dados.'
    console.error(e)
  } finally {
    carregando.value = false
  }
}
</script>

<template>
  <Header />
  <div class="max-w-md mx-auto mt-8 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Cadastrar Procedimento</h1>

    <form @submit.prevent="cadastrar" class="space-y-3">
      <input v-model="cliente_id" placeholder="ID da Cliente" class="input" required readonly />
      
      <select v-model="tipo" class="input">
        <option value="depilacao">Depilação</option>
        <option value="micropigmentacao">Micropigmentação</option>
      </select>

      <input v-model="descricao_procedimento" placeholder="Descrição" class="input" required />
      <input v-model="numero_secao" placeholder="Seção" class="input" />
      <input v-model="data_procedimento" type="date" placeholder="Data" class="input" />
      <input v-model="observacao" placeholder="Observação" class="input" />

      <div class="flex gap-2 mt-4">
        <BotaoVoltar class="w-1/2" />
        <button
          type="submit"
          :disabled="carregando"
          class="bg-pink-300 hover:bg-pink-400 text-white font-bold py-2 px-4 rounded mb-4 flex items-center w-1/2"
        >
          {{ carregando ? 'Cadastrando...' : 'Cadastrar' }}
        </button>
      </div>
    </form>

    <p v-if="mensagem" class="text-green-600 mt-2">{{ mensagem }}</p>
    <p v-if="erro" class="text-red-600 mt-2">{{ erro }}</p>
  </div>
</template>

<style scoped>
.input {
  display: block;
  width: 100%;
  padding: 0.5rem;
  border-radius: 0.25rem;
  border: 1px solid #ccc;
}
.btn {
  background: #ec4899;
  color: #fff;
  padding: 0.5rem;
  border-radius: 0.25rem;
}
.btn:hover {
  background: #db2777;
}
</style>
