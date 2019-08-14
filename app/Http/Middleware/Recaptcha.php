<?php
namespace App\Http\Middleware;
use Closure;
use ReCaptcha\RequestMethod\CurlPost;
class Recaptcha
{
    public function handle($request, Closure $next)
    {
        $recaptcha = new \ReCaptcha\ReCaptcha(env('RECAPTCHA_SECRET'),
            new CurlPost(null,'https://www.recaptcha.net/recaptcha/api/siteverify'));
        $resp = $recaptcha//->setExpectedHostname($_SERVER['SERVER_NAME'])
            ->verify($request['g-recaptcha-response'], $request->getClientIp());
        abort_if(!$resp->isSuccess(),500,@$resp->getErrorCodes()[0]);
        return $next($request);
    }
}
