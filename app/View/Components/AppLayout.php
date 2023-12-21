<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        if (Gate::allows('check')) {
            // Người dùng có quyền admin
            return view('layouts.app');
        } else {
            // Người dùng không có quyền admin
            return view('trangchu');
        }
        
    }
}
