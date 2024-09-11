<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\Repositories\CursoRepository;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }
    public function index()
    {
        $data = $this->repository->selectAllWith(['role']);
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $objRole = (new RoleRepository())->findById($request->role_id);
        if (isset($objRole)) {
            $obj = new User();
            $obj->name = $request->name;
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password);
            $obj->role()->associate($objRole);
            $this->repository->save($obj);
            return "<h1>Store - OK!</h1>";
        }
        return "<h1>Store - Not found Role!</h1>";
    }

    public function show(string $id)
    {
        $data = $this->repository->findById($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = $this->repository->findById($id);
        $objRole = (new RoleRepository())->findById($request->role_id);

        if (isset($obj) && isset($objRole)) {
            $obj->name = $request->name;
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password);
            $obj->role()->associate($objRole);
            $this->repository->save($obj);
            return "<h1>Update - OK!</h1>";
        }

        return "<h1>Upate - Not found Role or User!</h1>";
    }


    public function destroy(string $id)
    {
        if ($this->repository->delete($id)) {
            return "<h1>Delete - OK!</h1>";
        }
        return "<h1>Delete - Not found User!</h1>";
    }
}
