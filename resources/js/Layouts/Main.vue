<template>
    <v-app> <!-- Vuetify requires this -->
      <header class="bg-slate-800 text-white">
        <nav class="p-6 mx-auto max-w-screen-lg flex items-center justify-between">
          <Link :href="route('home')">Home</Link>
          <div>
            <button 
              @click="lightsOn"
              class="hover:bg-slate-700 w-6 h-6 grid 
              place-items-center rounded-full hover:outline outline-1 outline-white"
            >
              <i class="fa-solid fa-moon"></i>
            </button>
          </div>
        </nav>
      </header>
  
      <v-main> <!-- ✅ This makes Vuetify styles work properly -->
        <slot />
      </v-main>
    </v-app>
  </template>
  
  