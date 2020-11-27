<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Incident;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IncidentReportingController extends Controller
{
    //
    /**
     * Get all products
     *
     * @return Illuminate\Contracts\View\Factory
     */
    public function getProducts() {
        $products = Product::all();
        Session::put('products', $products);
        return view('form')->with('products', $products);
    }

    /**
     * Report incident
     *
     * @param Request $request
     * @return Illuminate\Contracts\View\Factory
     */
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
                $product = Product::findOrFail($input['product_name']);
            } catch (Exception $e) {
                $error = [
                    'message' => $e->getMessage()
                ];
                $products = Session::get('products');
                return view('form')->with('form_error', $error['message'])->with('products', $products);
            }
            $helpers =  new Helpers();
            $data = [
                'product_name' => $product->product_name,
                'product_version' => $incident->product_version,
                'date' => $incident->date_created,
                'description' => $incident->description,
                'lessons_learned' =>$incident->lessons_learned,
                'assurance' => $incident->assurance

            ];
            
            try {
                $mail = $helpers->generatePDF($data);
                $filename = Session::get('filename');
                unlink(base_path('reports/' . $filename . '.pdf'));
            } catch (Exception $e) {
                $filename = Session::get('filename');
                unlink(base_path('reports/' . $filename . '.pdf'));
                $error = [
                    'status' => 'Error',
                    'status_code' => 400,
                    'message' => $e->getMessage()
                ];
                $incident->status = false;
                $incident->save();
                return view('success')->with('mail_errors', array($error['message']));
            }
            if (is_array($mail)) {
                $incident->status = false;
                $incident->save();
                return view('success')->with('mail_errors', $mail);
            } else {
                return view('success');
            }        
        } else {
            $error['errors'] = $validated->messages();
            $products = Session::get('products');
            $validation_errors = [];
            $errors_obj = json_decode($error['errors']);
            $errors_array = json_decode(json_encode($errors_obj), true);
            foreach ($errors_array as $error) {
                $validation_errors = array_merge($validation_errors, $error);
            }
            return view('form')->with('validation_errors', $validation_errors)->with('products', $products);
        }
    }

    /**
     * Validate input
     *
     * @param array $data
     * @return Illuminate\Support\Facades\Validator
     */
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
