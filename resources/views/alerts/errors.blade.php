@if (session($key ?? 'statu'))
    <div class="alert alert-danger" role="alert">
       <div class="text-center">
        {{ session($key ?? 'statu') }}
        </div>
    </div>
@endif
