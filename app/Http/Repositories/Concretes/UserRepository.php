<?php

namespace App\Http\Repositories\Concretes;


use App\Http\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
	protected $model = User::class;
}