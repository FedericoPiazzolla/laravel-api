@extends('layouts.admin')

@section('content')

  <div class="container-mt-5">
    <a class="my-5 btn btn-success" href="{{ route('admin.projects.index') }}">&LeftArrow; back</a>
    <h2 class="flex-grow-1">Edit Page</h2>

    <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3 has-validation">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">

        @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Type --}}
      <div class="mb-3 has-validation">
        <label for="type">Select Type</label>
        <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type">
          <option @selected(!old('type_id', $project->type_id)) value="">No Type</option>

          @foreach ($types as $type)
            <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
          @endforeach

          @error('type_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </select>
      </div>
      {{-- /Type --}}

      {{-- Technology --}}
      <div class="my-4">
        <h4>Select Technologies used</h4>

        @foreach ($technologies as $technology)
          <div class="form-check">

            <input @checked( $errors->any() ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology)) type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}" value="{{ $technology->id }}">
            <label for="technology-{{ $technology->id }}">{{ $technology->name }}</label>

          </div> 
        @endforeach

        @error('technologies')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      {{-- /Technology --}}

      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" rows="3">{{ old('content', $project->content) }}</textarea>
      </div>

      <button class="btn btn-warning" type="submit">Modify</button>
    </form>
  </div>

@endsection