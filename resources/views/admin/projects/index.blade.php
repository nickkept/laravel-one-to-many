@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="nav justify-content-center">
      <div class="nav-link">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-link">Add</a>
      </div>
    </div>

    <div class="card">
      <div class="card-header">Project List</div>

      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Type</th>
              <th>Cover</th>
              <th>Description</th>
              <th>Link gitHub</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projects as $project)
              <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->type->name }}</td>
                <td><img src="{{ asset('/storage/' . $project->cover_img) }}" alt="" style="width: 60px"></td> 
                <td>{{ $project->description }}</td>
                <td><a href="">{{ $project->github_link }}</a></td>
                <td>
                  <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary"><i
                      class="fas fa-pencil"></i>Edit</a>
                  <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info"><i
                      class="fas fa-eye"></i>Show</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection