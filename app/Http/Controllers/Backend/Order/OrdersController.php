<?php

namespace App\Http\Controllers\Backend\Order;

use App\Models\Order\Order;
use App\Models\Orderstatus\Orderstatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Order\OrderRepository;
use App\Http\Requests\Backend\Order\ManageOrderRequest;
use App\Http\Requests\Backend\Order\CreateOrderRequest;
use App\Http\Requests\Backend\Order\StoreOrderRequest;
use App\Http\Requests\Backend\Order\EditOrderRequest;
use App\Http\Requests\Backend\Order\UpdateOrderRequest;
use App\Http\Requests\Backend\Order\DeleteOrderRequest;

/**
 * OrdersController
 */
class OrdersController extends Controller
{
    /**
     * variable to store the repository object
     * @var OrderRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param OrderRepository $repository ;
     */
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Order\ManageOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageOrderRequest $request)
    {
        return view('backend.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateOrderRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateOrderRequest $request)
    {
        return view('backend.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreOrderRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.orders.index')->withFlashSuccess(trans('alerts.backend.orders.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Order\Order $order
     * @param  EditOrderRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, EditOrderRequest $request)
    {

        $data['order_statuses'] = Orderstatus::all();
        $data['order'] = $order;
        $data['order_detail'] = Order::find($order->id)->with('status', 'detail.product');
        return view('backend.orders.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrderRequestNamespace $request
     * @param  App\Models\Order\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update($order, $input);
        //return with successfull message
        return redirect()->route('admin.orders.index')->withFlashSuccess(trans('alerts.backend.orders.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteOrderRequestNamespace $request
     * @param  App\Models\Order\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, DeleteOrderRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($order);
        //returning with successfull message
        return redirect()->route('admin.orders.index')->withFlashSuccess(trans('alerts.backend.orders.deleted'));
    }

}
