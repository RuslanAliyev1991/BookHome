<?php

namespace App\Http\Controllers\admin\category;

use App\Helper\mHelper;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    // list:
    public function index()
    {
        $data['data'] = Category::paginate(10);
        return view('admin.Category.index', $data);
    }

    // create:
    public function create()
    {
        return view('admin.Category.create');
    }
    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $insert = Category::create($all);
        if ($insert) {
            return redirect()->back()->with('status', 'Kategoriya daxil edildi');
        } else {
            return redirect()->back()->with('status', 'Kategoriya daxil edilmedi');
        }
    }

    // edit or update:
    public function edit($id)
    {
        $count = Category::where('id', '=', $id)->count();
        if ($count != 0) {
            $data['data'] = Category::where('id', '=', $id)->get();
            return view('admin.Category.edit', $data);
        } else {
            return redirect('/admin/Category/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $count = Category::where('id', '=', $id)->count();
        if ($count != 0) {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Category::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'Kategoriya yenilendi');
            } else {
                return redirect()->back()->with('status', 'Kategoriya yenilenmedi');
            }
        } else {
            return redirect('/admin/Category/');
        }
    }

    public function delete($id)
    {
        $count = Category::where('id', '=', $id)->count();
        if ($count != 0) {
            $delete = Category::where('id', '=', $id)->delete();
            return redirect()->back();
        } else {
            return redirect('/admin/Category/');
        }
    }
}
