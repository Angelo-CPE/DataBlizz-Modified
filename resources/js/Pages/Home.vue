<script setup>
import Orders from '../Components/Orders.vue';
import { ref } from "vue";

const count = ref(0);
</script>

<template>
  <div>
    <h1 class="text-blue-500">Vue is Working!</h1>
    <button @click="count++" class="bg-green-500 text-white p-2 rounded">
      Clicked {{ count }} times
    </button>
  </div>
  <Orders />
</template>

