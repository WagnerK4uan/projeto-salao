<script setup>
const route = useRoute();
const config = useRuntimeConfig();
const { data: procedimentos } = await useFetch(
  `${config.public.apiBase}/clientes/${route.params.clienteId}/depilacoes`
);
</script>

<template>
        <Header/>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Fotodepilação</h1>
    <div class="space-y-4">
      <div
        v-for="proc in procedimentos"
        :key="proc.id"
        class="bg-white p-4 shadow rounded"
      >
        <p><strong>Data:</strong> {{ proc.data_procedimento }}</p>
        <p><strong>Procedimento:</strong> {{ proc.descricao_procedimento }}</p>
        <p><strong>Seção:</strong> {{ proc.numero_secao }}</p>
        <p><strong>Observação:</strong> {{ proc.observacao }}</p>
      </div>
    </div>
  </div>
    <BotaoVoltar/>
</template>
