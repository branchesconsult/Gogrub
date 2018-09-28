<?php

namespace App\Repositories\Backend\Cuisine;

use DB;
use Carbon\Carbon;
use App\Models\Cuisine\Cuisine;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CuisineRepository.
 */
class CuisineRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Cuisine::class;

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
                config('module.cuisines.table') . '.id',
                config('module.cuisines.table') . '.name',

                config('module.cuisines.table') . '.created_at',
                config('module.cuisines.table') . '.updated_at',
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
        $cuisine = self::MODEL;
        $cuisine = new $cuisine();
        if ($cuisine->create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.cuisines.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Cuisine $cuisine
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Cuisine $cuisine, array $input)
    {
        if ($cuisine->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.cuisines.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Cuisine $cuisine
     * @throws GeneralException
     * @return bool
     */
    public function delete(Cuisine $cuisine)
    {
        if ($cuisine->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.cuisines.delete_error'));
    }
}
