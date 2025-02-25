<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="a-i-tasks-table">
            <thead>
            <tr>
                <th>Task</th>
                <th>Status</th>
                <th>Response</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($aITasks as $aITask)
                <tr>
                    <td>{{ $aITask->task }}</td>
                    <td>{{ $aITask->status }}</td>
                    <td>{{ $aITask->response }}</td>
                    <td>{{ $aITask->created_at }}</td>
                    <td>{{ $aITask->updated_at }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['a-i-tasks.destroy', $aITask->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('a-i-tasks.show', [$aITask->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('a-i-tasks.edit', [$aITask->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $aITasks])
        </div>
    </div>
</div>
