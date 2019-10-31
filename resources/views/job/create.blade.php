@extends('layouts.adminPannel')
@section('content')
<div class="container-fluid mb-5">
    <div class="row mx-5 py-3 justify-content-center bg-dark-t">
        <div class="col-12 h2 text-center text-lightcyan">Create Offer</div>
        <div class="col-md-11">
            <div class="form-group row">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <a href="{{ route('job.index') }}">
                        <button type="submit" class="btn-custom btn-custom-cyan">
                        Go Back
                    </button></a>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">Create Job Offer</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('job.store') }}">
                        @csrf

                        <!-- from user -->
                        <div class="form-group row">
                            <label for="FK_company" class="col-md-2 col-form-label text-md-right">Company</label>
                            <div class="col-md-9">
                                <input name="FK_company" class="form-control" id="comp_name" placeholder="Company">
                            </div>
                        </div>

                        <div class="from-group row mb-3">
                            <label for="FK_profile" class="col-md-2 col-form-label text-md-right">Job Profile</label>
                            <div class="col-md-9">
                                <select name="FK_profile" class="form-control" id="profile">
                                    @foreach($profiles as $profiles)
                                        <option value="{{ $profiles->id }}">{{ $profiles->name }}</option>
                                    @endforeach                  
                                </select> 
                            </div>                           
                        </div>

                        <div class="form-group row" style="height: 150px;">
                            <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control" style="height: 150px;" id="description"></textarea>
                            </div>                             
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">Start Date</label>
                            <div class="col-md-9">
                                <input type="datetime-local" name="start_date" class="form-control" id="start_date" placeholder="Date" required>
                            </div>                        
                        </div>

                        <div class="from-group row mb-3">
                            <label for="FK_language" class="col-md-2 col-form-label text-md-right">Language</label>
                            <div class="col-md-9">
                                <select name="FK_language" class="form-control" id="language">
                                    @foreach($languages as $languages)
                                        <option value="{{ $languages->id }}">{{ $languages->language_name }}</option>
                                    @endforeach
                                </select>
                            </div>                           
                        </div>

                        <div class="form-group row">
                            <label for="salary" class="col-md-2 col-form-label text-md-right">Salary</label>
                            <div class="col-md-9">
                                <input type="number" name="salary" class="form-control" id="salary" placeholder="Salary" required>   
                            </div>                         
                        </div>

                        <div class="form-group row">
                            <label for="working_hours" class="col-md-2 col-form-label text-md-right">Working Hours</label>
                            <div class="col-md-9">
                                <input name="working_hours" type="text" class="form-control" id="working_hours" placeholder="Optional">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-md-2 col-form-label text-md-right">Street</label>
                            <div class="col-md-9">
                                <input name="street" type="text" class="form-control" id="street_add" placeholder="Optional">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zipCode" class="col-md-2 col-form-label text-md-right">ZIP Code</label>
                            <div class="col-md-9">
                                <input name="zipCode" type="text" class="form-control" id="zip_add" placeholder="Optional">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="city" class="col-md-2 col-form-label text-md-right">City</label>
                            <div class="col-md-9">
                                <input name="city" type="text" class="form-control" id="city_add" placeholder="Optional">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-2 col-form-label text-md-right">Country</label>
                            <div class="col-md-9">
                                <input name="country" type="text" class="form-control" id="country_add" placeholder="Optional">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn-custom btn-custom-blue">
                                    Save Offer
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