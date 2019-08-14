<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Validation\ValidationException;
use ReCaptcha\RequestMethod\CurlPost;
class Recaptcha
{
    public function handle($request, Closure $next)
    {
        $recaptcha = new \ReCaptcha\ReCaptcha(env('RECAPTCHA_SECRET'),
            new CurlPost(null,'https://www.recaptcha.net/recaptcha/api/siteverify'));
        $resp = $recaptcha//->setExpectedHostname($_SERVER['SERVER_NAME'])
            ->verify($request['g-recaptcha-response'], $request->getClientIp());
        if(!$resp->isSuccess()){
            $errors=$resp->getErrorCodes();
            $fails=[];
            foreach ($errors as $error){
                $fails[]=trans('recaptcha.failed.'.$error);
            }
            $fails=$fails ? $fails : [trans('recaptcha.failed.unknown')];
            throw ValidationException::withMessages([
                'recaptcha' => $fails,
            ]);
        }
        return $next($request);
    }
}
