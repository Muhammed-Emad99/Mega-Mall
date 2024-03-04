<option value="0" selected>--Please choose an option--</option>
@foreach($states as $state)
    <option
        value="{{ $state->id }}" @selected(old('state') == $state->id)>{{ ucwords($state->name) }}</option>
@endforeach

