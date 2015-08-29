<?php

class WalkController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $current_date = new DateTime();
    $current_date->setTimezone(new DateTimeZone('America/New_York'));
    //return var_dump($current_date);
    $walks = Walk::where('finish', '>', $current_date)->get();
	  return View::make('walks.index')->withWalks($walks);	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    return View::make('walks.create');		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
  
    
    $validation = Validator::make(Input::all(), [
      'duration' => 'required | integer', 
      'pace' => 'required | integer',
      'dog_friendliness' => 'required | integer',
      'comments' => 'required'
    ]);

    if ( $validation->fails() ) {
      return Redirect::back()->withInput()->withErrors($validation->messages());
    }

    $walk = new Walk;

    $duration = Input::get('duration');
    $dog_friendliness = Input::get('dog_friendliness');
    $pace = Input::get('pace');
    $comments = Input::get('comments');
    $start = new DateTime;
    $start->setTimezone(new DateTimeZone('America/New_York'));
    $dateInterval = new DateInterval('PT'.$duration.'M');
    $finish = date_add($start, $dateInterval);
  
    $walk->start = $start;
    $walk->finish = $finish;
    $walk->host_id = Auth::user()->id;
    $walk->dog_friendliness = $dog_friendliness;
    $walk->pace = $pace;
    $walk->comments = $comments;

    if ( $walk->save() ) {
      return Redirect::route('walk.index');
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
