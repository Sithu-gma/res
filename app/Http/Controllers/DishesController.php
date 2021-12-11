<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishCreateRequest;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes=Dish::all();       
        return view('kitchen.dish', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat= Category::all();
        return view('kitchen.dish_create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishCreateRequest $request)
    {
        $dish=new Dish();
        $dish->name=request()->name;
        $dish->category_id=request()->category_id;

        $imageName=date('YmdHis').".".request()->dish_image->getClientOriginalExtension();
        request()->dish_image->move(public_path('images'), $imageName);
        $dish->image=$imageName;
        $dish->save();

        return redirect('dish')->with('message','Dish Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {    
        $cat= Category::all();
        return view('kitchen.dish_edit',compact('dish','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,dish $dish)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);
        $dish->name=$request->name;
        $dish->category_id=$request->category_id;
        if($request->dish_image){
            $imageName=date('YmdHis').".".request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('images'), $imageName);
            $dish->image=$imageName;
        }
        $dish->save();
        return redirect('dish')->with('message','Dish Updated Successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect('dish')->with('message','Dish removed Successfully');
    }

    public function order(){
        $rawStatus=config('res.order_status');
        $status=array_flip($rawStatus);        
        $orders=Order::whereIn('status',[1,2])->get();
        return view('kitchen.order',compact('orders','status'));
    }
    public function approved(Order $order){
        $order->status=config('res.order_status.processing');
        $order->save();
        return redirect('order')->with('message','Order Approved!!!!');
    }
    public function cancel(Order $order){
        $order->status=config('res.order_status.cancel');
        $order->save();
        return redirect('order')->with('message','Order Canceled!!!!');
    }
    public function ready(Order $order){
        $order->status=config('res.order_status.ready');
        $order->save();
        return redirect('order')->with('message','Order ready!');
    }
}