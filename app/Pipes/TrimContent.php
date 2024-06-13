<?php 
namespace App\Pipes;

use Closure;

class TrimContent
{
    public function handle($content, Closure $next)
    {
        $content['body'] = trim($content['body']);
        return $next($content);
    }
}
