<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Package;
class PackageController extends Controller
{
    public function index() {
    $packages = [
                    ['name' => 'TestName', 'type' => 'letter', 'length' => 50, 'width' => 50, 'height' => 50, 'weight' => 20]
                ];
               
            $name = request('name');
        
            return view('packages', [
                'packages' => $packages,
                'name' => $name
                ]);
    }
    public function show($id){
        return view('details', ['id' => $id]);
    }

}
