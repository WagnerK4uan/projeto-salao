<script setup>
import { ref } from "vue";
const config = useRuntimeConfig();
const nome = ref("");
const cpf = ref("");
const celular = ref("");
const profissao = ref("");
const data_nascimento = ref("");

const mensagem = ref("");

async function cadastrar() {
  const res = await $fetch(`${config.public.apiBase}/clientes`, {
    method: "POST",
    body: {
      nome: nome.value,
      cpf: cpf.value,
      celular: celular.value,
      profissao: profissao.value,
      data_nascimento: data_nascimento.value,
    },
  });
  mensagem.value = "Cliente cadastrada com sucesso!";
  nome.value =
    cpf.value =
    celular.value =
    profissao.value =
    data_nascimento.value =
      "";
}
</script>

<template>
  <Header />
  <div class="max-w-md mx-auto mt-8 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Cadastrar Cliente</h1>
    <form @submit.prevent="cadastrar" class="space-y-3">
      <input v-model="nome" placeholder="Nome" class="input" required />
      <input v-model="cpf" placeholder="CPF" class="input" required />
      <input v-model="celular" placeholder="Celular" class="input" required />
      <input v-model="profissao" placeholder="Profissão" class="input" />
      <input
        v-model="data_nascimento"
        type="date"
        placeholder="Data de Nascimento"
        class="input"
      />
      <div class="flex gap-2 mt-4">
        <BotaoVoltar class="w-1/2" />
        <button
          type="submit"
          class="bg-red-100 hover:bg-neutral-100 text-neutral-700 font-bold py-2 px-4 rounded mb-4 flex items-center w-1/2"
        >
          Cadastrar
        </button>
      </div>
    </form>
    <p v-if="mensagem" class="text-green-600 mt-2">{{ mensagem }}</p>
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
