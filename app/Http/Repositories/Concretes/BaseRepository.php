<?php

namespace App\Http\Repositories\Concretes;


use App\Exceptions\RepoModelNotSetException;
use App\Http\Repositories\Contracts\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{

	protected $model;

	public function __construct()
	{
		if (! $this->model) {
			throw (new RepoModelNotSetException())->setRepo(get_called_class());
		}

		$this->model = new $this->model();
	}

	public function all()
	{
		return $this->model->all();
	}

	public function store(array $data)
	{
		return $this->model->create($data);
	}

	public function allWith($with)
	{
		return $this->model->with($with)->get();
	}
}