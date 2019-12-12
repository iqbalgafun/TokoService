<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
    	$service = Service::all();

    	$data=$service;
    	return $data;
    }

    public function show($id_service)
    {
    	$service = Service::find($id_service);
    	
    	if(!$service){
    		return response()->json([
    			'success' => false,
    			'message' => 'service with id ' . $id_service . ' not found'
    		], 400);
    	}

    	return response()->json([
    		'success' => true,
    		'data' => $service->toArray()
    	], 400);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_service' => 'required',
            'service_name' => 'required',
        ]);
    }

    public function create(Request $request)
    {
        $service = new Service();
        $service->id_service = $request->id_service;
        $service->service_name = $request->service_name;

        $service->save();

        return response()->json([
                'success' => true,
                'data' => $service->toArray()
            ]);
    }

    public function update(Request $request, $id_service)
    {
        $service = Service::find($id_service);

        $service->id_service = $request->id_service;
        $service->service_name = $request->service_name;
 
        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'service with id ' . $id_service . ' not found'
            ], 400);
        }
 
        $updated = $service->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'service could not be updated'
            ], 500);
    }

    public function destroy($id_service)
    {
        $service = Service::find($id_service);
 
        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'service with id ' . $id_service . ' not found'
            ], 400);
        }
 
        if ($service->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'service could not be deleted'
            ], 500);
        }
    }
}
