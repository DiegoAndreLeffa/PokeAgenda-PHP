<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\TypeService;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    private $typeService;

    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    public function index()
    {
        $types = $this->typeService->getAll();
        return response()->json($types);
    }

    public function store(Request $request)
    {
        $type = $this->typeService->create($request->all());
        return response()->json($type, 201);
    }

    public function show($id)
    {
        $type = $this->typeService->find($id);
        return response()->json($type);
    }

    public function update(Request $request, $id)
    {
        $type = $this->typeService->update($id, $request->all());
        return response()->json($type);
    }

    public function destroy($id)
    {
        $this->typeService->delete($id);
        return response()->json(null, 204);
    }
}
