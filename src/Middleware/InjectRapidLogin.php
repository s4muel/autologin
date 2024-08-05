<?php

namespace Veltisan\RapidLogin\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InjectRapidLogin
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!config('rapidlogin.enabled', false)) {
            return $response;
        }

        $users = config('rapidlogin.users');
        $userKey = config('rapidlogin.user_route_key_name');

        //if no users are defined, get first 3 users from database
        if (empty($users)) {
            $model = config('rapidlogin.user_model');
            $modelInstance = new $model;

            $attributes = ['name', 'username', 'email'];

            /** @var Collection $users */
            $users = $model::query()->limit(3)->get()->mapWithKeys(function ($user) use ($attributes, $userKey) {
                $value = null;
                foreach ($attributes as $attribute) {
                    if (!is_null($user->$attribute)) {
                        $value = $user->$attribute;
                        break;
                    }
                }
                return [$user->{$userKey} => $value ?? $user->{$userKey}];
            });
        }

        if ($request->routeIs(config('rapidlogin.route_name_pattern'))) {
            $content = $response->getContent();

            $html = view('rapidlogin::links', [
                'users' => $users,
                'showCloseButton' => config('rapidlogin.show_close_button', true),
            ])->render();


            $content = Str::replaceLast('</body>', $html . '</body>', $content);
            $response->setContent($content);
        }

        return $response;
    }
}
