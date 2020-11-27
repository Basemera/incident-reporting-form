@extends('layouts.app')
@section('content')

<div>
    <div class="jumbotron">

        @if ($mail_errors ?? '')
        <div class="alert alert-warning" role="alert">

            <h1>Incident report not successfully submitted.</h1>
            <p>
                Failed with the following error
            </p>
            @foreach ($mail_errors as $mail_error)
            <li> {{ $mail_error }} </li>
            @endforeach

            <p>Would you like to try again.</p>
            <a class="btn btn-primary btn-lg" href="/incident-form" role="button">Yes</a>
            <a class="btn btn-primary btn-lg" href="http://rapidup.bothofus.se/?redirect=%2Fleave%2Fform" role="button">No</a>
        </div>
        @elseif ($form_error ?? '')
        <div class="alert alert-warning" role="alert">

            <h1>Incident report not successfully submitted.</h1>
            <p>
                {{ $form_error }}
            </p>

            <p>Would you like to try again.</p>
            <a class="btn btn-primary btn-lg" href="/incident-form" role="button">Yes</a>
            <a class="btn btn-primary btn-lg" href="http://rapidup.bothofus.se/?redirect=%2Fleave%2Fform" role="button">No</a>
        </div>

        @else
        <div class="alert alert-success" role="alert">

            <h1>Successfully submitted incident report</h1>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="/incident-form" role="button">Back to form</a>
            <a class="btn btn-primary btn-lg" href="http://rapidup.bothofus.se/?redirect=%2Fleave%2Fform" role="button">Home page</a>
        </div>
        @endif

    </div>

</div>