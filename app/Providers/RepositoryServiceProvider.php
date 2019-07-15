<?php

namespace App\Providers;


use App\Http\Repositories\Concretes\TodoRepository;
use App\Http\Repositories\Concretes\UserRepository;
use App\Http\Repositories\Contracts\TodoRepositoryInterface;
use App\Http\Repositories\Contracts\UserRepositoryInterface;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class RepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
	protected $defer = true;

	protected $repoBindings = [
		UserRepositoryInterface::class => UserRepository::class,
		TodoRepositoryInterface::class => TodoRepository::class
	];

	public function register()
	{
		foreach ($this->repoBindings as $abstract => $concrete) {
			$this->app->bind($abstract, $concrete);
		}
	}

	public function provides()
	{
		return array_keys($this->repoBindings);
	}
}