<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Package;


class PackageController extends Controller
{
    public function index() {

    $packages = Package::latest()->get();

    return view('packages.index', [
        'packages' => $packages,
        
        ]);
    }
    public function show($id){
        $package = Package::findOrFail($id);

        return view('packages.show', [
            'package' => $package,
        ]);

    }
    public function create(){
        return view('packages.create'); 

    }
    public function store(){
        $package = new Package();

        $package->name = request('name');
        $package->type = request('type');
        $package->weight = request('weight');
        $package->length = request('length');
        $package->width = request('width');
        $package->height = request('height');
        $package->price = request('price');

        $package->save();

        return redirect('/packages')->with('mssg', 'Your order has been placed. Your order number is: '.$package->id);
    }
    public function destroy($id) {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect('/packages');

    }
}
