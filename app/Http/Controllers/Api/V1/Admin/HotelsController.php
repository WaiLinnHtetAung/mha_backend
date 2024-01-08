<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Zone;
use App\Models\Hotel;
use App\Models\SubZone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $zoneNameSlug = $request->zoneName;
        $zoneId = Zone::whereSlug($zoneNameSlug)->first()->id;
        $hotels = Zone::findOrFail($zoneId)->hotels()->paginate(32);
        $subzones = Zone::whereSlug($zoneNameSlug)->first()->sub_zones;

        return response()->json([
            'status' => true,
            'hotels' => $hotels,
            'subzones' => $subzones,
            'zoneId' => $zoneId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
    }

    //hotelsBySubzone
    public function hotelsBySubzone(Request $request)
    {
        $subzoneId = $request->subzoneId;
        logger($request->subzoneId);

        if (substr($subzoneId, 0, 8) == 'zonename') {

            $zoneName = substr($subzoneId, 8);
            $hotels = Zone::whereSlug($zoneName)->first()->hotels()->paginate(32);

            return response()->json([
                'status' => true,
                'hotels' => $hotels
            ]);

        } else {
            $hotels = SubZone::findOrFail($subzoneId)->hotels()->orderBy('created_at', 'desc')->paginate(32);


            return response()->json([
                'status' => true,
                'hotels' => $hotels
            ]);
        }

    }

    //search Hotels
    public function searchHotels(Request $request)
    {
        $query = $request->search;

        if (isset($query)) {
            $hotels = Hotel::where('name', 'like', "%$query%")->get();
        } else {
            $hotels = [];
        }


        return response()->json([
            'status' => true,
            'hotels' => $hotels,
        ]);
    }
}