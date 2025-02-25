<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="a-i-employees-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($aIEmployees as $aIEmployee)
                <tr>
                    <td>{{ $aIEmployee->name }}</td>
                    <td>{{ $aIEmployee->role }}</td>
                    <td>{{ $aIEmployee->status }}</td>
                    <td>{{ $aIEmployee->created_at }}</td>
                    <td>{{ $aIEmployee->updated_at }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['a-i-employees.destroy' , $aIEmployee->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('a-i-employees.show', [$aIEmployee->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('a-i-employees.edit', [$aIEmployee->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $aIEmployees])
        </div>
    </div>
</div>
