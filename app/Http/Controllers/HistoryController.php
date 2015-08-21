<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\PersonalInformation;
use App\Demand;
use App\Member;
use Redirect;
use App\History;
use Input;
use Session;
class HistoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$history=History::orderBy('id','desc')->paginate(10);
		$history->setPath('history');
		return view('history.index')->with('history',$history);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if($request['todate'])
		{
			$tdate=date("Y-m-d h:m:s",strtotime($request['todate']));
		}else{
			$tdate=date("Y-m-d h:m:s");

		}
		if($request['fromdate'])
		{
		$fdate=date("Y-m-d h:m:s",strtotime($request['fromdate']));
		 
		$historySearch = History::whereBetween('updated_at',[$fdate,$tdate])
						->orderBy('id','desc')->paginate(10);
						$historySearch->setPath('create');
			return view('history.index')->with('history',$historySearch);
		}else{
			return Redirect::to('history');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		$deletehistory = Input::get('list');	
			if($deletehistory)
			{		
				foreach($deletehistory as $delete)
				{
					$historydel = History::where('id',$delete)->delete();
				}
				Session::flash('message','Successfully deleted');
			}else{
				
			}		
		
		return Redirect::to('history');
	}

}
