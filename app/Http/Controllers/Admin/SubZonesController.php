<?php

namespace App\Http\Controllers\Admin;

use App\Models\Zone;
use App\Models\SubZone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubZoneRequest;
use App\Http\Requests\UpdateSubZoneRequest;

class SubZonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subZones = SubZone::with('zone')->paginate(15);

        return view('admin.subzones.index', compact('subZones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::pluck('name', 'id');

        return view('admin.subzones.create', compact('zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubZoneRequest $request)
    {
        SubZone::create($request->all());

        return redirect()->route('admin.sub_zones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubZone  $subZone
     * @return \Illuminate\Http\Response
     */
    public function show(SubZone $subZone)
    {
        $sub_zone = $subZone->load('zone');
        return view('admin.subzones.show', compact('sub_zone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubZone  $subZone
     * @return \Illuminate\Http\Response
     */
    public function edit(SubZone $subZone)
    {
        $sub_zone = $subZone->load('zone');
        $zones = Zone::pluck('name', 'id');

        return view('admin.subzones.edit', compact('sub_zone', 'zones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubZone  $subZone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubZoneRequest $request, SubZone $subZone)
    {
        $subZone->update($request->all());

        return redirect()->route('admin.sub_zones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubZone  $subZone
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubZone $subZone)
    {
        $subZone->delete();

        return redirect()->route('admin.sub_zones.index');
    }
}
