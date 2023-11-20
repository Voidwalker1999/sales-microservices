<?php

namespace App\Http\Controllers\Api;

use App\Models\Sales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::all();
        if($sales->count() > 0){
            return response()->json([
                'status' => 200,
                'sales' => $sales
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No sales found'
            ], 404);
        }
    }

    public function store()
    {
        $validator = Validator::make($request->all(), [
            'reference_id' => 'required|integer|max:191',
            'product_name' => 'required|string|max:191',
            'quantity' => 'required|integer|max:191',
            'price' => 'required|integer|max:191',
            'ordered_datetime' => 'required|string|max:191',
            'payment_method' => 'required|string|max:191',
            'order_status' => 'required|string|max:191',
            'dispatch_datetime' => 'required|string|max:191',
            'dispatch_address' => 'required|string|max:191',
            'user_id' => 'required|integer|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }else{
            $sales = Sales::create([
                'reference_id' => $request->reference_id,
                'product_name' => $request->product_name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'ordered_datetime' => $request->ordered_datetime,
                'payment_method' => $request->payment_method,
                'order_status' => $request->order_status,
                'dispatch_datetime' => $request->dispatch_datetime,
                'dispatch_address' => $request->dispatch_address,
                'user_id' => $request->user_id,
            ]);

            if($sales){
                return response()->json([
                    'status' => 200,
                    'message' => 'Sales created successfully',
                    'sales' => $sales
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Internal server error'
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $sales = Sales::find($id);
        if($sales){
            return response()->json([
                'status' => 200,
                'sales' => $sales
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Sales not found'
            ], 404);
        }
    }

    public function edit($id)
    {
        $sales = Sales::find($id);
        if($sales){
            return response()->json([
                'status' => 200,
                'sales' => $sales
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Sales not found'
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'reference_id' => 'required|integer|max:191',
            'product_name' => 'required|string|max:191',
            'quantity' => 'required|integer|max:191',
            'price' => 'required|integer|max:191',
            'ordered_datetime' => 'required|string|max:191',
            'payment_method' => 'required|string|max:191',
            'order_status' => 'required|string|max:191',
            'dispatch_datetime' => 'required|string|max:191',
            'dispatch_address' => 'required|string|max:191',
            'user_id' => 'required|integer|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }else{
            $sales = Sales::find($id);
            if(!$sales){
                return response()->json([
                    'status' => 404,
                    'message' => 'Sales not found'
                ], 404);
            }else{
                $sales->update([
                    'reference_id' => $request->reference_id,
                    'product_name' => $request->product_name,
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                    'ordered_datetime' => $request->ordered_datetime,
                    'payment_method' => $request->payment_method,
                    'order_status' => $request->order_status,
                    'dispatch_datetime' => $request->dispatch_datetime,
                    'dispatch_address' => $request->dispatch_address,
                    'user_id' => $request->user_id,
                ]);
    
                if($sales){
                    return response()->json([
                        'status' => 200,
                        'message' => 'Sales updated successfully',
                        'sales' => $sales
                    ], 200);
                }else{
                    return response()->json([
                        'status' => 500,
                        'message' => 'Internal server error'
                    ], 500);
                }
            }
        }
    }

    public function destroy($id)
    {
        $sales = Sales::find($id);
        if(!$sales){
            return response()->json([
                'status' => 404,
                'message' => 'Sales not found'
            ], 404);
        }else{
            $sales->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Sales deleted successfully'
            ], 200);
        }
    }
}
