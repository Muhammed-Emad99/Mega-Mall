<?php

namespace App\Services;

use App\Models\City;
use App\Models\State;

class GeneralService
{
    public function getStates($id)
    {
        $states = State::where('country_id', $id)->get();
        // Render the partial view with the data
        return $states;
    }

    public function getCities($id)
    {
        $cities = City::where('state_id', $id)->get();
        // Render the partial view with the data
        return $cities;
    }
}
