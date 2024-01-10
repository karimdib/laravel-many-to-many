@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center p-5">
        <div class="col-4">
            <p>{{$project->name}}</p>
            <p>{{$project->description}}</p>
            <p>{{isset($project->type) ? $project->type->name : '-' }}</p>
            <ul class="d-flex  gap-3">
                @forelse ($project->tecnologies as $tecnology)
                <p>{{ $tecnology['name']}}</p>
                @empty
                <p>non ci sono tecnologie</p>
                @endforelse
            </ul>
        </div>


    </div>
</div>
@endsection