<?php

namespace App\Http\Controllers;

use App\Models\SubscribeUsers;
use Illuminate\Http\Request;

class SubscribeUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeTokens(Request $request)
    {



        $validation = Validator($request->all([
            'user_email' => 'required',
            'device_id' => 'required'
        ]));

        if ($validation->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Error',
                'code' => '200',
            ]);
        } else {
            $subscribeUser = SubscribeUsers::where('user_email',$request->user_email)->first();
            if(isset($subscribeUser)){
                // $user = new SubscribeUsers();
                $subscribeUser->update([
                    'device_id'=>$request->device_id,
                ]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'User updated',
                    'code' => '200',
                    'result' => $subscribeUser,
                ]);
            }
            else{
                $user = new SubscribeUsers();
                $user->user_email = $request->user_email;
                $user->device_id = $request->device_id;
                $result = $user->save();
                if ($result) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Data saved',
                        'code' => '200',
                    ]);
                } else {
                    return response()->json([
                        'status' => 'failed',
                        'message' => 'Data not saved',
                        'code' => '404',
                    ]);
                }
            }

        }
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
     * @param  \App\Models\SubscribeUsers  $subscribeUsers
     * @return \Illuminate\Http\Response
     */
    public function getToken(Request $request)
    {
        $validation = Validator($request->all([
            'user_email' => 'required',
        ]));

        if ($validation->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Please add User Token',
                'code' => '200',
            ]);
        } else {
            $user = new SubscribeUsers();

            $result = SubscribeUsers::where('user_email', $request->user_email)->first();

            // $user = SubscribeUsers::find($request->user_email);

            if (is_null($result)) {
                return response()->json([
                    'status' => 'failed',
                    'code' => '401',
                    'message' => 'User not found',
                ], 404);
            } else {
                return response()->json([
                    'status' => 'success',
                    'code' => '200',
                    'response' => $result,
                ]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubscribeUsers  $subscribeUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscribeUsers $subscribeUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubscribeUsers  $subscribeUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubscribeUsers $subscribeUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscribeUsers  $subscribeUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscribeUsers $subscribeUsers)
    {
        //
    }
}
