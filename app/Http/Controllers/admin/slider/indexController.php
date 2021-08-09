<?php

namespace App\Http\Controllers\admin\slider;

use App\Models\Slider;
use App\Helper\mHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index()
    {
        $data['data'] = Slider::paginate(10);
        return view('admin.slider.index', $data);
    }

    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['image'] = mHelper::fileUpload('admin_css\assets\img\slider', $request->image);
        $insert = Slider::create($all);
        if ($insert) {
            return redirect()->back()->with('status', 'slider daxil edildi');
        } else {
            return redirect()->back()->with('status', 'slider daxil edilmedi');
        }
    }

    // edit or update:
    public function edit($id)
    {
        $count = Slider::where('id', '=', $id)->count();
        if ($count != 0) {
            $data['data'] = Slider::where('id', '=', $id)->get();
            return view('admin.slider.edit', $data);
        } else {
            return redirect('/admin/slider/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $count = Slider::where('id', '=', $id)->count();
        if ($count != 0) {
            $all = $request->except('_token');
            if ($request->hasFile('image')) {
                $all['image'] = mHelper::fileUpdate('admin_css\assets\img\slider', $id, $all['image']);
            }
            $update = Slider::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect('/admin/slider/')->with('status', 'slider yenilendi');
            } else {
                return redirect()->back()->with('status', 'slider yenilenmedi');
            }
        } else {
            return redirect('/admin/slider/');
        }
    }

    public function delete($id)
    {
        $count = Slider::where('id', '=', $id)->count();
        if ($count != 0) {
            mHelper::fileDelete($id);
            $delete = Slider::where('id', '=', $id)->delete();
            return redirect()->back();
        } else {
            return redirect('/admin/slider/');
        }
    }
}
