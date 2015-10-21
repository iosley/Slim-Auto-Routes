<?php
/**
 * Middleware for auto load routes to Slim Framework
 * @author Iosley Carlos <iosley@outlook.com>
 * @version 0.1.0
 */

namespace \Iosley\Slim\Provider;

class AutoRoutesMiddleware extends \Slim\Middleware
{
	public function call()
	{
		$this->getRoutes($this->app->config('routes.path'));
		$this->next->call();
	}

	private function getRoutes($directory)
	{
		$app = $this->app;

		if ( ! ( is_dir($directory) && $dir = opendir( $directory ) ) ) return;

		while ( false !== ($file = readdir($dir)) ) {
			$filePath = "{$directory}/{$file}";

			if ( is_file($filePath) && $file != 'route.php' && $file != 'routeMidle.php' ) include_once $filePath;

			if ( is_dir($filePath) && $file != '.' && $file != '..' && $file != '/' ) $this->getRoutes($filePath);
		}
	}
}