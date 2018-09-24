<?php

namespace App\Repositories\Backend\Orderstatus;

use DB;
use Carbon\Carbon;
use App\Models\Orderstatus\Orderstatus;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderstatusRepository.
 */
class OrderstatusRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Orderstatus::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.orderstatuses.table').'.id',
                config('module.orderstatuses.table').'.created_at',
                config('module.orderstatuses.table').'.updated_at',
            ]);
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
        $orderstatus = self::MODEL;
        $orderstatus = new $orderstatus();
        if ($orderstatus->save($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.orderstatuses.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Orderstatus $orderstatus
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Orderstatus $orderstatus, array $input)
    {
    	if ($orderstatus->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.orderstatuses.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Orderstatus $orderstatus
     * @throws GeneralException
     * @return bool
     */
    public function delete(Orderstatus $orderstatus)
    {
        if ($orderstatus->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.orderstatuses.delete_error'));
    }
}
