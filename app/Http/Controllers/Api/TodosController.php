<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Repositories\Contracts\TodoRepositoryInterface;
use App\Http\Resources\TodoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
	protected $todoRepo;

	public function __construct(TodoRepositoryInterface $todoRepo)
	{
		$this->todoRepo = $todoRepo;
	}

	public function index(Request $request)
	{
		return TodoResource::collection($this->todoRepo->getByUserId(auth()->user()->id));
	}

	public function store(Request $request)
	{
		return new TodoResource($this->todoRepo->store($request->all()));
	}
}