@extends('layouts.app')

@section('content')

    <div class="row">
        <h1>Organizations</h1>
    </div>

    @include('cards.organization', ["organization" => $organization])

@endSection
