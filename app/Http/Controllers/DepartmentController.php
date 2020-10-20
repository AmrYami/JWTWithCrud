<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Services\DepartmentSerivce;
use Illuminate\Http\Request;
use Response;

class DepartmentController extends Controller
{

    public function __construct(){
        $this->middleware('jwt.auth', ['only' => ['index','store', 'show', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, DepartmentSerivce $departmentSerivce)
    {
        $departments = $departmentSerivce->find_by($request);
        if ($departments)
            return response()->json([
                'status' => 'success',
                'departments' => $departments,
            ]);
        return Response::json(array('error' => __('Something Went Wrong Please Try Again Later')), 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DepartmentSerivce $departmentSerivce)
    {
        $department = $departmentSerivce->save($request);
        if ($department)
            return response()->json([
                'status' => 'success',
                'Message' => 'Department added successfully',
            ]);
        return Response::json(array('error' => __('Something Went Wrong Please Try Again Later')), 200);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Department $department
     * Display the specified InventoryItem.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id, Request $request, DepartmentSerivce $department)
    {
        $department = $department->find($id);
        if ($department)
            return response()->json([
                'status' => 'success',
                'department' => $department,
            ]);
        return Response::json(array('error' => __('Something Went Wrong Please Try Again Later')), 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, DepartmentSerivce $departmentSerivce)
    {
        $department = $departmentSerivce->save($request, $id);
        if ($department)
            return response()->json([
                'status' => 'success',
                'Message' => 'Department updated successfully',
            ]);
        return Response::json(array('error' => __('Something Went Wrong Please Try Again Later')), 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request, DepartmentSerivce $departmentSerivce)
    {
        $delete = $departmentSerivce->delete($request, $id);
        if ($delete)
            return response()->json([
                'status' => 'success',
                'Message' => 'Department deleted successfully',
            ]);
        return Response::json(array('error' => __('Something Went Wrong Please Try Again Later')), 200);

    }
}
