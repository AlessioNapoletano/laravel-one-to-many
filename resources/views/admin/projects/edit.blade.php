@extends('layouts.admin')

@section('title', "Edit '$project->title' Project")

@section('content')

<section class="edit-project">
    <div class="container py-5 mb-5">
        @include('admin.projects.partials.form', ['method' => 'PUT', 'action' => 'admin.projects.update', 'buttonClass' => 'success', 'buttonText' => 'Edit Project'])
    </div>
</section>
    
@endsection
