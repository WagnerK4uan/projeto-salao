<template>
  <button
    @click="voltar"
    class="bg-red-100 hover:bg-neutral-100 text-neutral-700 font-bold py-2 px-4 rounded mb-4 flex items-center"
  >
    ← Voltar
  </button>
</template>

<script setup>
const router = useRouter()
function voltar() {
  router.back()
}
</script>