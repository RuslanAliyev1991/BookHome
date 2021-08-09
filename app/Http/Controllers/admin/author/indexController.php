<?php

namespace App\Http\Controllers\admin\author;

use App\Models\Author;
use App\Helper\mHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index()
    {
        $data['data'] = Author::paginate(10);
        return view('admin.author.index', $data);
    }

    public function create()
    {
        return view('admin.author.create');
    }
    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image'] = mHelper::fileUpload('admin_css\assets\img\author', $request->image);
        $insert = Author::create($all);
        if ($insert) {
            return redirect()->back()->with('status', 'yazici daxil edildi');
        } else {
            return redirect()->back()->with('status', 'yazici daxil edilmedi');
        }
    }

    // edit or update:
    public function edit($id)
    {
        $count = Author::where('id', '=', $id)->count();
        if ($count != 0) {
            $data['data'] = Author::where('id', '=', $id)->get();
            return view('admin.author.edit', $data);
        } else {
            return redirect('/admin/author/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $count = Author::where('id', '=', $id)->count();
        if ($count != 0) {
            $all = $request->except('_token');
            if ($request->hasFile('image')) {
                $all['image'] = mHelper::fileUpdate('admin_css\assets\img\author', $id, $all['image']);
            }
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Author::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect('/admin/author/')->with('status', 'yazici yenilendi');
            } else {
                return redirect()->back()->with('status', 'yazici yenilenmedi');
            }
        } else {
            return redirect('/admin/author/');
        }
    }

    public function delete($id)
    {
        $count = Author::where('id', '=', $id)->count();
        if ($count != 0) {
            mHelper::fileDelete($id);
            $delete = Author::where('id', '=', $id)->delete();
            return redirect()->back();
        } else {
            return redirect('/admin/author/');
        }
    }
}
