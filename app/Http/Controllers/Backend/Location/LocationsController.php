<?php

namespace App\Http\Controllers\Backend\Location;

use App\Http\Middleware\Localization;
use App\Models\Location\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Location\LocationRepository;
use App\Http\Requests\Backend\Location\ManageLocationRequest;
use App\Http\Requests\Backend\Location\CreateLocationRequest;
use App\Http\Requests\Backend\Location\StoreLocationRequest;
use App\Http\Requests\Backend\Location\EditLocationRequest;
use App\Http\Requests\Backend\Location\UpdateLocationRequest;
use App\Http\Requests\Backend\Location\DeleteLocationRequest;

/**
 * LocationsController
 */
class LocationsController extends Controller
{
    /**
     * variable to store the repository object
     * @var LocationRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param LocationRepository $repository ;
     */
    public function __construct(LocationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Location\ManageLocationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageLocationRequest $request)
    {
        $data['locationable_type'] = '';
        if ($request->has('chef_id')) {
            $data['locationable_type'] = Location::USER_ROLES['Chef'];
            $data['locationable_id'] = $request->chef_id;
            $data['hasLocation'] = (boolean)Location::where('locationable_id', $request->chef_id)->get()->count();
        } else {
            die('Location url is invalid');
        }
        return view('backend.locations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateLocationRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateLocationRequest $request)
    {
        $data['locationable_type'] = '';
        if ($request->has('chef_id')) {
            $data['locationable_type'] = Location::USER_ROLES['Chef'];
            $data['locationable_id'] = $request->chef_id;
        } else {
            die('Location url is invalid');
        }
        $data['user_id'] = $request->chef_id;
        $data['province'] = Location::PROVINCES;
        return view('backend.locations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreLocationRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.locations.index')->withFlashSuccess(trans('alerts.backend.locations.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Location\Location $location
     * @param  EditLocationRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location, EditLocationRequest $request)
    {
        $data['locationable_type'] = '';
        if ($request->has('chef_id')) {
            $data['locationable_type'] = Location::USER_ROLES['Chef'];
            $data['locationable_id'] = $request->chef_id;
        } else {
            die('Location url is invalid');
        }
        $data['user_id'] = $request->chef_id;
        $data['province'] = Location::PROVINCES;
        $data['location'] = $location;
        return view('backend.locations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateLocationRequestNamespace $request
     * @param  App\Models\Location\Location $location
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update($location, $input);
        //return with successfull message
        return redirect()->route('admin.locations.index')->withFlashSuccess(trans('alerts.backend.locations.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteLocationRequestNamespace $request
     * @param  App\Models\Location\Location $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location, DeleteLocationRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($location);
        //returning with successfull message
        return redirect()->route('admin.locations.index')->withFlashSuccess(trans('alerts.backend.locations.deleted'));
    }

}
