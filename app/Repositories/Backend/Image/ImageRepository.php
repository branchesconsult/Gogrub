<?php

namespace App\Repositories\Backend\Image;

use DB;
use Carbon\Carbon;
use App\Models\Image\Image;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ImageRepository.
 */
class ImageRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Image::class;

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
                config('module.images.table').'.id',
                config('module.images.table').'.created_at',
                config('module.images.table').'.updated_at',
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
        $image = self::MODEL;
        $image = new $image();
        if ($image->save($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.images.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Image $image
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Image $image, array $input)
    {
    	if ($image->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.images.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Image $image
     * @throws GeneralException
     * @return bool
     */
    public function delete(Image $image)
    {
        if ($image->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.images.delete_error'));
    }
}
