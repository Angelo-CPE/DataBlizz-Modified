<template>
  <v-app>
    <header class="bg-slate-800 text-white">
      <nav class="p-6 mx-auto max-w-screen-lg flex items-center justify-between">
        <Link :href="route('home')">Home</Link>
        <Link :href="route('order')">Order</Link>
        <!-- <div>
          <button 
            @click="lightsOn"
            class="hover:bg-slate-700 w-6 h-6 grid 
            place-items-center rounded-full hover:outline outline-1 outline-white"
          >
            <i class="fa-solid fa-moon"></i>
          </button>
        </div> -->
      </nav>
    </header>

    <v-main> 
      <slot />
    </v-main>
  </v-app>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>