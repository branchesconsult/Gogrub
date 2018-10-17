<?php

namespace App\Http\Controllers\Backend\Order;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Order\OrderRepository;
use App\Http\Requests\Backend\Order\ManageOrderRequest;

/**
 * Class OrdersTableController.
 */
class OrdersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var OrderRepository
     */
    protected $order;

    /**
     * contructor to initialize repository object
     * @param OrderRepository $order ;
     */
    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }

    /**
     * This method return the data of the model
     * @param ManageOrderRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageOrderRequest $request)
    {
        $userId = ($request->has('user_id')) ? $request->user_id : null;
        $forUser = ($request->has('for_user')) ? $request->for_user : null;
        return Datatables::of($this->order->getForDataTable($userId, $forUser))
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($order) {
                return Carbon::parse($order->created_at)->toDateString();
            })
            ->addColumn('actions', function ($order) {
                return $order->action_buttons;
            })
            ->addColumn('chef', function ($order) {
                return $order->chef->full_name . ' - ' . $order->chef->mobile;
            })
            ->addColumn('customer', function ($order) {
                return $order->customer_full_name . ' - ' . $order->customer_phone;
            })
            ->make(true);
    }
}
