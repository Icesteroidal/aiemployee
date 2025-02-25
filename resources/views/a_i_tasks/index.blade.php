@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>AI Tasks</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('a-i-tasks.create') }}">
                        Add New Task
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Task List</h3>
            </div>

            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Task</th>
                            <th>Status</th>
                            <th>Trigger Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aITasks as $task)
                        <tr>
                            <td>{{ $task->task }}</td>
                            <td>
                                <span class="badge badge-{{ $task->status == 'completed' ? 'success' : 'warning' }}">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </td>
                            <td>
                                <select id="taskSelection{{ $task->id }}" class="form-control d-inline-block w-auto">
                                    <option value="email">Check Emails</option>
                                    <option value="discord">Monitor Discord</option>
                                    <option value="schedule">Schedule Meeting</option>
                                </select>
                                <button onclick="triggerTask({{ $task->id }})" class="btn btn-primary ml-2">Trigger Task</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
function triggerTask(taskId) {
    let selectedTask = document.getElementById('taskSelection' + taskId).value;
    fetch('/trigger-task', {
        method: 'POST',
        headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        body: JSON.stringify({task_id: taskId, task: selectedTask})
    })
    .then(response => response.json())
    .then(data => alert('Task triggered successfully!'))
    .catch(error => alert('Error triggering task.'));
}
</script>

@endsection
