<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $sortable = ['name', 'id', 'created_at', 'updated_at', 'email'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->has('sort') && in_array($request->sort, $this->sortable)) {
            $sort = $request->sort;
        } else {
            $sort = 'id';
        }
        if ($request->has('sortType') && strtoupper($request->sortType) == 'DESC') {
            $sortType = 'DESC';
        } else {
            $sortType = 'ASC';
        }
        if ($request->has('limit')) {
            $limit = abs((int) $request->limit);
        } else {
            $limit = 10;
        }

        $paginated = User::orderBy($sort, $sortType)->paginate($limit);
        $paginated->appends($request->input());
        return response()->json($paginated,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return User::whereId($user->id)->with('products','posts')->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
