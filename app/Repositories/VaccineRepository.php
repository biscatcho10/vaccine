<?php

namespace App\Repositories;

use App\Contracts\CrudRepository;
use App\Models\Vaccine;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class VaccineRepository implements CrudRepository
{
    /**
     * Get all clients as a collection.
     *
     * @return LengthAwarePaginator
     */
    public function all()
    {
        return Vaccine::get();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return Vaccine
     */
    public function create(array $data)
    {
        $vaccine = Vaccine::create($data);

        return $vaccine;
    }

    /**
     * Display the given user instance.
     *
     * @param mixed $model
     * @return Vaccine
     */
    public function find($model)
    {
        if ($model instanceof Vaccine) {
            return $model;
        }

        return Vaccine::findOrFail($model);
    }

    /**
     * Update the given client in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return Model
     */
    public function update($model, array $data)
    {
        $vaccine = $this->find($model);

        $vaccine->update($data);

        return $vaccine;
    }

    /**
     * Delete the given client from storage.
     *
     * @param mixed $model
     * @return void
     * @throws Exception
     */
    public function delete($model)
    {
        $this->find($model)->delete();
    }



    /**
     * get trashed users
     * @return LengthAwarePaginator
     */
    public function trashed()
    {
        return Vaccine::onlyTrashed()->filter($this->filter)->get();
    }


    /**
     * hard delete
     * @param mixed $model
     * @throws Exception
     */
    public function forceDelete($model)
    {
        $this->find($model)->forceDelete();
    }


    /**
     * restore user
     * @param mixed $model
     * @throws Exception
     */
    public function restore($model)
    {
        $this->find($model)->restore();
    }

}
