<?php

namespace App\Http\Controllers;

use Stripe;
use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('checkout')->with([
            'discount'=>$this->getName()->get('discount'),
            'newSubtotal'=>$this->getName()->get('newSubtotal'),
            'newTax'=>$this->getName()->get('newTax'),
            'newTotal'=>$this->getName()->get('newTotal')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'city'=>'required',
            'province'=>'required',
            'postalcode'=>'required',
            'phone'=>'required',
            'name_on_card'=>'required',
        ]);
        $contents = Cart::content()->map(function($item){
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();
        try{
            $charge = Stripe::charges()->create([
                'amount'=>$this->getName()->get('newTotal'),
                'currency'=>'USD',
                'source'=>$request->stripeToken,
                'description'=>'Order',
                'receipt_email'=>$request->email,
                'metadata'=>[
                    'contents'=>$contents,
                    'quantity'=>Cart::instance('default')->count(),
                    'discount'=>collect(session()->get('coupon'))->toJson(),
                ],
            ]);
                Cart::instance('default')->destroy();
                session()->forget('coupon');
    return redirect()->route('thankyou.thanks')->with('success_message', "Thank you for Buying");
        }catch(Exception $e){
            return back()->with('Error!'. $e->getMessage());
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function thanks()
    {
        if(!session()->has('success_message')){
            return redirect('/');
        }
        return view('thankyou');
    }

    private function getName()
    {
        $tax = config('cart.tax') / 100;
            $discount = session()->get('coupon')['discount'] ?? 0;
            $newSubtotal = (Cart::subtotal() - $discount/100);
            $newTax = $newSubtotal * $tax;
            $newTotal = $newSubtotal * (1+$tax);


        return collect([
            'tax'=>$tax,
            'discount'=>$discount,
            'newSubtotal'=>$newSubtotal,
            'newTax'=>$newTax,
            'newTotal'=>$newTotal
        ]);
    }
}
