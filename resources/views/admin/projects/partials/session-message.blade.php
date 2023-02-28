<!--Session message-->
@if (session('message'))
    <div class="alert alert-{{session('message-class')}} mb-3">
        {{ session('message') }}
    </div>
@endif