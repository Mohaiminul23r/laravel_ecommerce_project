<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;


class DatatablesController extends Controller
{
    public function getIndex()
	{
	    return view('category.index');
	}

	public function anyData()
	{
		$categories = Category::select('cat_name', 'description', 'status');
	    return Datatables::of($categories)->make(true);
	}

}
