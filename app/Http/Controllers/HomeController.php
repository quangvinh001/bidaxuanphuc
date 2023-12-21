<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Slide;
use App\Models\User;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slide = Slide::orderBy('image', 'desc')->first();
        $categories = ProductType::with('products')->paginate(10, ['*'], 'page1')->withQueryString();
        $new_products = Product::where('new','=',1)->paginate(8,['*'],'page1')->withQueryString();
        // dd($product);
        return view('trangchu', compact('categories', 'slide', 'new_products'));
    }

    public function gioithieu()
    {
        $slide = Slide::orderBy('image', 'desc')->first();
        return view('gioithieu',compact('slide'));
    }
    public function dichvu()
    {
        $slide = Slide::orderBy('image', 'desc')->first();
        return view('dichvu',compact('slide'));
    }
    public function lienhe()
    {
        $slide = Slide::orderBy('image', 'desc')->first();
        return view('lienhe',compact('slide'));
    }
    public function guimail(Request $request)
    {
        $mail = 'pangbin09@gmail.com';
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $messages = $request->input('message');
        Mail::to($mail)->send(new MyTestMail($name, $email, $phone, $messages));
        return redirect()->route('lienhe')->with('success','Gửi Mail thành công, Chúng tôi sẽ trả lời bạn sớm nhất !!!');
    }
    public function sanpham()
    {
        $slide = Slide::orderBy('image', 'desc')->first();
        $products = Product::orderBy('id_type', 'desc')->paginate(10, ['*'], 'page1')->withQueryString();
        return view('sanpham', compact('products','slide'));
    }
    public function danhmuc($slug)
    {
        $slide = Slide::orderBy('image', 'desc')->first();
        $category = ProductType::where('slug', $slug)->firstOrFail();
        $products = Product::where('id_type', $category->id)->paginate(10, ['*'], 'page1')->withQueryString();
        return view('danhmuc', compact('products', 'category', 'slide'));
    }

    public function show(string $id)
    {
        $slide = Slide::orderBy('image', 'desc')->first();
        $product = Product::findOrFail($id);
        $images = Images::where('product_id', $id)->paginate(4, ['*'], 'page1')->withQueryString();
        $related = Product::where('id_type',$product->id_type)->where('id','!=',$product->id)->paginate(10, ['*'], 'page1')->withQueryString();
        return view('chitietsanpham', compact('product', 'images', 'slide','related'));
    }
    public function getAddToCart(Request $req, $id)
    {
        $product = Product::find($id);
        $qti = $req->soluong;
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id, $qti);
        $req->Session()->put('cart', $cart);
        return redirect()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!')->back();
    }
    public function postAddToCart(Request $req, $id)
    {
        $product = Product::find($id);
        // dd($req->all());
        $qti = $req->soluong;
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id, $qti);
        $req->Session()->put('cart', $cart);
        return redirect()->back();
    }
    public function getDelCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();

    }
    public function getCheckout()
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('checkout', ['product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
        } else {
            return view('checkout');
        }

    }
    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');
        $customer = new Customer();
        $customer->name = $req->full_name;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->note;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        $items = $cart->items;
        foreach ($items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price'] / $value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');

        return redirect()->back()->with('thongbao', 'Đặt hàng thành công ');

    }
}
