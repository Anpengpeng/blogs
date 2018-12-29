<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenApi\Serializer;

class SwaggerController extends Controller
{

    public function getJSON()
    {
        $openapi = \OpenApi\scan(app_path('Http/Controllers'));
        header('Content-Type: application/text-json');
        $t = $openapi->toJson();
//        return response()->json($swagger, 200);


        $serializer = new Serializer();
        $openapi = $serializer->deserialize($t, 'OpenApi\Annotations\OpenApi');
        echo $openapi->toJson();
    }

    public function getView()
    {
        return view('vendor.l5-swagger.index');
    }
}
