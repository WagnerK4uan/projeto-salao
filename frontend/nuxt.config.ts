export default defineNuxtConfig({
  runtimeConfig: {
    public: {
      apiBase: 'http://localhost:8000/api' // Troque se estiver usando uma URL diferente
    }
  },

  modules: ['@nuxtjs/tailwindcss']
})