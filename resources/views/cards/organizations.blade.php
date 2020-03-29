@foreach ($organizations->chunk($chunkSize ?? 4) as $orgChunks)
<div class="{{ $organizationsCardClass ?? 'card-group' }}">
    @foreach ($orgChunks as $organization)
    @include('cards.organization', ["organization" => $organization, "cardClass" => "$organizationCardClass"])
    @endforeach
</div>
@endforeach

