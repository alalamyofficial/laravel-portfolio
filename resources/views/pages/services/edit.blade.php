@extends('layouts.admin_layout')
@section('content')

<h2>Services</h2> <hr>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<form action="{{route('admin.services.update',$service->id)}}" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="row">

    <div class="form-group col-md-4 mt-3">
        <div class="mb-3">
            <label for="icon"><h4>Font Awesome Icon</h4></label>
        <input type="text" class="form-control" id="icon" name="icon" value="{{$service->icon}}" placeholder="Ex. far fa-address-card ">
        </div>
        <div class="mb-5">
            <label for="title"><h4>Title</h4></label>
            <input type="text" class="form-control" id="title" value="{{$service->title}}" name="title">
        </div>
        <div class="mb-5">
            <label for="description"><h4>Description</h4></label>
            <textarea type="text" class="form-control" id="description" name="description">{{$service->description}}</textarea>
        </div>
    </div>


    </div>
    <input type="submit" name="submit" value="Update" class="btn btn-success mt-5">
</form>


@endsection