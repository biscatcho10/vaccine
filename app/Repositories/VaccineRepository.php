<?php

namespace App\Repositories;

use App\Contracts\CrudRepository;
use App\Models\Day;
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
        return Vaccine::orderBy('order', 'asc')->get();
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

        $vaccine->update([
            'order' => $vaccine->id
        ]);

        if ($data['from'] == null && $data['to'] == null) {
            $vaccine->update(['definded_period' => 0]);
        }

        if (!isset($data['diff_ages'])) {
            $vaccine->update(['has_diff_ages' => 0]);
        }

        foreach ($data['available_days'] as $day) {
            $vaccine->days()->create(['name' => $day]);
        }

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

        if ($data['from'] == null && $data['to'] == null) {
            $vaccine->update(['definded_period' => 0]);
        }

        if (!isset($data['diff_ages'])) {
            $vaccine->update(['has_diff_ages' => 0]);
        }

        if (isset($data['available_days'])) {
            foreach ($data['available_days'] as $day) {
                $day = Day::updateOrCreate(['vaccine_id' => $vaccine->id, 'name' => $day], ['name' => $day]);
            }

            $minus = array_diff($vaccine->days->pluck('name')->toArray(), $data['available_days']);
            foreach ($minus as $day) {
                $vaccine->days()->where('name', $day)->delete();
            }
        }else{
            $vaccine->days()->delete();
        }


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
