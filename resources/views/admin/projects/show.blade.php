@extends('layouts.admin')

@section('title', "Show $project->title Project")

@section('content')

<section class="show-project">
    <div class="container my-5">

        <!--Print message-->
        @include('admin.projects.partials.session-message')

        <div class="card">
            <div class="card-header d-flex justify-content-around">
                <p class="fw-bold">
                    {{ $project->author }}
                </p>

                <p class="fw-bold">
                    {{ $project->type->type }}
                </p>
              
            </div>
            <div class="card-body">
                @if ( $project->isImageAUrl())
                    <img src="{{ $project->cover_image }}"
                @else
                    <img src="{{ asset('storage/' . $project->cover_image ) }}"
                @endif
                    alt="{{ $project->title }} image" class="img-fluid">
                    
                <h5 class="card-title text-center">
                    <span class="fw-bold">
                        {{ $project->title }}
                    </span>
                </h5>
                <p class="card-text">{{ $project->content }}</p>

                
                <div class="button d-flex justify-content-between">

                    <a class="btn btn-dark" href="{{ route('admin.projects.index')}}">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>

                    <a class="btn btn-success text-center" href="{{ route('admin.projects.edit', $project->slug) }}" >
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <form class="d-inline delete text-center" action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" >
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    </form>
                </div>
                
            </div>
            
            <div class="card-footer text-muted text-center">
                {{ $project->post_date }}
            </div>
        </div>
    </div>
</section>
    
@endsection

@section('script')
    @vite('resources/js/confirmDelete.js')
@endsection
