<div class="container mt-5">
    @foreach ($user as $us)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{$us['created_at']}}</h5>
            <p class="card-text">{{$us['action']}}</p>
        </div>
    </div>
    @endforeach
</div>