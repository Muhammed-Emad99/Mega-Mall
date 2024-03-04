<?php

namespace App\Base\Repositories;

use App\Base\Interfaces\BaseRepositoryInterface;


class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }


    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function create(array $details)
    {
        return $this->model->create($details);
    }

    public function update($id, array $newDetails)
    {
        return $this->model->whereId($id)->update($newDetails);
    }

}
