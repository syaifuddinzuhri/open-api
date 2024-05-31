<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Traits\GlobalTrait;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    use GlobalTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $query = Restaurant::with(['category']);
            if (isset($request->category)) {
                $query->where('category_id', $request->category);
            }
            $result = $this->datatables($request, $query);
            return response()->success($result, 'Data berhasil didapatkan');
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(),  $e->getCode());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = Restaurant::with(['category'])->find($id);
            return response()->success($result, 'Data berhasil didapatkan');
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(),  $e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
