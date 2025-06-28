<template>
  <header class="bg-pink-300 text-white py-4 shadow">
    <div class="container mx-auto flex items-center justify-between">
      <h1 class="text-2xl font-bold">Fabiana Machado</h1>
      <nav>
        <ul class="flex space-x-4">
          <li>
            <NuxtLink to="/" exact-active-class="active" class="hover:underline">Início</NuxtLink>
          </li>
          <li>
            <NuxtLink to="/clientes/cadastrar" exact-active-class="active" class="hover:underline">Cadastrar Cliente </NuxtLink>
          </li>
        </ul>
      </nav>
    </div>
  </header>
</template>

<style scoped>
.active {
  font-weight: bold;
  text-decoration: underline;
  color: #fff;
}
</style>