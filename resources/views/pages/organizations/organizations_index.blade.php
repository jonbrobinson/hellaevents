@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 d-flex align-items-center">
            <h1 class="pr-1">Organizations </h1>
            <h5><a href="/organizations/create" class="badge badge-primary align-baseline">Create Organization</a></h5>
        </div>
    </div>

    <div class="row">
        @includeIf('cards.organizations', [
            "organizations" => $organizations,
            "organizationsCardClass" => "card-deck",
            "organizationCardClass" => "card",
            "chunkSize" => 3])
    </div>

@endSection
