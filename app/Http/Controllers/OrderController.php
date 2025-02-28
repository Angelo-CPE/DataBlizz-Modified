<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//I'm calling the model here
use App\Models\Orders;

class OrderController extends Controller
{
    protected $orders;
    
    public function __construct()
    {
        $this->orders = new Orders();
    }
    
    public function index()
    {
        try {
            return response()->json($this->orders->all(), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $validated = $request->validate([
                'customer_name' => 'required|string|max:255',
                'email' => 'required|email|unique:orders,email',
                'phone' => 'nullable|string|max:255',
                'product_name' => 'required|string|max:255',
                'product_id' => 'required|string|max:255',
            ]);
    
            // If validation passes, create the order
            $order = $this->orders->create($validated);
    
            return response()->json($order, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
  
    public function show(string $id)
    {
        try {
            $order = $this->orders->find($id);
            if (!$order) {
                return response()->json(['error' => 'Order not found'], 404);
            }
            return response()->json($order, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
    public function update(Request $request, string $id)
    {
        try {
            $order = $this->orders->find($id);
            if (!$order) {
                return response()->json(['error' => 'Order not found'], 404);
            }
            $order->update($request->all());
            return response()->json($order, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
    public function destroy(string $id)
    {
        try {
            $order = $this->orders->find($id);
            if (!$order) {
                return response()->json(['error' => 'Order not found'], 404);
            }
            $order->delete();
            return response()->json(['message' => 'Order deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}