<script setup>
const config = useRuntimeConfig()
const { data: clientes } = await useFetch(`${config.public.apiBase}/clientes`)
import { ref, computed } from 'vue'

const busca = ref('')

const clientesFiltrados = computed(() =>
  clientes.value
    ? clientes.value.filter(c =>
        c.nome.toLowerCase().includes(busca.value.toLowerCase())
      )
    : []
)
</script>

<template>
  <Header/>
  <div class="min-h-screen flex flex-col items-center justify-start bg-gray-50 pt-8">
    <h1 class="text-3xl font-bold mb-4">Clientes Cadastradas</h1>
    <input
      v-model="busca"
      type="text"
      placeholder="Pesquisar por nome..."
      class="mb-6 px-4 py-2 border rounded w-full max-w-md"
    />
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div
        v-for="cliente in clientesFiltrados"
        :key="cliente.id"
        class="border rounded p-4 shadow hover:shadow-md transition bg-white"
      >
        <h2 class="text-xl font-semibold">{{ cliente.nome }}</h2>
        <p class="text-sm text-gray-500">CPF: {{ cliente.cpf }}</p>
        <p class="text-sm text-gray-500">Data de Nascimento: {{ cliente.data_nascimento }}</p>
        <div class="mt-2 space-x-2">
          <NuxtLink :to="`/clientes/${cliente.id}`" class="btn">Ver detalhes</NuxtLink>
         
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
.btn {
  display: inline-block;
  background-color: #3b82f6; /* Tailwind bg-blue-500 */
  color: #fff; /* Tailwind text-white */
  padding: 0.25rem 0.75rem; /* Tailwind px-3 py-1 */
  border-radius: 0.25rem; /* Tailwind rounded */
  transition: background-color 0.2s;
}
.btn:hover {
  background-color: #2563eb; /* Tailwind hover:bg-blue-600 */
}
</style>
