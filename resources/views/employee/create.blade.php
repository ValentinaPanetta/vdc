@extends('layouts.adminPannel')
@section('content')
<div class="p-5 bg-dark-t text-white">
<form method="POST" action="{{ route('employee.store') }}">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Date of Birth</label>
    <input type="date" class="form-control" id="exampleFormControlInput1" name="date_birth">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Company</label>
    <select class="form-control" id="exampleFormControlSelect1" name="FK_company">
      @foreach ($companies as $companies)
      <option value="{{ $companies->id }}">{{ $companies->company_name }}</option>
      @endforeach
    </select>
  </div>
  <input type="hidden" value="{{ Auth::user()->id }}" name="FK_user">
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
  <div class="p-2">
    <button type="submit" class="btn btn-primary">
      save
    </button>
  </div>
</form>

</div>
@endsection