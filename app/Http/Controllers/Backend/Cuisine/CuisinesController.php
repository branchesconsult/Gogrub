<?php

namespace App\Http\Controllers\Backend\Cuisine;

use App\Models\Cuisine\Cuisine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Cuisine\CuisineRepository;
use App\Http\Requests\Backend\Cuisine\ManageCuisineRequest;
use App\Http\Requests\Backend\Cuisine\CreateCuisineRequest;
use App\Http\Requests\Backend\Cuisine\StoreCuisineRequest;
use App\Http\Requests\Backend\Cuisine\EditCuisineRequest;
use App\Http\Requests\Backend\Cuisine\UpdateCuisineRequest;
use App\Http\Requests\Backend\Cuisine\DeleteCuisineRequest;

/**
 * CuisinesController
 */
class CuisinesController extends Controller
{
    /**
     * variable to store the repository object
     * @var CuisineRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param CuisineRepository $repository ;
     */
    public function __construct(CuisineRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Cuisine\ManageCuisineRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageCuisineRequest $request)
    {
        return view('backend.cuisines.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateCuisineRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateCuisineRequest $request)
    {
        return view('backend.cuisines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCuisineRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCuisineRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.cuisines.index')->withFlashSuccess(trans('alerts.backend.cuisines.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Cuisine\Cuisine $cuisine
     * @param  EditCuisineRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuisine $cuisine, EditCuisineRequest $request)
    {
        return view('backend.cuisines.edit', compact('cuisine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCuisineRequestNamespace $request
     * @param  App\Models\Cuisine\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCuisineRequest $request, Cuisine $cuisine)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update($cuisine, $input);
        //return with successfull message
        return redirect()->route('admin.cuisines.index')->withFlashSuccess(trans('alerts.backend.cuisines.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteCuisineRequestNamespace $request
     * @param  App\Models\Cuisine\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuisine $cuisine, DeleteCuisineRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($cuisine);
        //returning with successfull message
        return redirect()->route('admin.cuisines.index')->withFlashSuccess(trans('alerts.backend.cuisines.deleted'));
    }

}
