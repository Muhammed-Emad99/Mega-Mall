<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use App\Services\GeneralService;
use Illuminate\Http\Request;
use function Termwind\render;

class CountryStateCityController extends Controller
{

    protected $generalService;

    public function __construct(GeneralService $generalService)
    {
        return $this->generalService = $generalService;
    }

    public function getStates($id)
    {
        $states = $this->generalService->getStates($id);
        $view = view('admin.profiles.partials.state', ['states' => $states])->render();
        return response()->json(['html' => $view]);
    }

    public function getCities($id)
    {
        $cities = $this->generalService->getCities($id);
        $view = view('admin.profiles.partials.city', ['cities' => $cities])->render();
        return response()->json(['html' => $view]);
    }
}
