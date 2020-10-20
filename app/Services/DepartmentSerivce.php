<?php


namespace App\Services;


use App\Repositries\DepartmentRepositry;
use Illuminate\Http\Request;

class DepartmentSerivce
{
    /**
     * @var DepartmentRepositry
     */
    private $departmentRepositry;

    /**
     * service to manage all logic code
     */

    public function __construct(DepartmentRepositry $departmentRepositry)
    {
        $this->departmentRepositry = $departmentRepositry;
    }

    public function find_by(Request $request)
    {
        $departments = $this->departmentRepositry->find_by($request);
        return $departments;
    }

    public function save(Request $request, $id = null)
    {
        $request->merge([
            'user_id' => auth()->user()->id
        ]);
        $result = $this->departmentRepositry->save($request, $id);
        return $result;
    }

    /**
     * Use id to find from Repository
     *
     * @param Int $id
     * @return questionnaire
     */
    public function find($id)
    {
        $result = $this->departmentRepositry->find($id);
        return $result;
    }

    /**
     * Remove data from the Repository
     *
     * @param Request $request
     * @param Int $id
     * @return Boolean
     */
    public function delete(Request $request, $id)
    {
        $result = $this->departmentRepositry->delete($id);
        return $result;
    }
}
