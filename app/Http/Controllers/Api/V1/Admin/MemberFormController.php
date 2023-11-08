<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Mail\HotelMemberForm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MemberFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function hotelMemberForm(Request $request) {
        $formData = $request->all();

        $owner = $formData['owner'];
        $nrc_no = $formData['nrc_no'];
        $owner_phone = $formData['owner_phone'];
        $address = $formData['address'];
        $hotel_name = $formData['hotel_name'];
        $no_of_room = $formData['no_of_room'];
        $no_of_employee = $formData['no_of_employee'];
        $zone = $formData['zone'];
        $hotel_phone = $formData['hotel_phone'];
        $hotel_address = $formData['hotel_address'];
        $member_type = $formData['member_type'];

        if($request->file('owner_image')) {
            $imageName = $request->file('owner_image')->getClientOriginalName();
            $request->file('owner_image')->storeAs('public/images', $imageName);
        } else {
            $imageName = null;
        }

        $mailData = [
            'owner' => $owner,
            'nrc_no' => $nrc_no,
            'owner_phone' => $owner_phone,
            'owner_image' => $imageName ? url('storage/images/'.$imageName) : '',
            'address' => $address,
            'hotel_name' => $hotel_name,
            'no_of_room' => $no_of_room,
            'no_of_employee' => $no_of_employee,
            'zone' => $zone,
            'hotel_phone' => $hotel_phone,
            'hotel_address' => $hotel_address,
            'member_type' => $member_type,
        ];


        Mail::to('it.myanmarhotelier@gmail.com')->send(new HotelMemberForm($mailData));

        return response()->json(['message' => 'Form is submitted successfully']);
    }
}