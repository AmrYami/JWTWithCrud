<?php


namespace App\Repositries;


use App\Abstractions\DepartmentAbstract;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentRepositry extends DepartmentAbstract
{
    /**
     * @var Department
     */
    private $department;

    /**
     * repository to manage all proccess with database
     */

    public function __construct(Department $department)
    {
        $this->department = $department;
        $this->model = $department;
    }

    /**
     * @param Request $request
     * @return Boolean
     */
    public function find_by(Request $request)
    {
        $pageNumber = $request->page ?? 1;
        $department = $this->department->query();
        $department = $department->paginate(15, ['*'], 'page', $pageNumber);
        if ($department)
            return $department;
        return false;
    }

    /**
     * Use save data into Model
     *
     * @param Request $request
     * @param Int $id
     * @return Boolean
     */
    public function save(Request $request, int $id = null)
    {

        // check weather is there id or not
        if ($id) {
            // if there is id use the model as the id model object
            $department = $this->update($request->all(), $id);
        } else {
            $department = $this->create($request->all());
        }
        return $department;
    }

    public function delete($id)
    {
        $return = $this->model->where('id', $id)->delete();
        return $return;
    }
}
