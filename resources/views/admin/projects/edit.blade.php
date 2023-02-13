@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">Edit Element</div>

      <div class="card-body">

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
          @csrf()
          @method('PUT')

          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
              value="{{ old('name', $project->name) }}">
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Type</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
            @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          


          <div class="mb-3">
            <label class="form-label">Cover</label>
            <input type="file" class="form-control @error('cover_img') is-invalid @enderror" name="cover_img">
            @error('cover_img')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror

            <img src="{{ asset('storage/' . $project->cover_img) }}" alt="" class="img-thumbnail">
          </div>

          <div class="mb-3">
            <label class="form-label">GitHub Link</label>
            <input type="text" class="form-control @error('github_link') is-invalid @enderror" name="github_link"
              value="{{ old('github_link', $project->github_link) }}">
            @error('github_link')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary">Save</button>
        </form>

      </div>
    </div>
  </div>

@endsection