<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCastRequest;
use App\Models\Cast;
use App\Services\CastService;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function __construct(CastService $castService)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casts=Cast::get();
        return view('admin.cast.index',compact('casts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cast.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCastRequest $request , CastService $castService)
    {
        $data = $request->validated();
        $cast = $castService->addCast($data);
        $cast->addMediaFromRequest('image')
             ->toMediaCollection('images');
        return to_route('admincasts.index')->with('success','caster added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cast $cast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cast $cast)
    {
        return view('admin.cast.edit',compact('cast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCastRequest $request, $id ,CastService $castService)
    {
        $data = $request->validated();
        $cast = $castService->updateCast($data , $id);
        if($request->hasFile('image')){
            $cast->media()->delete();
            $cast->addMediaFromRequest('image')
                 ->toMediaCollection('images');
        }
        return to_route('admincasts.index')->with('success','caster updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cast $cast)
    {
        $cast->delete();
        return to_route('admincasts.index')->with('success','caster deleted successfully');

    }
}
