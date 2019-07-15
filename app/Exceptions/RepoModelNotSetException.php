<?php
/**
 * Created by PhpStorm.
 * User: hrach
 * Date: 7/15/19
 * Time: 16:28
 */

namespace App\Exceptions;


class RepoModelNotSetException extends \Exception
{
	public function setRepo($repo)
	{
		$this->message = "Model for repository [{$repo}] has not been set.";

		return $this;
	}
}