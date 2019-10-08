@extends('layouts.default')

@section('content')
 <form method="POST" action="{{ route('newsletter.store') }}">
    @csrf

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email address</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" placeholder="name@example.com" required>
        </div>
    </div>                     
    
    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary" onclick="return alert('Thank you for your subscription')">
                Subscribe
            </button>
        </div>
    </div>
</form>
@endsection