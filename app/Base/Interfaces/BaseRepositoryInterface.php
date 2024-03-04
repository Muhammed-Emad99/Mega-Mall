<?php

namespace App\Base\Interfaces;

interface BaseRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function delete($id);
    public function create(array $details);
    public function update($id, array $newDetails);
}
