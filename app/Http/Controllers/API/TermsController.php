<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Term\TermFacade as Term;
use App\Models\Term as TermModel;

class TermsController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        $paginate=isset($request->paginate)?$request->paginate:10;
        $success['terms']=Term::index(['*'],[],[],$paginate);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function store(Request $request)
    {
        $request->validate([
            'months' => 'required|unique:terms,months',
        ]);
        $success = Term::create($request);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function update(Request $request,TermModel $term)
    {
        $request->validate([
            'months' => 'required|unique:terms,months,'.$term->id,
        ]);
        $success=Term::update($term->id,$request);
        return response()->json(['success' => 'success'], $this->successStatus);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    \App\OrderDetail  $client
    * @return  \Illuminate\Http\Response
    */
    public function destroy(TermModel $term)
    {
        $success=Term::delete($term->id);
        return response()->json(['success' => $success], $this->successStatus);
    }

}
