<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    public function index()
    {
        $shops = Shop::all();
        return view('admin.list',compact('shops'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(CreateRequest  $request)
    {
        $shop = new Shop();
        $shop->code =$request->code;
        $shop->shop_name = $request->shop_name;
        $shop->phone = $request->phone;
        $shop->email = $request->email;
        $shop->address = $request->address;
        $shop->manager = $request->manager;
        $shop->status = $request->status;

        $shop->save();
        return redirect()->route('shops.index');
    }

    public function edit($id)
    {
        $shop =Shop::findOrFail($id);
        return view('admin.edit',compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);

        $shop->shop_name = $request->shop_name;
        $shop->phone = $request->phone;
        $shop->email = $request->email;
        $shop->address = $request->address;
        $shop->manager = $request->manager;
        $shop->status = $request->status;

        $shop->save();
        return redirect()->route('shops.index');
    }

    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->delete();
        return redirect()->route('shops.index');
    }

    public function search(Request $request)
    {
        $shops = DB::table('shops')->where('shop_name', 'like', "%$request->search%")->paginate(3);
        return view('admin.list', compact('shops'));

    }
}
