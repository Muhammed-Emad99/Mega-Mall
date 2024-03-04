<option value="0" selected>--Please choose an option--</option>
@foreach($cities as $city)
    <option
        value="{{ $city->id }}" @selected(old('city') == $city->id)>{{ ucwords($city->name) }}</option>
@endforeach
