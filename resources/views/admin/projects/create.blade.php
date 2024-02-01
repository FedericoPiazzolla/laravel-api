@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
      <a class="btn btn-success" href="{{ route('admin.projects.index') }}">&LeftArrow; Back</a>

      <h2 class="text-center">Insert a new Projects</h2>

      <form class="mt-5" action="{{ route('admin.projects.store') }}" method="POST">
        @csrf 

        <div class="mb-3 has-validation">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
          
          @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- types --}}
        <div class="mb-3 has-validation">
          <label for="type">Select Type</label>
          <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type">
            <option @selected(!old('type_id')) value="">No type</option>
            @foreach ( $types as $type)
              <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{$type->name}}</option>
            @endforeach

            @error('type_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </select>
        </div>
        {{-- /types --}}

        {{-- technologies --}}
        <div class="my-4">
          @foreach ($technologies as $technology)

            <div class="form-check">
              <input type="checkbox" id="technology-{{ $technology->id }}" value="{{ $technology->id }}" name="technologies[]">
              <label for="technology-{{ $technology->id }}">
                {{ $technology->name }}
              </label>
            </div>

          @endforeach

          @error('technologies')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        {{-- /technologies --}}

        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea class="form-control" id="content" rows="3" name="content">{{ old('content') }}</textarea>
        </div>

        <button class="btn btn-success" type="submit">Save</button>
      </form>
    </div>
@endsection