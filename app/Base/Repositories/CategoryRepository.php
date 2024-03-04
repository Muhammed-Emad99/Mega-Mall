<?php

namespace App\Base\Repositories;

use App\Base\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;


class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

}
