<?php 
namespace App\Pipes;

use Closure;

class UppercaseTitle
{
    public function handle($content, Closure $next)
    {
        $content['title'] = strtoupper($content['title']);
        return $next($content);
    }
}
