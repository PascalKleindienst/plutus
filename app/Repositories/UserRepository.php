<?php
namespace Plutus\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Plutus\Models\User;

class UserRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}
