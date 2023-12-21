<?php

namespace App\Http\Controllers;


use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class OutCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Gate::allows('check')) {
        
            $customer = Customer::join('bills','bills.id_customer','=','customer.id')
            ->select('customer.*', 'bills.*')
            ->paginate(10, ['*'], 'page1')->withQueryString();
        // dd($customer);
        return view('admin.outcart', compact('customer'));
        } else {
            // Người dùng không có quyền admin
            return abort(403, 'Unauthorized');
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill_detail = BillDetail::join('products', 'products.id', '=', 'bill_detail.id_product')
            ->join('bills', 'bills.id','=','bill_detail.id_bill')
            ->where('bills.id','=', $id)
            ->select('bill_detail.*', 'products.name', 'bills.total','bills.note')
            ->get();
            // dd($bill_detail);
        return view('admin.outcart_show', compact('bill_detail'));
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
        return view('admin.outcart_edit', [
            'outcart' => Bill::firstWhere('id', $id)
        ]);
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
        $bill = Bill::find($id);
        $bill->trangthai = 1;
        $bill->save();
        return redirect()->route('outcarts.index')->with('success', 'Xác nhập đơn hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type_product = ProductType::find($id);
        $type_product->delete();
        return redirect()->route('outcarts.index')->with('success', 'Bạn đã xóa thành công');
    }
}
