@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
<section class="index-admin py-5 mb-5">
    <div class="container">
        <!--Print message-->
        @include('admin.projects.partials.session-message')
        
        @if (session('alert-message'))
            <div id="popup_message" class="d-none" data-type="{{ session('alert-type') }}" data-message="{{ session('alert-message') }}"></div>
        @endif
    
        <table class="table text-light bg-dark">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Post Date</th>
                    <th scope="col">
                        actions ...
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->author }}</td>
                    <td>{{ $project->post_date }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-primary">
                            <i class="fa-solid fa-eye "></i>
                        </a>
                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-success">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
    
                        <form class="d-inline delete" action="{{ route('admin.projects.destroy', $project->slug)}}" method="POST">
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
    
    <div class="container">
        <div class="">
            {{ $projects->links() }}
        </div>    
    </div>
</section>

@endsection

@section('script')
    @vite('resources/js/confirmDelete.js')
@endsection
