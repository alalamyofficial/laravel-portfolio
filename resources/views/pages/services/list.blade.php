@extends('layouts.admin_layout')
@section('content')

<h2>List of Services</h2> <br>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">List</li>
</ol>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Icon</th>
      <th scope="col">Title</th>
      <th scope="col">Decription</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if (count($services) > 0)
        @foreach ($services as $service)
        <tr>
            <th scope="row">{{$service->id}}</th>
            <td>{{$service->icon}}</td>
            <td>{{$service->title}}</td>
            <td>{{Str::limit(strip_tags($service->description),40)}}</td>

            <td>
                <div class="row">
                    <div class="col-sm-2">
                        <a href="{{route('admin.services.edit', $service->id)}}" class="btn btn-primary">Edit</a>
                    </div>
                    <div class="col-sm-2 pr-5">
                        <form action="{{route('admin.services.destroy', $service->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
                        
    @endif   
  </tbody>
</table>




@endsection