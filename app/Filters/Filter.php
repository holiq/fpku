<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

public function before(RequestInterface $request)
{
	$auth = service('auth');
	if (! $auth->isLoggedIn())
	{
		return redirect('login');
	}
}
