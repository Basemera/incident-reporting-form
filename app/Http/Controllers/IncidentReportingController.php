<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IncidentReportingController extends Controller
{
    //
    public function getProducts() {
        $products = Product::all();
        // $versions = $products->versions;
        return view('form')->with('products', $products);
    }

    public function reportIncident(Request $request) {
        return "I am here";
    }
}
