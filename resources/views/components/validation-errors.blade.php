@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="menu ">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
