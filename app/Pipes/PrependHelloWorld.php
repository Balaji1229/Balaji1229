<?php 


namespace App\Pipes;

use Closure;

class PrependHelloWorld
{
    public function handle($content, Closure $next)
    {
        $content['body'] = "Hello World\n" . $content['body']; // Prepend "Hello World"
        return $next($content);
    }
}
