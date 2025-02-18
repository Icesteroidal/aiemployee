<!-- Task Field -->
<div class="col-sm-12">
    {!! Form::label('task', 'Task:') !!}
    <p>{{ $aITask->task }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $aITask->status }}</p>
</div>

<!-- Response Field -->
<div class="col-sm-12">
    {!! Form::label('response', 'Response:') !!}
    <p>{{ $aITask->response }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $aITask->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $aITask->updated_at }}</p>
</div>

