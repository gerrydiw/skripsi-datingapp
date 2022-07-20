@extends('layouts.layout')
@section('content')

<div class="card card-warning card-outline">
    <div class="card-header">
        Add Recommendation Place
    </div>

    <div class="card-body">
        <form action="{{ route("places.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" required>
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} row">
                <label class="col-sm-2 col-form-label">Information & Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="desc"></textarea>
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} row">
                <label class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                  <select class="form-control select2" name="city_id">
                    <option disabled selected>Pilih...</option>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{ $city->name }}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} row">
                <label class="col-sm-2 col-form-label">Upload Photo</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" name="url_foto">
                    <label class="custom-file-label">Pilih file</label>
                  </div>
                  <small class="form-text text-muted">
                    Format file .jpg, jpeg, png
                </small>
                </div>
            </div>
            <div>
                <input class="btn btn-warning" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection