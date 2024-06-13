<?php 

namespace App\Pipes;

use Closure;

class CheckTitle
{
    public function handle($content, Closure $next){

        if (empty($content['title'])) {
            throw new \Exception('The title is required.');
        }

        return $next($content);
    }
}
