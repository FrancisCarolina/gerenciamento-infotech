<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class TaskController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new TaskRepository();
    }
    public function index()
    {
        $data = $this->repository->selectAllWith(['user', 'status']);
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $objUser = (new UserRepository())->findById($request->user_id);
        $objStatus = (new StatusRepository())->findById($request->status_id);
        if (isset($objUser) && isset($objStatus)) {
            $obj = new Task();
            $obj->name = $request->name;
            $obj->descricao = $request->descricao;
            $obj->user()->associate($objUser);
            $obj->status()->associate($objStatus);
            $this->repository->save($obj);
            return "<h1>Store - OK!</h1>";
        }
        return "<h1>Store - Not found User or Status!</h1>";
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
        $objUser = (new UserRepository())->findById($request->user_id);
        $objStatus = (new StatusRepository())->findById($request->status_id);

        if (isset($obj) && isset($objUser) && isset($objStatus)) {
            $obj->name = $request->name;
            $obj->descricao = $request->descricao;
            $obj->user()->associate($objUser);
            $obj->status()->associate($objStatus);
            $this->repository->save($obj);
            return "<h1>Update - OK!</h1>";
        }

        return "<h1>Upate - Not found Task or User or Status!</h1>";
    }


    public function destroy(string $id)
    {
        if ($this->repository->delete($id)) {
            return "<h1>Delete - OK!</h1>";
        }
        return "<h1>Delete - Not found Taks!</h1>";
    }
}
