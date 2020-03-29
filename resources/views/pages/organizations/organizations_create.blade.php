@extends('layouts.app')


@section('content')

<div>
    <h1>Create Organization</h1>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/organizations/store" method="POST">
    @csrf
    <div class="form-group">
        <label for="org[name]">Name</label>
        <input type="hidden" name="name">
        <input type="text" class="form-control {{ $errors->has('org.name') ? 'is-invalid' : "" }}" id="org-name"
            name="org[name]" aria-describedby="orgName" value="{{ old('org.name') }}">
        @if ( $errors->has('org.name'))
        <div class="invalid-feedback">
            {{ $errors->first('org.name') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="org[description]">Description</label>
        <input type="hidden" name="description">
        <textarea class="form-control {{ $errors->has('org.description') ? 'is-invalid' : "" }}" id="org-description"
            name="org[description]">{{ old('org.description') }}</textarea>
        @if ( $errors->has('org.description'))
        <div class="invalid-feedback">
            {{ $errors->first('org.description') }}
        </div>
        @endif
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="org[website]">Website</label>
            <input type="hidden" name="website">
            <input type="text" class="form-control {{ $errors->has('org.website') ? 'is-invalid' : "" }}"
                id="org-website" name="org[website]" aria-describedby="orgWebsiteInput" value="{{ old('org.website') }}">
            @if ( $errors->has('org.website'))
            <div class="invalid-feedback">
                {{ $errors->first('org.website') }}
            </div>
            @endif
        </div>
        <div class="col-md-4 mb-3">
            <label for="org[email]">Email</label>
            <input type="hidden" name="email">
            <input type="email" class="form-control {{ $errors->has('org.email') ? 'is-invalid' : "" }}"
                id="org-email" name="org[email]" aria-describedby="org-email" value="{{ old('org.email') }}">
            @if ( $errors->has('org.email'))
            <div class="invalid-feedback">
                {{ $errors->first('org.email') }}
            </div>
            @endif
        </div>
        <div class="col-md-4 mb-3">
            <label for="org[phone]">Phone</label>
            <input type="hidden" name="phone">
            <input type="text" class="form-control {{ $errors->has('org.phone') ? 'is-invalid' : "" }} phone-format"
                id="org-phone" name="org[phone]" aria-describedby="org-phone" value="{{ old('org[phone]') }}" maxlength="12" placeholder="(555)-44-3333">
        </div>
        @if ( $errors->has('org.phone'))
        <div class="invalid-feedback">
            {{ $errors->first('org.phone') }}
        </div>
        @endif
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="address[address1]">Address Line 1</label>
            <input type="hidden" name="address1">
            <input type="text" class="form-control {{ $errors->has('address.address1') ? 'is-invalid' : "" }}"
                id="address-address1" name="address[address1]" value="{{ old('address.address1') }}" placeholder="123 Main St">
            @if ( $errors->has("address.address1"))
            <div class="invalid-feedback">
                {{ $errors->first("address.address1") }}
            </div>
            @endif
        </div>
        <div class="col-md-6 mb-3">
            <label for="address[address2]">Address Line 2</Address></label>
            <input type="hidden" name="address2">
            <input type="text" class="form-control {{ $errors->has('address.address2') ? 'is-invalid' : "" }}"
                id="address-address2" name="address[address2]" value="{{ old('address.address2') }}"
                placeholder="Suite, Apt, Etc">
            @if ( $errors->has('address.address2'))
            <div class="invalid-feedback">
                {{ $errors->first('address.address2') }}
            </div>
            @endif
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="address[city]">City</label>
            <input type="hidden" name="city">
            <input type="text" class="form-control {{ $errors->has('address.city') ? 'is-invalid' : "" }}"
                id="address-city" name="address[city]" value="{{ old('address.city') }}">
            @if ( $errors->has("address.city"))
            <div class="invalid-feedback">
                {{ $errors->first("address.city") }}
            </div>
            @endif
        </div>
        <div class="col-md-3 mb-3">
            <label for="address[state]">State</label>
            <input type="hidden" name="state">
            <select class="custom-select" id="address-state" name="address[state]">
                <option {{ old('address.state') ? "" : "selected" }} disabled value="">Pick a State</option>
                <option {{ old('address.state') == "AL" ? "selected" : ""}} value="AL">Alabama</option>
                <option {{ old('address.state') == "AK" ? "selected" : ""}} value="AK">Alaska</option>
                <option {{ old('address.state') == "AZ" ? "selected" : ""}} value="AZ">Arizona</option>
                <option {{ old('address.state') == "AR" ? "selected" : ""}} value="AR">Arkansas</option>
                <option {{ old('address.state') == "CA" ? "selected" : ""}} value="CA">California</option>
                <option {{ old('address.state') == "CO" ? "selected" : ""}} value="CO">Colorado</option>
                <option {{ old('address.state') == "CT" ? "selected" : ""}} value="CT">Connecticut</option>
                <option {{ old('address.state') == "DE" ? "selected" : ""}} value="DE">Deleware</option>
                <option {{ old('address.state') == "FL" ? "selected" : ""}} value="FL">Florida</option>
                <option {{ old('address.state') == "GA" ? "selected" : ""}} value="GA">Georgia</option>
                <option {{ old('address.state') == "HI" ? "selected" : ""}} value="HI">Hawaii</option>
                <option {{ old('address.state') == "ID" ? "selected" : ""}} value="ID">Idaho</option>
                <option {{ old('address.state') == "IL" ? "selected" : ""}} value="IL">Illinois</option>
                <option {{ old('address.state') == "IN" ? "selected" : ""}} value="IN">Indiana</option>
                <option {{ old('address.state') == "KS" ? "selected" : ""}} value="KS">Kansas</option>
                <option {{ old('address.state') == "KY" ? "selected" : ""}} value="KY">Kentucky</option>
                <option {{ old('address.state') == "LA" ? "selected" : ""}} value="LA">Louisiana</option>
                <option {{ old('address.state') == "ME" ? "selected" : ""}} value="ME">Maine</option>
                <option {{ old('address.state') == "MD" ? "selected" : ""}} value="MD">Maryland</option>
                <option {{ old('address.state') == "MA" ? "selected" : ""}} value="MA">MAssachusetts</option>
                <option {{ old('address.state') == "MI" ? "selected" : ""}} value="MI">Michigan</option>
                <option {{ old('address.state') == "MN" ? "selected" : ""}} value="MN">Minnesota</option>
                <option {{ old('address.state') == "MS" ? "selected" : ""}} value="MS">Mississippi</option>
                <option {{ old('address.state') == "MO" ? "selected" : ""}} value="MO">Missouri</option>
                <option {{ old('address.state') == "MT" ? "selected" : ""}} value="MT">Montana</option>
                <option {{ old('address.state') == "NE" ? "selected" : ""}} value="NE">Nebraska</option>
                <option {{ old('address.state') == "NV" ? "selected" : ""}} value="NV">Nevada</option>
                <option {{ old('address.state') == "NH" ? "selected" : ""}} value="NH">New Hampshire</option>
                <option {{ old('address.state') == "NJ" ? "selected" : ""}} value="NJ">New Jersey</option>
                <option {{ old('address.state') == "NM" ? "selected" : ""}} value="NM">New Mexico</option>
                <option {{ old('address.state') == "NY" ? "selected" : ""}} value="NY">New York</option>
                <option {{ old('address.state') == "NC" ? "selected" : ""}} value="NC">North Carolina</option>
                <option {{ old('address.state') == "ND" ? "selected" : ""}} value="ND">North Dakota</option>
                <option {{ old('address.state') == "OH" ? "selected" : ""}} value="OH">Ohio</option>
                <option {{ old('address.state') == "OK" ? "selected" : ""}} value="OK">Oklahoma</option>
                <option {{ old('address.state') == "OR" ? "selected" : ""}} value="OR">Oregon</option>
                <option {{ old('address.state') == "PA" ? "selected" : ""}} value="PA">Pennsylvania</option>
                <option {{ old('address.state') == "RI" ? "selected" : ""}} value="RI">Rhode Island</option>
                <option {{ old('address.state') == "SC" ? "selected" : ""}} value="SC">South Carolina</option>
                <option {{ old('address.state') == "SD" ? "selected" : ""}} value="SD">South Dakota</option>
                <option {{ old('address.state') == "TN" ? "selected" : ""}} value="TN">Tennessee</option>
                <option {{ old('address.state') == "TX" ? "selected" : ""}} value="TX">Texas</option>
                <option {{ old('address.state') == "UT" ? "selected" : ""}} value="UT">Utah</option>
                <option {{ old('address.state') == "VT" ? "selected" : ""}} value="VT">Vermont</option>
                <option {{ old('address.state') == "VA" ? "selected" : ""}} value="VA">Virginia</option>
                <option {{ old('address.state') == "WA" ? "selected" : ""}} value="WA">Washington</option>
                <option {{ old('address.state') == "WV" ? "selected" : ""}} value="WV">West Virginia</option>
                <option {{ old('address.state') == "WI" ? "selected" : ""}} value="WI">Wisconsin</option>
                <option {{ old('address.state') == "WY" ? "selected" : ""}} value="WY">Wyoming</option>
            </select>
            @if ( $errors->has("address.state"))
            <div class="invalid-feedback">
                {{ $errors->first("address.state") }}
            </div>
            @endif
        </div>
        <div class="col-md-3 mb-3">
            <label for="address[zip]">Zip</label>
            <input type="hidden" name="zip">
            <input type="text" class="form-control {{ $errors->has('address.zip') ? 'is-invalid' : "" }}"
                id="address-zip" name="address[zip]" value="{{ old('address.zip') }}" maxlength="5">
            @if ( $errors->has("address.zip"))
            <div class="invalid-feedback">
                {{ $errors->first("address.zip") }}
            </div>
            @endif
        </div>
    </div>

    @if (!empty($accounts))
    <div class="form-row">
        <div class="col-auto">
            <div class="input-group mb-3">
                @foreach ($accounts as $account)
                @if($account->code == "unk" || $account->code == "noso")
                @continue
                @endif
                <input type="hidden" name="social-account-{{ $account->id }}">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-{{ strtolower($account->name) }}"></i></div>
                </div>
                <input type="text" class="form-control {{ $errors->has("social.{$account->name}") ? 'is-invalid' : "" }}"
                    id="social-{{ $account->name }}" name="social[{{ $account->name }}]" alt="{{ $account->name }}"
                    placeholder="{{ "@".$account->name }}" value="{{ old("social.{$account->name}") }}">
                @if ( $errors->has("social.{$account->name}"))
                <div class="invalid-feedback">
                    {{ $errors->first("social.{$account->name}") }}
                </div>
                @endif
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endSection

@section('bottom_js')
<script>
    $(document).ready(function(){
    /***phone number format***/
    $(".phone-format").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which> 57)) {
            return false;
            }
            var curchr = this.value.length;
            var curval = $(this).val();
            if (curchr == 3 && curval.indexOf("(") <= -1) {
                $(this).val("(" + curval + ")" + "-" );
            } else if (curchr==4 && curval.indexOf("(")> -1) {
                $(this).val(curval + ")-");
            } else if (curchr == 5 && curval.indexOf(")") > -1) {
                $(this).val(curval + "-");
            } else if (curchr == 9) {
                $(this).val(curval + "-");
                $(this).attr('maxlength', '14');
            }
        });
    });
</script>

@endsection
