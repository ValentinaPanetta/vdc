@extends('layouts.default')
@section('content')
<div class="container-fluid mb-5" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-12 h2 text-center text-white">Create Job Profile</div>
        <div class="col-md-11">
            <div class="form-group row">
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('jobProfiles.index') }}">
                        <button type="submit" class="btn btn-primary">
                        Go Back
                    </button></a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Create Job Profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('jobProfiles.store') }}">
                        @csrf

                        <!-- from user -->
                        <div class="form-group row">
                            <label for="profile_name" class="col-md-2 col-form-label text-md-right">Job Profile Name</label>
                            <div class="col-md-9">
                                <input name="name" type="text" class="form-control" id="name" placeholder="Profile Name">
                            </div>
                        </div>

                        <div class="from-group row mb-4">
                            <label for="importance" class="col-md-2 col-form-label text-md-right">Importance</label>
                            <div class="col-md-9">
                                <select name="importance" class="form-control" id="importance">                                   
                                    <option value="must_have">Must Have</option>
                                    <option value="nice_to_have">Nice To Have</option>
                                    <option value="should_have">Should Have</option>                                                      
                                </select> 
                            </div>                           
                        </div>                        

                        <div class="form-group row">
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Save Profile
                                </button>
                            </div>
                        </div>
                    </form>                                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection