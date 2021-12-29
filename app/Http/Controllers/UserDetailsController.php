<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use Illuminate\Http\Request;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $getAllUsers=UserDetails::all();
        return response()->json($getAllUsers);
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
        //validate details from form
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required',
            'place' => 'required',
        ]);
        //insert new data to db
        $userData=UserDetails::create([
            'name'  => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'place' => $request->place
        ]);
        if($userData->save()){
            return response()->json(['status' => '1' ,'message' => 'New user created']);
        }else{
            return response()->json(['status' => '0' ,'message' => 'User creation failed']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetails $userDetails,$id)
    {
        //
        $getUser=$userDetails->find($id);
        return response()->json($getUser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetails $userDetails)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDetails $userDetails,$id)
    {
        //validate details from form
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required',
            'place' => 'required',
        ]);
        //get user details
        $getUser=$userDetails->find($id);
        //update user data
        $updateUserData=$getUser->update([
            'name'  => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'place' => $request->place,
        ]);
        if($updateUserData){
            return response()->json(['status' => '1','message' => 'User details updated']);
        }else{
            return response()->json(['status' => '0','message' => 'User details updation failed']);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetails $userDetails,$id)
    {
        //get user details
        $getUser= $userDetails->find($id);
        //delete user
        if($getUser->delete()){
            return response()->json(['status' => '1','message' => 'User deleted']);
        }else{
            return response()->json(['status' => '0','message' => 'User deletion failed']);
        }
    }
}
