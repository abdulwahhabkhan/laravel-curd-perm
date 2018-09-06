<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\View\View as View;

class IsAjax
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($request->ajax() AND ($content = $response->getOriginalContent()) instanceof View) {
            $content = $response->getOriginalContent();
            $sections = $content->renderSections();
            $content = ['title'=>$sections['title'],'url'=> $request->url(), 'content' => $sections['content']];
            return $response->setContent($content);

        }
        return $response;
    }
}
