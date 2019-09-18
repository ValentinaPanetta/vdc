@extends('layouts.default')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subscribe to Newsletter</div>

                <div class="card-body">


                    @if($sub == 'no' )                      
                        <form method="POST" action="{{ route('newsletter.store') }}">
                            @csrf
                            @foreach ($res as $res)
                                <input type="hidden" name="email" value="{{ $res->email }}">  
                            @endforeach
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" onclick="return alert('Thank you for your subscription')">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif

                    @foreach ($resNL as $resNL)           
                        <form method="POST" action="{{ route('newsletter.destroy', $resNL->id) }}">
                        {{ method_field('DELETE') }}
                        @csrf
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button  type="submit" class="btn btn-primary" value="delete" 
                                    onclick="return confirm('Are you sure to delete?')">
                                            Unsubscribe
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                


                </div>
            </div>
        </div>
    </div>
</div>

@endsection