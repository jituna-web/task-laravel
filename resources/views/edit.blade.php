@extends('layout')

@section('main-content')
<div>
    <div class=float-start>
    <h4 class="pb-3">Upravit  <span class="badge bg-info">{{ $task->title}}</span></h4>
    </div>
    <div class=float-end>
    <a href="{{ route('index' )}}" class="btn btn-info">
        <i class="fa fa-arrow-left"></i> Všechny úkoly</a>
 </div>
 <div class="clearfix"></div>
</div>

  

  
    <div class="card card-body bg-light p-4">
    <form action="{{route ('task.update', $task->id)}}" method="POST">
        @csrf
        @method ('PUT')

  <div class="mb-3">
    <label for="title" class="form-label">Název</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title}}">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Popis</label>
    <textarea type="text" class="form-control" id="description" name="description" rows="5">{{ $task->description}}</textarea>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Stav</label>
        <select name="status" id="status" class="form-control">
            @foreach ($statuses as $status)
            <option value="{{ $status['value']}}" {{ $task->status === $status['value'] ? 'selected': ''}}>{{ $status['label']}}</option>
            @endforeach
        </select>
  </div>
  
  <a href="{{route('index')}}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i>zpět </a>
  <button type="submit" class="btn btn-success">
    <i class="fa fa-check"></i>    
        uložit</button>
</form>
    </div>

  
@endsection