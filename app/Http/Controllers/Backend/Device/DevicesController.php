<?php

namespace App\Http\Controllers\Backend\Device;

use App\Models\Device\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Device\DeviceRepository;
use App\Http\Requests\Backend\Device\ManageDeviceRequest;
use App\Http\Requests\Backend\Device\CreateDeviceRequest;
use App\Http\Requests\Backend\Device\StoreDeviceRequest;
use App\Http\Requests\Backend\Device\EditDeviceRequest;
use App\Http\Requests\Backend\Device\UpdateDeviceRequest;
use App\Http\Requests\Backend\Device\DeleteDeviceRequest;

/**
 * DevicesController
 */
class DevicesController extends Controller
{
    /**
     * variable to store the repository object
     * @var DeviceRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param DeviceRepository $repository;
     */
    public function __construct(DeviceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Device\ManageDeviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageDeviceRequest $request)
    {
        return view('backend.devices.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateDeviceRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateDeviceRequest $request)
    {
        return view('backend.devices.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDeviceRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.devices.index')->withFlashSuccess(trans('alerts.backend.devices.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Device\Device  $device
     * @param  EditDeviceRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device, EditDeviceRequest $request)
    {
        return view('backend.devices.edit', compact('device'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDeviceRequestNamespace  $request
     * @param  App\Models\Device\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceRequest $request, Device $device)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $device, $input );
        //return with successfull message
        return redirect()->route('admin.devices.index')->withFlashSuccess(trans('alerts.backend.devices.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteDeviceRequestNamespace  $request
     * @param  App\Models\Device\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device, DeleteDeviceRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($device);
        //returning with successfull message
        return redirect()->route('admin.devices.index')->withFlashSuccess(trans('alerts.backend.devices.deleted'));
    }
    
}
