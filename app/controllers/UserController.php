<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    return Response::view('users/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $validation = Validator::make(Input::all(), [
      'name' => 'required',
      'username' => 'required',
      'gender' => 'required',
      'email' => 'required',
      'street' => 'required',
      'city' => 'required',
      'state' => 'required',
      'zip' => 'required',
      'password' => 'required | min:6',
      'confirm_password' => 'required | same:password'
    ]);

    if ($validation->fails()) {
      return Redirect::back()->withInput()->withErrors($validation->messages());
    }

    $user = new User;
    $user->name = Input::get('name');
    $user->username = Input::get('username');
    $user->gender = Input::get('gender');
    $user->email = Input::get('email');
    $user->street = Input::get('street');
    $user->city = Input::get('city');
    $user->state = Input::get('state');
    $user->zip = Input::get('zip');
    $user->password = Hash::make(Input::get('password'));
    $street = preg_replace("/ /", "+", $user->street);
    $city = preg_replace("/ /", "+", $user->city);
    $state= preg_replace("/ /", "+", $user->state);
    $req = "https://maps.googleapis.com/maps/api/geocode/json?address=$street+$city+$state&key=AIzaSyCDbTrFVp4DI6i5Sg25KpJJ6cMIIW58TgI";
    $response = file_get_contents($req);
    $user->xCoordinate = 0;
    $user->yCoordinate = 0;
    $decode = (array)json_decode($response);     
    $decode = (array)$decode["results"][0];
    $decode = (array)$decode["geometry"];
    $decode = (array)$decode["location"];
    $user->xCoordinate = $decode["lat"];
    $user->yCoordinate = $decode["lng"];
    if ( $user->save() ) {
      Auth::attempt(Input::only('username', 'password'));
      return Redirect::to('/');
    } else {
      return Redirect::back()->withInput();
    } 
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
