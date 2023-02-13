@extends('layouts.app')


@section('content')

  <div class="container">
    <div class="card">
      <div class="card-header">Create element</div>

      <div class="card-body">

        @if ($errors->any())
          <div class="alert alert-danger">
            Invalid data:

            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif


        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
          @csrf()

          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
              value="">
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
            <textarea name="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror"></textarea>
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
          </div>

          <div class="mb-3">
            <label class="form-label">GitHub Link</label>
            <input type="text" class="form-control @error('github_link') is-invalid @enderror" name="github_link"
            >
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