<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Categories;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomePageController extends Controller
{
    public function index()
    {
        $books = Books::get();
        $categories = Categories::get();

        return view('homepage', compact('books', 'categories'));
    }

    //CRUD
    public function create(Request $request): RedirectResponse
    {
        try {
            $storedata = [
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'category_id' => $request->input('category_id'),
                'stock' => $request->input('stock')
            ];

            $validate = Validator::make($storedata, [
                'title' => 'required|min:3',
                'author' => 'required',
                'category_id' => 'required',
                'stock' => 'required|numeric|min:0|not_in:0'
            ]);

            if ($validate->fails()) {
                // dd("disini");
                return redirect()->back()->withErrors($validate)->withInput();
            }

            Books::create($storedata);

            return redirect()->back()->withSuccess("buku telah ditambahkan");
        } catch (\Exception $e) {
            // dd("asdfasd");
            return redirect()->back()->withErrors('error', "gagal buat baru" . $e->getMessage());
        }
    }

    //CRUD
    public function update(Request $request): RedirectResponse
    {
        try {
            //code...

            $storedata = [
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'category_id' => $request->input('category_id'),
                'stock' => $request->input('stock')
            ];

            $validate = Validator::make($storedata, [
                'title' => 'required|min:3',
                'author' => 'required',
                'category_id' => 'required',
                'stock' => 'required|numeric|min:0|not_in:0'
            ]);

            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate)->withInput();
            }

            Books::where('id', $request->input('id'))->update($storedata);

            return redirect()->back()->withSuccess("buku telah diupdate");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('error', "gagal buat baru" . $e->getMessage());
        }
    }

    public function delete(Request $request): RedirectResponse
    {

        Books::where('id', $request->input('id'))->delete();

        return redirect()->back()->withSuccess("buku telah dihapus");
    }
}
