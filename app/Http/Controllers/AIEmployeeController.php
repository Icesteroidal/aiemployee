<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAIEmployeeRequest;
use App\Http\Requests\UpdateAIEmployeeRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AIEmployeeRepository;
use Illuminate\Http\Request;
use Flash;

class AIEmployeeController extends AppBaseController
{
    /** @var AIEmployeeRepository $aIEmployeeRepository*/
    private $aIEmployeeRepository;

    public function __construct(AIEmployeeRepository $aIEmployeeRepo)
    {
        $this->aIEmployeeRepository = $aIEmployeeRepo;
    }

    /**
     * Display a listing of the AIEmployee.
     */
    public function index(Request $request)
    {
        $aIEmployees = $this->aIEmployeeRepository->paginate(10);

        return view('a_i_employees.index')
            ->with('aIEmployees', $aIEmployees);
    }

    /**
     * Show the form for creating a new AIEmployee.
     */
    public function create()
    {
        return view('a_i_employees.create');
    }

    /**
     * Store a newly created AIEmployee in storage.
     */
    public function store(CreateAIEmployeeRequest $request)
    {
        $input = $request->all();

        $aIEmployee = $this->aIEmployeeRepository->create($input);

        Flash::success('A I Employee saved successfully.');

        return redirect(route('a-i-employees.index'));
    }

    /**
     * Display the specified AIEmployee.
     */
    public function show($id)
    {
        $aIEmployee = $this->aIEmployeeRepository->find($id);

        if (empty($aIEmployee)) {
            Flash::error('A I Employee not found');

            return redirect(route('a-i-employees.index'));
        }

        return view('a_i_employees.show')->with('aIEmployee', $aIEmployee);
    }

    /**
     * Show the form for editing the specified AIEmployee.
     */
    public function edit($id)
    {
        $aIEmployee = $this->aIEmployeeRepository->find($id);

        if (empty($aIEmployee)) {
            Flash::error('A I Employee not found');

            return redirect(route('a-i-employees.index'));
        }

        return view('a_i_employees.edit')->with('aIEmployee', $aIEmployee);
    }

    /**
     * Update the specified AIEmployee in storage.
     */
    public function update($id, UpdateAIEmployeeRequest $request)
    {
        $aIEmployee = $this->aIEmployeeRepository->find($id);

        if (empty($aIEmployee)) {
            Flash::error('A I Employee not found');

            return redirect(route('a-i-employees.index'));
        }

        $aIEmployee = $this->aIEmployeeRepository->update($request->all(), $id);

        Flash::success('A I Employee updated successfully.');

        return redirect(route('a-i-employees.index'));
    }

    /**
     * Remove the specified AIEmployee from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aIEmployee = $this->aIEmployeeRepository->find($id);

        if (empty($aIEmployee)) {
            Flash::error('A I Employee not found');

            return redirect(route('a-i-employees.index'));
        }

        $this->aIEmployeeRepository->delete($id);

        Flash::success('A I Employee deleted successfully.');

        return redirect(route('a-i-employees.index'));
    }
}
