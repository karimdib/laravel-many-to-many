@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>ciao sonoa la pagina create</h1>
        <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group p-3">
                <label for="name" class="mb-2">name</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name">
            </div>
            <div class="form-group p-3">
                <label for="img" class="mb-2">Inserisci un immagine</label>
                <input class="form-control" type="file" id="img" name="img">
            </div>
            <div class="form-group p-3">
                <label for="description" class="mb-2">description</label>
                <input type="text" class="form-control" id="description" placeholder="description" name="description">
            </div>
            <div class="form-group p-3">
                <label for="">scegli il tipo</label>
                <select name="type_id" class="form-control" id="type_id">
                    <option value="" disabled='disabled'>Scegli un tipo</option>
                    @foreach($types as $type)
                    <option @selected( old('type_id')==$type->id ) >{{ $type->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group p-3 mb-3">
                <label for="">scegli la tecnologia</label>
                <div class="d-flex gap-5">
                    @foreach ($tecnologies as $tecnology)
                    <div class="form-check">
                        <input name="tecnologies[]" class="form-check-input" type="checkbox" value="{{$tecnology->id}}"
                            id="tecnology-{{$tecnology->id}}" @checked( in_array($tecnology->id, old('tecnologies',[]) )
                        ) >
                        <label class="form-check-label" for="tag-{{$tecnology->id}}">
                            {{ $tecnology->name }}
                        </label>
                    </div>

                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary m-3">Submit</button>
        </form>
    </div>
</div>
@endsection