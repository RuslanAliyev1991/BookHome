<?php

namespace App\Http\Controllers\admin\publishing;

use App\Helper\mHelper;
use App\Models\Publishing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    // list:
    public function index()
    {
        $data['data'] = Publishing::paginate(10);
        return view('admin.publishing.index', $data);
    }

    // create:
    public function create()
    {
        return view('admin.publishing.create');
    }
    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $insert = Publishing::create($all);
        if ($insert) {
            return redirect()->back()->with('status', 'Publishing evi daxil edildi');
        } else {
            return redirect()->back()->with('status', 'Publishing evi daxil edilmedi');
        }
    }

    // edit or update:
    public function edit($id)
    {
        $count = Publishing::where('id', '=', $id)->count();
        if ($count != 0) {
            $data['data'] = Publishing::where('id', '=', $id)->get();
            return view('admin.publishing.edit', $data);
        } else {
            return redirect('/admin/publishing/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $count = Publishing::where('id', '=', $id)->count();
        if ($count != 0) {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Publishing::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'Publishing evi yenilendi');
            } else {
                return redirect()->back()->with('status', 'Publishing evi yenilenmedi');
            }
        } else {
            return redirect('/admin/publishing/');
        }
    }

    public function delete($id)
    {
        $count = Publishing::where('id', '=', $id)->count();
        if ($count != 0) {
            $delete = Publishing::where('id', '=', $id)->delete();
            return redirect()->back();
        } else {
            return redirect('/admin/publishing/');
        }
    }
}
