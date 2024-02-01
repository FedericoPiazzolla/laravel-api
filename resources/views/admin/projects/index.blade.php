@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
      <h2>List Projects:</h2>

      <div class="text-end">
        <a class="btn btn-warning" href="{{ route('admin.projects.create') }}">Create a new Project</a>
      </div>

      @if (session('message'))
        <div class="alert alert-danger">
          {{ session('message') }}
        </div>
      @endif

      @if (count($projects) > 0)
         <table class="table table-striped mt-5">

          <thead>

            <tr>
              <th scope="col">id</th>
              <th scope="col">Title</th>
              <th scope="col">Data</th>
              <th scope="col">Actions</th>
            </tr>

          </thead>

          <tbody>

            @foreach ($projects as $project)
              <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>{{ $project->title }}</td>
                <td>{{ $project->created_at }}</td>
                <td>
                  <a class="btn btn-success" href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">Details</a>
                  <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">Edit</a>

                  <form class="d-inline-block" action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-delete" type="submit">Delete</button>
                  </form>
                </td>
              </tr>  
            @endforeach
            
          
          </tbody>

        </table> 
      @else
      <div class="alert alert-warning mt-5">
        <h2 class="text-center">You haven't entered any projects yet, click the button to add one</h2>
      </div>
          
      @endif
      
      @include('admin.partials.delete-modal')
    </div>
@endsection