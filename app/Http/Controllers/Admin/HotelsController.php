<?php

namespace App\Http\Controllers\Admin;

use App\Models\Zone;
use App\Models\Hotel;
use App\Models\SubZone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreHotelsRequest;
use App\Http\Requests\UpdateHotelsRequest;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::with('sub_zone', 'zone')->orderBy('created_at', 'desc')->get();

        $zoneName = 'All';

        return view('admin.hotels.index', compact('hotels', 'zoneName'));
    }

    public function hotelsByZone($zone) {
        $zoneName = $zone;

        $zone_id = Zone::firstWhere('name', $zoneName)->id;

        $hotels = Hotel::where('zone_id', $zone_id)->orderBy('created_at', 'desc')->get();

        return view('admin.hotels.index', compact('hotels', 'zoneName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $zones = Zone::pluck('name', 'id');
        $sub_zones = SubZone::pluck('name', 'id');
        $zoneName = $request->zone;

        return view('admin.hotels.create', compact('zones', 'sub_zones', 'zoneName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHotelsRequest $request)
    {
        $hotel = Hotel::create($request->all());

        if($request->hasFile('image')) {
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $fileName);

            $hotel->update(['image' => $fileName]);
        }

        $zoneName = Zone::find($request->zone_id)->name;

        return redirect()->route('admin.hotels.byzone', ['zone' => $zoneName]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        $hotel = $hotel->load('zone', 'sub_zone');
        return view('admin.hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $hotel = $hotel->load('zone', 'sub_zone');
        $zones = Zone::pluck('name', 'id');
        $sub_zones = SubZone::pluck('name', 'id');

        return view('admin.hotels.edit', compact('hotel', 'zones', 'sub_zones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelsRequest $request, Hotel $hotel)
    {

        $fileName = $hotel->image;
        if($request->hasFile('image')) {
            if($fileName) {
                Storage::disk('public')->delete('images/'.$fileName);
            }

            $newFileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $newFileName);
        }

        $hotel->update($request->all());
        $hotel->update(['image' => $request->hasFile('image') ? $newFileName : $fileName]);

        return redirect()->route('admin.hotels.index');


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


    // ajax route function
    public function zoneSelect(Request $request) {
        $zoneName = $request->zoneName;
        $zones = Zone::all();

        if($zoneName == 'All') {
            $option = "<option value='' > Choose zone</option>";

            foreach($zones as $zone) {
                $option .= "<option value= '$zone->id'>$zone->name</option>";
            }

            return response([
                'option' => $option
            ]);
        } else {
            $selectedZone = Zone::whereName($zoneName)->first();

            $option = "<option value='' > Choose zone</option>";

            foreach($zones as $zone) {
                $isSelected = $zone->id === $selectedZone->id ? 'selected' : '';
                $option .= "<option value='$zone->id' $isSelected>$zone->name</option>";
            }

            return response([
                'option' => $option
            ]);
        }
    }

    public function subzoneSelect(Request $request) {
       $zoneName = $request->zoneName;
       $subzones = Zone::whereName($zoneName)->first()->sub_zones;

       $option = "<option value=''>Choose Sub Zone</option>";

       foreach($subzones as $subzone) {
            $option .= "<option value = '$subzone->id'>$subzone->name</option>";
       }

        return response([
            'option' => $option
        ]);
    }
}
