<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class ProductTypeController extends Controller
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
            $type_products = ProductType::orderByDesc('id')->paginate(10);
            return view('admin.type_products', ['type_products' => $type_products]);
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
        //
        $this->validate($request,
            [
                //Kiểm tra giá trị rỗng
                'name' => 'required',
                'slug'=> 'required',
            ],
            [
                //Tùy chỉnh hiển thị thông báo
                'name.required' => 'Bạn chưa nhập ten!',
                'slug'=> 'Bạn chưa nhập slug',
                'description.required' => 'Bạn chưa nhập mô tả!',
            ]
        );
        $type_product = new ProductType();
        $type_product->name = $request->input('name');
        $type_product->description = $request->input('description');
        $type_product->slug = $request->input('slug');
        $type_product->save();
        return redirect()->back()->with('success', 'Bạn đã thêm thành công');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        return view('admin.type_products-edit', [
            'type_product' => ProductType::firstWhere('id', $id)
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
        //
        $this->validate($request,
            [
                //Kiểm tra giá trị rỗng
                'name' => 'required',
                'description' => 'required',
            ],
            [
                //Tùy chỉnh hiển thị thông báo
                'name.required' => 'Bạn chưa nhập ten!',
                'description.required' => 'Bạn chưa nhập mô tả!',
            ]
        );
        $type_product = ProductType::find($id);
        $type_product->name = $request->name;
        $type_product->description = $request->description;
        $type_product->slug = $request->slug;
        $type_product->save();

        return redirect()->back()->with('success', 'Cập nhập thành công');
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
        $type_product = ProductType::find($id);
        $type_product->delete();
        return redirect()->route('type_products.index')->with('success', 'Bạn đã xóa thành công');
    }
}
