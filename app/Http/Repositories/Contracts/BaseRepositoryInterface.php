<?php

namespace App\Http\Repositories\Contracts;


interface BaseRepositoryInterface
{
	public function all();

	public function store(array $data);

	public function allWith($with);
}