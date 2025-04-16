<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // try {
        $data = [
            "password" => Hash::make($request->password),
            "user_name" => $request->user_name,
            "user_email" => $request->user_email,
            "user_phone" => $request->user_phone,
            "user_address" => $request->user_address,
        ];
        $validated = $request->validate([
            "user_name" => "required|regex:/^[a-zA-Z0-9\s]+$/",
            "user_email" => "required|email|unique:users,user_email",
            "user_phone" => "required|string|min:10|max:13",
            "user_address" => "required|regex:/^[^\r\n]*$/",
        ]);


        $create = User::create($data);

        return response()->json($create);
        // } catch (\Throwable $th) {
        //     return response()->json($th);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::find($id);

        if (is_null($data)) {
            return response()->json(['id' => $id], 400);
        }
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "user_name" => "required|regex:/^[a-zA-Z0-9\s]+$/",
            "user_email" => "required|email|unique:users,user_email," . $id . ",id",
            "user_phone" => "required|string|min:10|max:13",
            "user_address" => "required|regex:/^[^\r\n]*$/",
        ]);

        $data = [
            "password" => Hash::make($request->password),
            "user_name" => $request->user_name,
            "user_email" => $request->user_email,
            "user_phone" => $request->user_phone,
            "user_address" => $request->user_address,
        ];

        $update = User::where(['id' => $id])->update($data);

        return response()->json($update);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::where(['id' => $id])->delete();

        return response()->json($delete);
    }
}
