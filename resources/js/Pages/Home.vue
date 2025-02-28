<template>
  <div class="container">
    <h3 align="center" class="mt-5">Order Management</h3>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="form-area">
          <form @submit.prevent="save" id="order-form">
            <div class="row">
              <div class="col-md-6">
                <label>Customer Name</label>
                <v-text-field v-model="order.customer_name" label="Customer Name" required></v-text-field>
              </div>
              <div class="col-md-6">
                <label>Email</label>
                <v-text-field v-model="order.email" label="Email" required></v-text-field>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Phone</label>
                <v-text-field v-model="order.phone" label="Phone"></v-text-field>
              </div>
              <div class="col-md-6">
                <label>Product Name</label>
                <v-text-field v-model="order.product_name" label="Product Name" required></v-text-field>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Product ID</label>
                <v-text-field v-model="order.product_id" label="Product ID" required></v-text-field>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mt-3">
                <v-btn type="submit" color="success" form="order-form">Save</v-btn>
              </div>
            </div>
          </form>
        </div>

        <v-table theme="dark">
          <thead>
            <tr>
              <th class="text-left">Order ID</th>
              <th class="text-left">Customer Name</th>
              <th class="text-left">Email</th>
              <th class="text-left">Phone</th>
              <th class="text-left">Product Name</th>
              <th class="text-left">Product ID</th>
              <th class="text-left">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="order in result" :key="order.id">
              <td>{{ order.id }}</td>
              <td>{{ order.customer_name }}</td>
              <td>{{ order.email }}</td>
              <td>{{ order.phone }}</td>
              <td>{{ order.product_name }}</td>
              <td>{{ order.product_id }}</td>
              <td>
                <v-btn type="button" color="info" @click="edit(order)">Edit</v-btn>
                <v-btn type="button" color="danger" @click="remove(order)">Delete</v-btn>
              </td>
            </tr>
          </tbody>
        </v-table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

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
.form-area {
  padding: 20px;
  margin-top: 20px;
  background-color: #0b0b0b;
  color: #fffcfc;
}
</style>
