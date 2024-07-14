<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function getAllProvinces(Request $request){
        $province = Province::all();
        return response()->json(
            [
                'data' => $province,
            ]
        );
    }

    public function getRegenciesByProvince(Request $request, $province_id)
    {
        $province = Province::find($province_id);

        if (!$province) {
            return response()->json([
                'message' => 'Province not found'
            ], 404);
        }

        $regencies = Regency::where('province_id', $province_id)->get();

        return response()->json([
            'data' => $regencies,
        ]);
    }

    public function getDistrictsByRegency(Request $request, $regency_id)
    {
        $regency = Regency::find($regency_id);

        if (!$regency) {
            return response()->json([
                'message' => 'Regency not found'
            ], 404);
        }

        $districts = District::where('regency_id', $regency_id)->get();

        return response()->json([
            'data' => $districts,
        ]);
    }

    public function getVillagesByDistrict(Request $request, $district_id)
    {
        $district = District::find($district_id);

        if (!$district) {
            return response()->json([
                'message' => 'District not found'
            ], 404);
        }

        $villages = Village::where('district_id', $district_id)->get();

        return response()->json([
            'data' => $villages,
        ]);
    }

}
