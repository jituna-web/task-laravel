@extends('layout')

@section('main-content')
<div>
    <div class=float-start>
    <h4 class="pb-3">Moje úkoly</h4>
    </div>
    <div class=float-end>
    <a href="{{ route('task.create' )}}" class="btn btn-info">
    <i class="fas fa-plus"></i> Vytvořit úkol</a>
    </div>
 </div>
 <div class="clearfix"></div>
</div>

  @foreach ($tasks as $task)

  
    <div class="card mt-3">
        <h5 class="card-header">
        @if ($task->status === "Todo")
            {{$task->title}}
            @else
                <del>{{$task->title}}</del>
            @endif


            <span class="badge rounded-pill bg-warning text-dark">
                {{$task->created_at}}
            </span>
        </h5>
        <div class="card-body">
        <div class="card-text">
        <div class=float-start>
        @if ($task->status === "Todo")
            {{$task->description}}
            @else
                <del>{{$task->description}}</del>
            @endif
            <br>
            @if ($task->status === "Todo")
            <span class="badge bg-info text-dark">
                splnit
            </span>
            @else
            <span class="badge bg-success text-white">
                hotovo
            </span>
            @endif
            <small>Poslední aktualizace - {{$task->updated_at}}</small>
            </div>
                <div class=float-end>
                <a href="{{ route('task.edit', $task->id )}}" class="btn btn-success">
                    <i class="fa fa-edit"></i> </a>

                    <form action="{{route('task.destroy', $task->id)}}" style="display:inline" method="POST">
                    @csrf 
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i></button>
                    </form>
                </div>              
                <div class="clearfix"></div>        
            </div>
        </div>
    </div>

    @endforeach

    @if (count($tasks)=== 0)
    <div class="alert alert-danger p-2">
        Nejsou zde žádné úkoly. Vytvořte první úkol.
        <br>
        <br>
        <a href="{{ route('task.create' )}}" class="btn btn-info ">
        <i class="fas fa-plus"></i>Vytvořit úkol</a>
    </div>
    @endif
@endsection
