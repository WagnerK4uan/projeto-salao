<script setup>
const route = useRoute();
const config = useRuntimeConfig();
const { data: cliente } = await useFetch(
  `${config.public.apiBase}/clientes/${route.params.id}`
);
import BotaoVoltar from "~/components/BotaoVoltar.vue";
</script>

<template>
  <Header />
  <div class="p-6">
    <h1 class="text-2xl font-bold">Detalhes da Cliente</h1>
    <div class="mt-4 bg-white p-4 rounded shadow">
      <p><strong>Nome:</strong> {{ cliente.nome }}</p>
      <p><strong>CPF:</strong> {{ cliente.cpf }}</p>
      <p><strong>Celular:</strong> {{ cliente.celular }}</p>
      <p><strong>Profissão:</strong> {{ cliente.profissao }}</p>
      <p><strong>Data de Nascimento:</strong> {{ cliente.data_nascimento }}</p>
    </div>
    <div class="mt-6 flex space-x-2">
      <NuxtLink :to="`/micropigmentacao/${cliente.id}`" class="btn"
        >Micropigmentação</NuxtLink
      >
      <NuxtLink :to="`/depilacao/${cliente.id}`" class="btn"
        >Depilação</NuxtLink
      >
      <NuxtLink
        :to="`/procedimentos/cadastrar?cliente_id=${cliente.id}`"
        class="btn"
      >
        Cadastrar Procedimento
      </NuxtLink>
    </div>
  </div>
  <BotaoVoltar />
</template>

<style scoped>
.btn {
  background: #3b82f6;
  color: #fff;
  padding: 0.5rem 1rem;
  border-radius: 0.25rem;
  font-weight: 500;
  transition: background 0.2s;
}
.btn:hover {
  background: #2563eb;
}
</style>
