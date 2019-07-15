<?php

namespace App\Http\Repositories\Contracts;


interface TodoRepositoryInterface extends BaseRepositoryInterface
{
	public function getByUserId($userId);
}