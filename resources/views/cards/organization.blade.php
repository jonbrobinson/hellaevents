<div class="{{ $cardClass }}" >
    <div class="card-body">
        <a ><h5 class="card-title">{{ $organization->name }}</h5></a>
        <p class="card-text">{{ $organization->description }}</p>
        @if (!empty($organization->website))
        <a class="card-text" href="{{ $organization->website }}"><i class="fa fa-code"></i> {{ $organization->domain }}</a>
        @endif
        @if (!empty($organization->phone))
        <p class="card-text"><i class="fa fa-phone"></i> {{ $organization->phone }}</p>
        @endif
    </div>
    <div class="card-footer">
        @if (!empty($organization->socialAccounts) && count($organization->socialAccounts) > 0)
        @foreach($organization->socialAccounts as $socialAccount)
        <a href="{{$socialAccount->socialAccountType->url}}/{{$socialAccount->handle}}" class="card-link">
            <i class="fa fa-{{ strtolower($socialAccount->socialAccountType->name) }}"></i>
        </a>
        @endforeach
        @endif
    </div>
</div>
