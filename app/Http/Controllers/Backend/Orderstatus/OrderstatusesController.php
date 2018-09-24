<?php

namespace App\Http\Controllers\Backend\Orderstatus;

use App\Models\Orderstatus\Orderstatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Orderstatus\OrderstatusRepository;
use App\Http\Requests\Backend\Orderstatus\ManageOrderstatusRequest;
use App\Http\Requests\Backend\Orderstatus\CreateOrderstatusRequest;
use App\Http\Requests\Backend\Orderstatus\StoreOrderstatusRequest;
use App\Http\Requests\Backend\Orderstatus\EditOrderstatusRequest;
use App\Http\Requests\Backend\Orderstatus\UpdateOrderstatusRequest;
use App\Http\Requests\Backend\Orderstatus\DeleteOrderstatusRequest;

/**
 * OrderstatusesController
 */
class OrderstatusesController extends Controller
{
    /**
     * variable to store the repository object
     * @var OrderstatusRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param OrderstatusRepository $repository;
     */
    public function __construct(OrderstatusRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Orderstatus\ManageOrderstatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageOrderstatusRequest $request)
    {
        return view('backend.orderstatuses.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateOrderstatusRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateOrderstatusRequest $request)
    {
        return view('backend.orderstatuses.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreOrderstatusRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderstatusRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.orderstatuses.index')->withFlashSuccess(trans('alerts.backend.orderstatuses.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Orderstatus\Orderstatus  $orderstatus
     * @param  EditOrderstatusRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderstatus $orderstatus, EditOrderstatusRequest $request)
    {
        return view('backend.orderstatuses.edit', compact('orderstatus'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrderstatusRequestNamespace  $request
     * @param  App\Models\Orderstatus\Orderstatus  $orderstatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderstatusRequest $request, Orderstatus $orderstatus)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $orderstatus, $input );
        //return with successfull message
        return redirect()->route('admin.orderstatuses.index')->withFlashSuccess(trans('alerts.backend.orderstatuses.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteOrderstatusRequestNamespace  $request
     * @param  App\Models\Orderstatus\Orderstatus  $orderstatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderstatus $orderstatus, DeleteOrderstatusRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($orderstatus);
        //returning with successfull message
        return redirect()->route('admin.orderstatuses.index')->withFlashSuccess(trans('alerts.backend.orderstatuses.deleted'));
    }
    
}
