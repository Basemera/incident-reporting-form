@extends('layouts.app')
@section('content')
<div class="container-fluid p-5">

    <form method="POST" action="/incident" enctype="multipart/form-data">
        @csrf

        <!-- <div class="row"> -->

        <!-- <div class="col-md-6"> -->
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <select required class="form-control" name="product_name" id="product_name" onchange="showVersions()">
            <option></option>
                @foreach ($products as $product)

                <option value="{{ json_encode($product->versions) }}" id="{{ $product->id }}">{{ $product->product_name }}</option>
                @endforeach

            </select>
        </div>
        <!-- </div> -->


        <!-- <div class="col-md-6"> -->
        <div class="form-group" id="hidden_div" style="display: none;">
            <label for="product_version">Product Version</label>
            <select class="form-control" name="product_version" id="product_version">

            </select>
        </div>
        <!-- </div> -->


        <div class="col-md-6">
            <div class="form-group">
                <label for="incident_description">Incident description</label>
                <input name="incident_description" id="incident_description" type="text" placeholder="Incident description" aria-describedby="helpId" required class="@error('incident_description') is-invalid @enderror">
            </div>
        </div>

        <!-- <div class="col-md-6"> -->
        <div class="form-group">
            <label for="incident_lessons_learned">Lessons learned</label>
            <input name="incident_lessons_learned" id="incident_lessons_learned" type="text" placeholder="Lessons learned" aria-describedby="helpId" required class="@error('incident_lessons_learned') is-invalid @enderror">
            <!-- </div> -->
        </div>


        <!-- <div class="col-md-6"> -->
        <div class="form-group">
            <label for="assurance">Assurance</label>
            <input name="assurance" id="assurance" type="text" placeholder="Assurance" aria-describedby="helpId" required class="@error('assurance') is-invalid @enderror">
            <!-- </div> -->
        </div>


        <div class="col-md-6">
            <button id="submit" type="submit" class="btn btn-sm btn-block btn-danger">Submit</button>
        </div>

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <!-- </div> -->
    </form>
</div>
@endsection