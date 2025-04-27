<?php

use Illuminate\Http\Request;
use App\Models\LandingPage;
use App\Models\Item;
use App\Models\FabricCategory;

use App\Models\Page;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api'); 

Route::get('/send_email_quote', function (Request $request) {

    $data = $request->toArray();
    $text = "";

    foreach ($data as $key => $content) {
        if($key == 'to') continue;
        $text.= ucfirst($key) . " : {$content} \n"; 

    }

    \Mail::raw($text, function ($message) use($data) {

        $message->to($data['to'])
            ->from($data['email'], $data['name'])
            ->subject('Get a free quote');
    });


    //echo "<pre>";print_r($data);exit;

    return ['response' => 'success'];
});

Route::get('/home', function () {
    $data = page_fields();
    //return $data;

    return response()->json($data)
        ->header("Access-Control-Allow-Origin", "*")
        ->header("Access-Control-Allow-Methods", "GET, POST, OPTIONS")
        ->header("Access-Control-Allow-Headers", "Content-Type");
});

Route::get('/privacy-policy', function () {
    $data = page_fields();

    return $data;
});

Route::get('/terms-of-use', function () {
    $data = page_fields();

    return $data;
});

Route::get('/pages/{url_title}', function ($url_title) {
    $row = Page::where('url_title', $url_title)->first();
    $row = $row ? $row->toArray() : array();

    return $row;
});

// MGL


Route::get('/items', function () {
    $fabric_category_list = FabricCategory::pluck('name', 'id');
    $fabric_category_list = $fabric_category_list ? $fabric_category_list->toArray() : array();
    //echo "<pre>";print_r($fabric_category_list);exit;
    $items = Item::orderBy('id','asc')->get();

    foreach ($items as $key => $item) {
        $items[$key]["category"] = !empty($fabric_category_list[$item['fabric_category_id']]) ? $fabric_category_list[$item['fabric_category_id']] : "";
    }

    $data = $items ? $items->toArray() : array();
    $total = count($data);

    if(!empty($_GET['limit'])){
        $limit = (int) $_GET['limit'];
        $data = array_slice($data, 0, $limit);
    }

    $lib_password = LandingPage::first()->swatch_library_password;
    $lib_password = hash('sha256', $lib_password);

    return response()->json(["total" => $total, "data" => $data, "lib_p" => $lib_password])
        ->header("Access-Control-Allow-Origin", "*")
        ->header("Access-Control-Allow-Methods", "GET, POST, OPTIONS")
        ->header("Access-Control-Allow-Headers", "Content-Type");
});

Route::post('/send_quotation', function (Request $request) {
    try {
        // Create new quotation record
        $quotation = new \App\Models\Quotation();
        
        // Set the basic fields
        $quotation->company = $request->input('company');
        $quotation->name = $request->input('name');
        $quotation->mobile = $request->input('mobile');
        $quotation->email = $request->input('email');
        
        // Format all data into a message
        $message = "New Quote Request Details:\n\n";
        $message .= "Company: " . $request->input('company') . "\n";
        $message .= "Name: " . $request->input('name') . "\n";
        $message .= "Mobile: " . $request->input('mobile') . "\n";
        $message .= "Email: " . $request->input('email') . "\n";
        
        // Add fabric category if available
        if ($request->has('fabric_category')) {
            $message .= "Fabric Category: " . $request->input('fabric_category') . "\n";
        }
        
        // Add requirement if available
        if ($request->has('requirement')) {
            $message .= "Requirement: " . $request->input('requirement') . "\n";
        }
        
        // Add subcategory if available
        if ($request->has('subcategory')) {
            $message .= "Subcategory: " . $request->input('subcategory') . "\n";
        }
        
        // Add quantity required if available
        if ($request->has('quantity_required')) {
            $message .= "Quantity Required: " . $request->input('quantity_required') . "\n";
        }
        
        // Add sender email if available
        if ($request->has('sender_email')) {
            $message .= "Sender Email: " . $request->input('sender_email') . "\n";
        }
        
        // Add sender mobile if available
        if ($request->has('sender_mobile')) {
            $message .= "Sender Mobile: " . $request->input('sender_mobile') . "\n";
        }
        
        $quotation->message = $message;

        if ($request->has('message')) {
            $quotation->message = $request->input('message');
        }
        
        // Save the quotation
        $quotation->save();

        // Send email to the specified sender email
        $senderEmail = $request->input('sender_email');
        $senderEmail = empty($senderEmail) ? "info@maasgloballtd.com" : $senderEmail;
        if ($senderEmail) {
            \Mail::raw($message, function($mail) use ($senderEmail, $request) {
                $mail->to($senderEmail)
                    ->from($request->input('email'), $request->input('name'))
                    ->subject('New Quote Request from ' . $request->input('company'));
            });
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Quotation saved successfully'
        ])->header('Access-Control-Allow-Origin', '*')
          ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
          ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error saving quotation: ' . $e->getMessage()
        ], 500)->header('Access-Control-Allow-Origin', '*')
          ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
          ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
});

// Add OPTIONS route for CORS preflight requests
Route::options('/send_quotation', function () {
    return response()->json()
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
});