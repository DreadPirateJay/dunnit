<?php

namespace Dunnit\Http\Controllers;

use Dunnit\Http\Controllers\Controller;
use Dunnit\Http\Requests;
use Dunnit\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Todo model
     *
     * @var Dunnit\Models\Todo
     */
    protected $todos;

    /**
     * Constructor
     *
     * @param Dunnit\Models\Todo $todos
     */
    function __construct(Todo $todos) {
        $this->todos = $todos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json($this->todos->all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
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
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
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
