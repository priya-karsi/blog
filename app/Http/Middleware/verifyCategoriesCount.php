<?php

namespace App\Http\Middleware;

use App\Category;

use Closure;

class verifyCategoriesCount
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
        //seedah model ka count.... leke aake count nhi kia
        if(Category::count()===0){
            session()->flash('error','Minimu ome category required!');
            return redirect(route('categories.create'));
        }
        return $next($request);
        //next step is to register the middleware in kernel
    }
}
