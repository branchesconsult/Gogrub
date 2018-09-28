<?php

namespace App\Repositories\Backend\Device;

use DB;
use Carbon\Carbon;
use App\Models\Device\Device;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DeviceRepository.
 */
class DeviceRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Device::class;

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
                config('module.devices.table').'.id',
                config('module.devices.table').'.created_at',
                config('module.devices.table').'.updated_at',
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
        $device = self::MODEL;
        $device = new $device();
        if ($device->save($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.devices.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Device $device
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Device $device, array $input)
    {
    	if ($device->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.devices.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Device $device
     * @throws GeneralException
     * @return bool
     */
    public function delete(Device $device)
    {
        if ($device->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.devices.delete_error'));
    }
}
