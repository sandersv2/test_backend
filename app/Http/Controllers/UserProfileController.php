<?php

namespace App\Http\Controllers;

use App\Models\UserProfileModel;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UserProfileModel::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "user_name" => "required|regex:/^[a-zA-Z0-9\s]+$/",
            "user_email" => "required|email|unique:table,column,except,id",
            "user_phone" => "required|",
            "user_address" => "",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
