<template>
  <div class="bg-gray-900 min-h-screen py-12 px-6">
    <div class="container mx-auto max-w-6xl bg-gray-800 p-6 rounded-lg shadow-lg">
      <h3 class="text-4xl font-bold text-center mb-6 text-white">DataBlizz Order Form</h3>

      <div class="bg-gray-200 p-6 rounded-lg shadow-md">
        <form @submit.prevent="save" id="order-form">
          <div class="grid grid-cols-1 sm:grid-cols-5 gap-4">
            <div>
              <label class="text-black">Customer Name</label>
              <v-text-field v-model="order.customer_name" label="Customer Name" required class="mt-2" outlined dense style="font-size:2px;" color="black"></v-text-field>
            </div>
            <div>
              <label class="text-black">Email</label>
              <v-text-field v-model="order.email" label="Email" required class="mt-2" outlined dense color="black"></v-text-field>
            </div>
            <div>
              <label class="text-black">Phone</label>
              <v-text-field v-model="order.phone" label="Phone" class="mt-2" outlined dense color="black"></v-text-field>
            </div>
            <div>
              <label class="text-black">Product Name</label>
              <v-text-field v-model="order.product_name" label="Product Name" required class="mt-2" outlined dense color="black"></v-text-field>
            </div>
            <div>
              <label class="text-black">Product ID</label>
              <v-text-field v-model="order.product_id" label="Product ID" required class="mt-2" outlined dense color="black"></v-text-field>
            </div>
          </div>
          <div class="text-center mt-6">
            <v-btn type="submit" color="green" form="order-form" class="w-full sm:w-auto">Save</v-btn>
          </div>
        </form>
      </div>

      <div class="mt-8 bg-gray-700 p-6 rounded-lg shadow-md">
        <v-table theme="dark" class="w-full">
          <thead>
            <tr>
              <th class="text-left text-white">Order ID</th>
              <th class="text-left text-white">Customer Name</th>
              <th class="text-left text-white">Email</th>
              <th class="text-left text-white">Phone</th>
              <th class="text-left text-white">Product Name</th>
              <th class="text-left text-white">Product ID</th>
              <th class="text-left text-white">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="order in result" :key="order.id" class="border-b border-gray-500">
              <td class="text-gray-300">{{ order.id }}</td>
              <td class="text-gray-300">{{ order.customer_name }}</td>
              <td class="text-gray-300">{{ order.email }}</td>
              <td class="text-gray-300">{{ order.phone }}</td>
              <td class="text-gray-300">{{ order.product_name }}</td>
              <td class="text-gray-300">{{ order.product_id }}</td>
              <td class="space-x-2">
                <v-btn type="button" color="blue" @click="edit(order)" class="py-1 px-3 text-sm">Edit</v-btn>
                <v-btn type="button" color="red" @click="remove(order)" class="py-1 px-3 text-sm">Delete</v-btn>
              </td>
            </tr>
          </tbody>
        </v-table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'redaxios';

export default {
  name: 'OrderManagement',
  data() {
    return {
      result: [],
      order: {
        id: '',
        customer_name: '',
        email: '',
        phone: '',
        product_name: '',
        product_id: ''
      }
    };
  },
  created() {
    this.loadOrders();
  },
  methods: {
    loadOrders() {
      axios.get("http://127.0.0.1:8000/api/orders").then(({ data }) => {
        this.result = data;
      });
    },
    save() {
      if (this.order.id === '') {
        this.saveData();
      } else {
        this.updateData();
      }
    },
    saveData() {
      axios.post("http://127.0.0.1:8000/api/orders", this.order).then(() => {
        this.loadOrders();
        this.resetForm();
      });
    },
    edit(order) {
      this.order = { ...order };
    },
    updateData() {
      axios.put(`http://127.0.0.1:8000/api/orders/${this.order.id}`, this.order).then(() => {
        this.loadOrders();
        this.resetForm();
        alert("Updated!");
      });
    },
    remove(order) {
      axios.delete(`http://127.0.0.1:8000/api/orders/${order.id}`).then(() => {
        alert("Deleted!");
        this.loadOrders();
      });
    },
    resetForm() {
      this.order = {
        id: '',
        customer_name: '',
        email: '',
        phone: '',
        product_name: '',
        product_id: ''
      };
    }
  }
};
</script>

<style scoped>
/* Dark mode styling to match homepage */
.form-area {
  padding: 20px;
  margin-top: 20px;
  background-color: #1a1a1a;
  color: #eaeaea;
}
</style>
