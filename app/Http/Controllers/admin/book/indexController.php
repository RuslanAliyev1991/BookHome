<?php

namespace App\Http\Controllers\admin\book;

use App\Models\Book;
use App\Helper\mHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publishing;

class indexController extends Controller
{
    public function index()
    {
        $data = Book::paginate(10);
        $description = explode(' ', $data[0]['description'], 5);
        $data[0]['description'] = $description[0] . ' ' . $description[1] . ' ' . $description[2] . ' ' . $description[3] . '...';
        return view('admin.book.index', ['data' => $data]);
    }

    public function create()
    {
        $publishing = Publishing::all();
        $author = Author::all();
        $category = Category::all();
        return view('admin.book.create', ['category' => $category, 'publishing' => $publishing, 'author' => $author]);
    }
    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image'] = mHelper::fileUpload('admin_css\assets\img\book', $request->image);
        $insert = Book::create($all);
        if ($insert) {
            return redirect()->back()->with('status', 'kitab daxil edildi');
        } else {
            return redirect()->back()->with('status', 'kitab daxil edilmedi');
        }
        //dd($all);
    }

    // edit or update:
    public function edit($id)
    {
        $publishing = Publishing::all();
        $author = Author::all();
        $category = Category::all();
        $count = Book::where('id', '=', $id)->count();
        if ($count != 0) {
            $data = Book::where('id', '=', $id)->get();
            return view('admin.book.edit', ['data' => $data, 'publishing' => $publishing, 'author' => $author, 'category' => $category]);
            //dd($data);
        } else {
            return redirect('/admin/book/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $count = Book::where('id', '=', $id)->count();
        if ($count != 0) {
            $all = $request->except('_token');
            if ($request->hasFile('image')) {
                $all['image'] = mHelper::fileUpdate('admin_css\assets\img\book', $id, $all['image']);
            }
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Book::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect('/admin/book/');
            } else {
                return redirect()->back()->with('status', 'kitab yenilenmedi');
            }
        } else {
            return redirect('/admin/book/');
        }
    }

    public function delete($id)
    {
        $count = Book::where('id', '=', $id)->count();
        if ($count != 0) {
            mHelper::fileDelete($id);
            $delete = Book::where('id', '=', $id)->delete();
            return redirect()->back();
        } else {
            return redirect('/admin/book/');
        }
    }
}
