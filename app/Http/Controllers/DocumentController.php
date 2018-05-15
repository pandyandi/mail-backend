<?php

namespace App\Http\Controllers;

use DB;
use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
    	$model = DB::table('document')
    		->get();

    	return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }

    public function detail(Request $request)
    {
    	$id = $request->id;

    	$model = DB::table('document')
    		->where('id', $id)
    		->first();

    	return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }

    public function store(Request $request)
    {
        $model = new Document;
        if ($request->input('id'))
            $model = Document::find($request->input('id'));

        $model->name = $request->input('name');
        $model->description = $request->input('description');
        $model->status = $request->input('status');
        $model->category_id = $request->input('category_id');

        if($model->save())
	       	return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }

    public function delete(Request $request)
    {
    	$id = $request->id;
        
        $model = Document::find($id);

        if ($model->delete())
            return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }

}
