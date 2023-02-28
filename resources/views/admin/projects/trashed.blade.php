@extends('layouts.admin')

@section('title', 'Project Trashed')

@section('content')

<section class="trashed-projects py-5 mb-3">
    <div class="container">
        <table class="table bg-dark text-light">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Post Date</th>
                    <th scope="col">Delete at</th>
                    <th scope="col">
                        <form action="{{ route('admin.restore-all-projects') }}" method="POST">
                        @csrf
                            <button class="btn btn-primary"> 
                                <i class="fa-solid fa-recycle me-2"></i>
                                Ripristina Tutti i Post
                            </button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projectTrashed as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->author }}</td>
                    <td>{{ $project->post_date }}</td>
                    <td>{{ $project->deleted_at }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('admin.restore-project', $project->slug)}}" method="POST">
                            @csrf
                            <button class="btn btn-primary">
                                <i class="fa-solid fa-recycle"></i>
                            </button>
                        </form> 

                        <form class="d-inline delete" action="{{ route('admin.force-delete-project', $project->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form> 
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</section>
@endsection

@section('script')
    @vite('resources/js/confirmDelete.js')
@endsection