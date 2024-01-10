@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @forelse ($projects as $project)
        <div class="col-4 p-5 card">
            <a href="{{route('admin.projects.show', $project)}}">
                <p>{{$project['name']}}</p>
                <p>{{$project['description']}}</p>
                <p>{{isset($project->type) ? $project->type->name : '-' }}</p>
            </a>
            <a href="{{route('admin.projects.edit', $project)}}">Edit</a>
            <form class="" action="{{route('admin.projects.destroy', $project['id'])}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Elimina">
            </form>

        </div>
        @empty

        @endforelse
    </div>
</div>
@endsection