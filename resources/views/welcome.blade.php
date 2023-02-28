@extends('layouts.admin')

@section('title', 'Alessio Napoletano')

@section('content')

<section class="welcome-page">
    <div class="container mb-5 py-5">
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-6 d-flex flex-wrap align-items-stretch">
                    <div class="card mb-5">
                    
                        @if ( $project->isImageAUrl())
                            <img src="{{ $project->cover_image }}"
                        @else
                            <img src="{{ asset('storage/' . $project->cover_image ) }}"
                        @endif
                            alt="{{ $project->title }} image" class="img-fluid">
    
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center mb-3">
                                {{ $project->title }}
                            </h5>
    
                            <!--Data di creazione del progetto-->
                            <p class="card-text text-end">
                                <span class="fw-bold">
                                    Data Di Creazione: 
                                </span>
    
                                <span>
                                    {{ $project->post_date}}
                                </span>
                            </p>
    
                            <!--Descrizione del progetto-->
                            <p class="card-text">{{ $project->content }}</p>
                            
                        </div>
    
                        <div class="button text-center mb-2">
                            <a href="#" class="btn btn-primary">show</a>
                        </div>
                    </div>
                </div>  
            @endforeach
        </div>
        
        <div class="pagination">
            <span>
                {{ $projects->links() }}
            </span>
        </div>
</section>

@endsection