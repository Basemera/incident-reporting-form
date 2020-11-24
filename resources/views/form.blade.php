@extends('layouts.app')
@section('content')
<div class="container-fluid p-5">

<form method="POST" action="/incident">
@csrf
<!-- <div class="row"> -->

<!-- <div class="col-md-6"> -->
<div class="form-group">
<label for="product_name">Product Name</label>
<select class="form-control" id="product_name">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>

</select>
</div>
<!-- </div> -->


<!-- <div class="col-md-6"> -->
<div class="form-group">
<label for="product_version">Product Version</label>
<select class="form-control" id="product_version">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>

</select>
</div>
<!-- </div> -->


<div class="col-md-6">
<div class="form-group">
<label for="incident_description">Incident description</label>
<input id="incident_description" type="text" placeholder="Incident description" aria-describedby="helpId" required class="@error('incident_description') is-invalid @enderror">
</div>
</div>

<!-- <div class="col-md-6"> -->
<div class="form-group">
<label for="incident_lessons_learned">Lessons learned</label>
<input id="incident_lessons_learned" type="text" placeholder="Lessons learned" aria-describedby="helpId" required class="@error('incident_lessons_learned') is-invalid @enderror">
<!-- </div> -->
</div>


<!-- <div class="col-md-6"> -->
<div class="form-group">
<label for="assurance">Assurance</label>
<input id="assurance" type="text" placeholder="Assurance" aria-describedby="helpId" required class="@error('assurance') is-invalid @enderror">
<!-- </div> -->
</div>

@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<!-- </div> -->
</form>
</div>
@endsection