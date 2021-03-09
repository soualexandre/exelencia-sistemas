@if (session($key ?? 'status'))
    <div class="alert alert-success " role="alert">
       <div class="text-center">
        {{ session($key ?? 'status') }}
        </div>
    </div>
@endif
