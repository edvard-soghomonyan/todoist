<?php

namespace App\Http\Repositories\Concretes;


use App\Http\Repositories\Contracts\TodoRepositoryInterface;
use App\Todo;

class TodoRepository extends BaseRepository implements TodoRepositoryInterface
{
	protected $model = Todo::class;

	public function getByUserId($userId)
	{
		return $this->model->whereUserId($userId)->orderBy('created_at', 'DESC')->get();
	}

	public function store(array $data)
	{
		return auth()->user()->todos()->create($data);
	}
}