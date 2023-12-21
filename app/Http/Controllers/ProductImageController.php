<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class ProductImageController extends Controller
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
            $products = Product::all();
            $images = Images::orderByDesc('id')->paginate(8, ['*'], 'page1')->withQueryString();
            return view('admin.product_image', compact('products','images'));
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
          $request->validate([
            'product_id' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = '';

        $product = $request->product_id;

        foreach ($request->file('images') as $image) {
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('/build/images'), $imageName);
            Images::create(['path' => $imageName, 'product_id' =>$product]);
        }
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
        return view('admin.product_image-edit', [
            'images' => Images::firstWhere('id', $id)
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
                'image_file' => 'mimes:jpeg,jpg,png,gif|max:10000'
            ],
            [

                'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image.max' => 'Hình thẻ giới hạn dung lượng không quá 10MB',
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
        $images = Images::find($id);
        if ($name == '') {
            $name = $images->path;
        }
        $images->path = $name;
        $images->product_id = $request->product_id;
        $images->save();
        return redirect()->back()->with('success', 'Bạn đã thêm thành công');
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
        $image = Images::find($id);
        $image->delete();
        return redirect()->route('hinhanhs.index')->with('success', 'Bạn đã xóa thành công');
    }
}
