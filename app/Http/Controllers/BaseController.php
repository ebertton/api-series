<?php

namespace App\Http\Controllers;
use App\Models\Serie;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
abstract class BaseController {

    protected String $class;

    public function index(){
        return $this->class::all();
    }

    public function store(Request $request)
    {
        return response()->json($this->class::create(['name' => $request->name]), 201);
    }

    public function show(int $id)
    {
        $resource = $this->class::find($id);
        if (is_null($resource)) {
            return response()->json('', 204);
        }
        return response()->json($resource);
    }

    public function update(int $id, Request $request)
    {
        $resource = $this->class::find($id);
        if (is_null($resource)) {
            return response()->json(['error' => 'Resource not found'], 404);
        }
        $resource->fill($request->all());
        $resource->save();
        return response()->json($resource);
    }

    public function destroy(int $id)
    {
        $numberResourcesRemoved = $this->class::destroy($id);
        if ($numberResourcesRemoved === 0){
            return response()->json(['error' => 'Ressource not found'], 404);
        }
        return response()->json('', 204);
    }
}
