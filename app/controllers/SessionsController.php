<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    return Response::view('sessions/create');
	}

 /**
  * Authenticate the User
  *
  * @return redirect to home page
  */
  public function store()
  {
    $validation = Validator::make(Input::all(), [
      'username' => 'required',
      'password' => 'required'
    ]);

    if ($validation->fails() ) {
      return Redirect::back()->withInput()->withErrors($validation->messages());
    }

    if (Auth::attempt(Input::only('username', 'password'))) {
      return Redirect::to('/');  
    }
  }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
    Auth::logout();
    return Redirect::to('/login');
	}


}
