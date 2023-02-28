@extends('layouts.admin')

@section('title', 'Create new Project')

@section('content')

<section class="create-project">
    <div class="container py-5 mb-5">
        @include('admin.projects.partials.form', ['method' => 'POST', 'action' => 'admin.projects.store', 'parameter' => '', 'buttonClass' => 'primary', 'buttonText' => 'Create project'])
    </div>
</section>
    
@endsection
