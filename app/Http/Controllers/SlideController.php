<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\Gate;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('check')) {
            $slides = Slide::orderBy('id')->paginate(10);
            return view('admin.slide_list', ['slides' => $slides]);
        } else {
            // Người dùng không có quyền admin
            return abort(403, 'Unauthorized');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
            ],
            [

                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        foreach ($request->file('images') as $image) {
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('/build/images'), $imageName);
            Slide::create(['image' => $imageName]);
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
        return view('admin.slide_edit', [
            'slide' => Slide::firstWhere('id', $id)
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
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->back()->with('success', 'Bạn đã xóa thành công');
    }
}
