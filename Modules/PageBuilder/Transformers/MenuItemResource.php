<?php

namespace Modules\PageBuilder\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\PageBuilder\Entities\Menu;

class MenuItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            // 'menu' => new MenuResource($this->menu()->first()),
            'title' => $this->title,
            'order' => (int)$this->order,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            'page' => new MenuItemPageResource($this->page()->first()),

        ];
    }

}


// Exception: Property [id] does not exist on this collection instance. in file C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Collections\Traits\EnumeratesValues.php on line 982

#0 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Http\Resources\DelegatesToResource.php(139): Illuminate\Support\Collection->__get('id')
#1 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\Modules\PageBuilder\Transformers\MenuResource.php(18): Illuminate\Http\Resources\Json\JsonResource->__get('id')
#2 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Http\Resources\Json\JsonResource.php(95): Modules\PageBuilder\Transformers\MenuResource->toArray(Object(Illuminate\Http\Request))
#3 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Http\Resources\Json\JsonResource.php(241): Illuminate\Http\Resources\Json\JsonResource->resolve(Object(Illuminate\Http\Request))
#4 [internal function]: Illuminate\Http\Resources\Json\JsonResource->jsonSerialize()
#5 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Http\Response.php(106): json_encode(Array)
#6 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Http\Response.php(58): Illuminate\Http\Response->morphToJson(Array)
#7 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Http\Response.php(35): Illuminate\Http\Response->setContent(Array)
#8 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\ResponseFactory.php(57): Illuminate\Http\Response->__construct(Array, 200, Array)
#9 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Foundation\helpers.php(724): Illuminate\Routing\ResponseFactory->make(Array, 200, Array)
#10 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\Modules\PageBuilder\Http\Controllers\MenuController.php(139): response(Array, 200)
#11 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Controller.php(54): Modules\PageBuilder\Http\Controllers\MenuController->show(Object(Modules\PageBuilder\Entities\Menu))
#12 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php(45): Illuminate\Routing\Controller->callAction('show', Array)
#13 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Route.php(261): Illuminate\Routing\ControllerDispatcher->dispatch(Object(Illuminate\Routing\Route), Object(Modules\PageBuilder\Http\Controllers\MenuController), 'show')
#14 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Route.php(204): Illuminate\Routing\Route->runController()
#15 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Router.php(725): Illuminate\Routing\Route->run()
#16 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(141): Illuminate\Routing\Router->Illuminate\Routing\{closure}(Object(Illuminate\Http\Request))
#17 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\spatie\laravel-permission\src\Middlewares\PermissionMiddleware.php(24): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#18 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(180): Spatie\Permission\Middlewares\PermissionMiddleware->handle(Object(Illuminate\Http\Request), Object(Closure), 'show menus')
#19 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Middleware\SubstituteBindings.php(50): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#20 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(180): Illuminate\Routing\Middleware\SubstituteBindings->handle(Object(Illuminate\Http\Request), Object(Closure))
#21 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Middleware\ThrottleRequests.php(126): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#22 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Middleware\ThrottleRequests.php(102): Illuminate\Routing\Middleware\ThrottleRequests->handleRequest(Object(Illuminate\Http\Request), Object(Closure), Array)
#23 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Middleware\ThrottleRequests.php(54): Illuminate\Routing\Middleware\ThrottleRequests->handleRequestUsingNamedLimiter(Object(Illuminate\Http\Request), Object(Closure), 'api', Object(Closure))
#24 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(180): Illuminate\Routing\Middleware\ThrottleRequests->handle(Object(Illuminate\Http\Request), Object(Closure), 'api')
#25 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php(44): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#26 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(180): Illuminate\Auth\Middleware\Authenticate->handle(Object(Illuminate\Http\Request), Object(Closure), 'api')
#27 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(116): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#28 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Router.php(726): Illuminate\Pipeline\Pipeline->then(Object(Closure))
#29 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Router.php(703): Illuminate\Routing\Router->runRouteWithinStack(Object(Illuminate\Routing\Route), Object(Illuminate\Http\Request))
#30 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Router.php(667): Illuminate\Routing\Router->runRoute(Object(Illuminate\Http\Request), Object(Illuminate\Routing\Route))
#31 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Routing\Router.php(656): Illuminate\Routing\Router->dispatchToRoute(Object(Illuminate\Http\Request))
#32 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php(167): Illuminate\Routing\Router->dispatch(Object(Illuminate\Http\Request))
#33 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(141): Illuminate\Foundation\Http\Kernel->Illuminate\Foundation\Http\{closure}(Object(Illuminate\Http\Request))
#34 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php(21): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#35 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull.php(31): Illuminate\Foundation\Http\Middleware\TransformsRequest->handle(Object(Illuminate\Http\Request), Object(Closure))
#36 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(180): Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull->handle(Object(Illuminate\Http\Request), Object(Closure))
#37 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php(21): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#38 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TrimStrings.php(40): Illuminate\Foundation\Http\Middleware\TransformsRequest->handle(Object(Illuminate\Http\Request), Object(Closure))
#39 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(180): Illuminate\Foundation\Http\Middleware\TrimStrings->handle(Object(Illuminate\Http\Request), Object(Closure))
#40 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ValidatePostSize.php(27): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#41 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(180): Illuminate\Foundation\Http\Middleware\ValidatePostSize->handle(Object(Illuminate\Http\Request), Object(Closure))
#42 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance.php(86): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#43 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(180): Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance->handle(Object(Illuminate\Http\Request), Object(Closure))
#44 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Http\Middleware\HandleCors.php(62): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#45 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(180): Illuminate\Http\Middleware\HandleCors->handle(Object(Illuminate\Http\Request), Object(Closure))
#46 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Http\Middleware\TrustProxies.php(39): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#47 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(180): Illuminate\Http\Middleware\TrustProxies->handle(Object(Illuminate\Http\Request), Object(Closure))
#48 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(116): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))
#49 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php(142): Illuminate\Pipeline\Pipeline->then(Object(Closure))
#50 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php(111): Illuminate\Foundation\Http\Kernel->sendRequestThroughRouter(Object(Illuminate\Http\Request))
#51 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\public\index.php(52): Illuminate\Foundation\Http\Kernel->handle(Object(Illuminate\Http\Request))
#52 C:\Users\Mohamed Alfaghi\Desktop\Projects\BZNS Monster\saas\vendor\laravel\framework\src\Illuminate\Foundation\resources\server.php(16): require_once('C:\\Users\\Mohame...')
#53 {main}
