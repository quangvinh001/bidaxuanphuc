<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        if (Gate::allows('check')) {
            $products = Product::join('type_products', 'type_products.id', '=', 'products.id_type')
            ->select('products.*', 'type_products.name as name_type_product')
            ->orderBy('id', 'asc')
            ->paginate(10, ['*'], 'page1')->withQueryString();
        // dd($products);
        return view('admin.product_list', compact('products'));
        } else {
            // Người dùng không có quyền admin
            return abort(403, 'Unauthorized');
        }
    }


    public function create()
    {
        $products = Product::join('type_products', 'products.id_type', '=', 'type_products.id')
        ->select('products.*', 'type_products.name as name_type_product', 'type_products.id as type_id')
        ->get();
        $type = ProductType::all();
        return view('admin.product_add', compact('products', 'type'));
    }

    public function store(Request $request)
    {
        //
        $this->validate($request,
            [
                //Kiểm tra giá trị rỗng
                'name' => 'required',
                'description' => 'required',
                'unit_price' => 'required',
                'type_id'=> 'required',
                'unit'=> 'required',
                'description'=> 'required',
                'image_file' => 'mimes:jpeg,jpg,png,gif|max:10000'
            ],
            [
                'image_file.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image_file.max' => 'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'name.required' => 'Bạn chưa nhập mô tả',
                'type_id'=> 'Bạn chưa chọn danh mục sản phẩm',
                'unit'=> ' Bạn nhập số lượng sản phẩm',
                'description.required' => 'Bạn chưa nhập mô tả',
                'unit_price.required' => 'Bạn chưa nhập giá',
                'promotion_price.required' => 'Bạn chưa nhập giá khuyến mãi',
            ]
        );
        //kiểm tra file tồn tại
        $name = '';
        if ($request->hasfile('image_file')) {
            $file = $request->file('image_file');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/build/images'); //project\public\images, //public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/cars
        }
        $product = new Product();
        $product->name = $request->name;
        $product->id_type = $request->type_id;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->new = $request->new;
        $product->unit = $request->unit;
        $product->image = $name;
        $product->save();
        // dd($product);
        return redirect()->route('products.index')->with('success','Bạn đã thêm thành công');
    }



    public function show($id)
    {
        //
        $product = Product::find($id); //trước đó phải khai báo namespace tới model Product
        return view('admin.product-detail', compact('products'));
    }

    public function edit($id)
    {
        //
        return view('admin.product_edit', [
            'product' => Product::firstWhere('id', $id)
        ]);
    }


    public function update(Request $request, $id)
    {
        //
        $name = '';
        if ($request->hasfile('image')) {
            $this->validate($request, [

                'name' => 'required',
                'description' => 'required',
                'unit_price' => 'required',
                'promotion_price' => 'required',
            ], [
                'image.mimes' => 'Chỉ chấp nhận file hình ảnh',
                'image.max' => 'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'name.required' => 'Bạn chưa nhập mô tả',
                'description.required' => 'Bạn chưa nhập mô tả',
                'unit_price.required' => 'Bạn chưa nhập giá',
                'promotion_price.required' => 'Bạn chưa nhập giá khuyến mãi',
            ]);
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('source/image/product'); //project\public\car, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'promotion_price' => 'required',
            'unit' => 'required',
            'new' => 'required',

        ], [
            'name.required' => 'Bạn chưa nhập mô tả',
            'description.required' => 'Bạn chưa nhập mô tả',
            'unit_price.required' => 'Bạn chưa nhập giá',
            'promotion_price.required' => 'Bạn chưa nhập giá khuyến mãi',
            'unit.required' => 'Bạn chưa nhập unit',
            'new.required' => 'Bạn chưa nhập new',

        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        if ($name == '') {
            $name = $product->image;
        }
        $product->image = $name;
        $product->save();

        return redirect()->back()->with('success', 'Bạn đã cập nhật thành công');

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
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Bạn đã xóa thành công');
    }
}
