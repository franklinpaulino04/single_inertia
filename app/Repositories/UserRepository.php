<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function getFieldsSearchable()
    {
        return (new User())->getFillable();
    }

    public function model()
    {
        return User::class;
    }
}
