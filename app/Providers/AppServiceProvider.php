<?php

namespace App\Providers;

use App\Models\Slide;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('check', function (User $user) {
            return $user->role;
        });
        $stt = 1;
        view()->share('stt', $stt);
        $banners = Slide::orderBy('image', 'desc')->get();
        // Share banners with all view
        view()->share('banners', $banners);

        View::share('currentDate', Carbon::now('Asia/Ho_Chi_Minh'));
        // Lấy danh sách danh mục
        $type_product = ProductType::all();

        // Thêm trường 'slug' vào mỗi danh mục trực tiếp trong mảng
        $categoriesWithSlug = $type_product->map(function ($category) {
            $category->slug = Str::slug($category->name);
            return $category;
        });

        // Chia sẻ danh sách danh mục với tất cả các view
        View::share('type_products', $categoriesWithSlug);

        Paginator::useBootstrapFour();

        view()->composer('layout_home.header', function ($view) {
            $loai_sp = ProductType::all();
            $view->with(['loai_sp' => $loai_sp,]);

        });
        view()->composer(['layout_home.header', 'checkout'], function ($view) {
            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'), 'product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
            }
        });
    }

}
