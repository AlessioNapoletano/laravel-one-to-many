<form class="bg-dark p-3 rounded-4 text-light" action="{{ route($action, $project->slug) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)
    
    <h4 class="mb-3 fw-bold">
        {{ Auth::user()->name }}
    </h4>

    <form>
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror  
        </div>

        <div class="mb-3">
            <label for="post_date" class="form-label">Data di pubblicazione</label>
            <input type="date" class="form-control @error('post_date') is-invalid @enderror" id="post_date" name="post_date" 
            value="{{ old('post_date', $project->post_date) }}" >
            @error('post_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror 
        </div>
        
        <div class="mb-3">
            <label for="type_id">Seleziona il Tipo</label>
            <select  class="form-control" id="type_id" name="type_id" >
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>
                        {{ $type->type }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="cover_image" class="form-label">Post image: </label>
            <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" 
            value="{{ old('cover_image', $project->cover_image) }}" >
            @error('cover_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror 
        </div>

        
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto del post</label>
            <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content', $project->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror 
        </div>

        <div class="button mb-3 d-flex justify-content-between">
            <a class="btn btn-dark" href="{{ route('admin.projects.index')}}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <button type="submit" class="btn btn-{{$buttonClass}}">{{$buttonText}}</button>
        </div>
    </form>
</form>