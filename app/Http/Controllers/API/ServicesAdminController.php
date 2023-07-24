<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesAdminController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 0,
            'data' => Service::all(),
        ]);
    }

    public function view(int $id)
    {
        return response()->json([
            'status' => 0,
            'data' => Service::findOrFail($id),
        ]);
    }

    public function create(Request $request)
    {
        Service::create($request->all());

        return response()->json([
            'status' => 0,
        ]);
    }
    public function edit($id, Request $request)
    {
        $service = Service::findOrFail($id);
        $data = $request->except(['_token']);
        $service->update($data);

        return response()->json([
            'status' => 200,
        ]);
    }
    public function delete(int $id)
    {
        
        $service = Service::findOrFail($id);
        $service->designs()->detach();
        $service->delete();

        return response()->json([
            'status' => 0,
        ]);
    }
}
