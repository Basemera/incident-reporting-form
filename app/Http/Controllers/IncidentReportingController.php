<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncidentReportingController extends Controller
{
    //
    public function getProducts() {
        $products = Product::all();
        // $versions = $products->versions;
        return view('form')->with('products', $products);
    }

    public function reportIncident(Request $request) {
        $input = $request->all();
        $validated = $this->validateInput($input);
        if ($validated->passes()) {
            try {
                $incident = Incident::create(
                    [
                        'product_id' => $input['product_name'],
                        'product_version' => isset($input['product_version']) ? $input['product_version'] : 1,
                        'date_created' => Carbon::now(),
                        'description' => $input['incident_description'],
                        'lessons_learned' => $input['incident_lessons_learned'],
                        'assurance' => $input['assurance'],
                    ]
                    );
            } catch (Exception $e) {
                $error = [
                    'status' => 'Error',
                    'status_code' => 400,
                    'message' => $e->getMessage()
                ];
                return response()->json($error, 400);
            }
            return response()->json($incident, 200);
        
        } else {
            $error['status'] = 'Error';
            $error['status_code'] = 400;
            $error['message'] = 'The following fields are required.';
            $error['errors'] = $validated->messages();
            $response = $error;
            return response()->json($response, 400);
        }
    }

    protected function validateInput($data) {
        return Validator::make($data,[
            'product_name'=> ['string', 'required'],
            'product_version'=> ['integer'],
            'incident_description'=> ['string', 'required'],
            'incident_lessons_learned'=> ['string', 'required'],
            'assurance'=> ['string', 'required']
        ]);
    }
}
