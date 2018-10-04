<?php

namespace App\Repositories\Backend\Order;

use App\Events\Backend\Order\OrderUpdateEvent;
use DB;
use Carbon\Carbon;
use App\Models\Order\Order;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderRepository.
 */
class OrderRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Order::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return Order::with('chef', 'user', 'status')->get();
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        $order = self::MODEL;
        $order = new $order();
        if ($order->save($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.orders.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Order $order
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Order $order, array $input)
    {
        if ($order->update($input)) {
            event(new OrderUpdateEvent($order));
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.orders.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Order $order
     * @throws GeneralException
     * @return bool
     */
    public function delete(Order $order)
    {
        if ($order->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.orders.delete_error'));
    }
}
