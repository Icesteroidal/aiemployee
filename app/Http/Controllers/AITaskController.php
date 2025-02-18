<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAITaskRequest;
use App\Http\Requests\UpdateAITaskRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AITaskRepository;
use Illuminate\Http\Request;
use Flash;

class AITaskController extends AppBaseController
{

    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\AITask;

    /** @var AITaskRepository $aITaskRepository*/
    private $aITaskRepository;

    public function __construct(AITaskRepository $aITaskRepo)
    {
        $this->aITaskRepository = $aITaskRepo;
    }

    //Implementation 

     /**
      * Store a newly created AITask in storage.
      */
     public function store(CreateAITaskRequest $request)
     {
         $input = $request->all();
 
         // Create the AI Task
         $aITask = $this->aITaskRepository->create($input);
 
         // Send the task data to the n8n webhook
         $n8nWebhookUrl = 'https://your-n8n-instance.com/webhook/aiemployee-task';
         Http::post($n8nWebhookUrl, [
             'task_id' => $aITask->id,
             'task' => $aITask->task,
             'ai_employee_id' => $aITask->ai_employee_id,
             // Include other relevant data as needed
         ]);
 
         Flash::success('AI Task saved successfully.');
 
         return redirect(route('aITasks.index'));
     }
 
     // Other methods...

     

    /**
     * Display a listing of the AITask.
     */
    public function index(Request $request)
    {
        $aITasks = $this->aITaskRepository->paginate(10);

        return view('a_i_tasks.index')
            ->with('aITasks', $aITasks);
    }

    /**
     * Show the form for creating a new AITask.
     */
    public function create()
    {
        return view('a_i_tasks.create');
    }

    /**
     * Store a newly created AITask in storage.
     */
    // public function store(CreateAITaskRequest $request)
    // {
    //     $input = $request->all();

    //     $aITask = $this->aITaskRepository->create($input);

    //     Flash::success('A I Task saved successfully.');

    //     return redirect(route('aITasks.index'));
    // }

    /**
     * Display the specified AITask.
     */
    public function show($id)
    {
        $aITask = $this->aITaskRepository->find($id);

        if (empty($aITask)) {
            Flash::error('A I Task not found');

            return redirect(route('aITasks.index'));
        }

        return view('a_i_tasks.show')->with('aITask', $aITask);
    }

    /**
     * Show the form for editing the specified AITask.
     */
    public function edit($id)
    {
        $aITask = $this->aITaskRepository->find($id);

        if (empty($aITask)) {
            Flash::error('A I Task not found');

            return redirect(route('aITasks.index'));
        }

        return view('a_i_tasks.edit')->with('aITask', $aITask);
    }

    /**
     * Update the specified AITask in storage.
     */
    public function update($id, UpdateAITaskRequest $request)
    {
        $aITask = $this->aITaskRepository->find($id);

        if (empty($aITask)) {
            Flash::error('A I Task not found');

            return redirect(route('aITasks.index'));
        }

        $aITask = $this->aITaskRepository->update($request->all(), $id);

        Flash::success('A I Task updated successfully.');

        return redirect(route('aITasks.index'));
    }

    /**
     * Remove the specified AITask from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aITask = $this->aITaskRepository->find($id);

        if (empty($aITask)) {
            Flash::error('A I Task not found');

            return redirect(route('aITasks.index'));
        }

        $this->aITaskRepository->delete($id);

        Flash::success('A I Task deleted successfully.');

        return redirect(route('aITasks.index'));
    }
}
