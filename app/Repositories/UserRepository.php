<?php

namespace App\Repositories;

use App\Contracts\CrudRepository;
use App\Models\Patient;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements CrudRepository
{
    /**
     * Get all clients as a collection.
     *
     * @return LengthAwarePaginator
     */
    public function all()
    {
        return Patient::get();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return Admin
     */
    public function create(array $data)
    {
        $user = Patient::create($data);

        return $user;
    }

    /**
     * Display the given user instance.
     *
     * @param mixed $model
     * @return Patient
     */
    public function find($model)
    {
        if ($model instanceof Patient) {
            return $model;
        }

        return Patient::findOrFail($model);
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
        $user = $this->find($model);

        $user->update($data);

        return $user;
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
        return Patient::onlyTrashed()->filter($this->filter)->paginate(request('perPage'));
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
