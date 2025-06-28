<template>
  <button
    @click="voltar"
    class="bg-pink-300 hover:bg-pink-400 text-white font-bold py-2 px-4 rounded mb-4 flex items-center"
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