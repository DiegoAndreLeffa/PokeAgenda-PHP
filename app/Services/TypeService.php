<?php

namespace App\Services;

use App\Models\Type;

class TypeService
{
    public function getAll()
    {
        return Type::all();
    }

    public function create(array $data)
    {
        return Type::create($data);
    }

    public function find($id)
    {
        return Type::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $type = Type::findOrFail($id);
        $type->update($data);
        return $type;
    }

    public function delete($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
    }
}
