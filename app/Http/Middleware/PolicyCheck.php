<?php

namespace App\Http\Middleware;

use App\Helper\Wrapper;
use Closure;
use Illuminate\Http\Request;
use Modules\Policy\Http\Controllers\PolicyQuery;
use Modules\RolePolicy\Http\Controllers\RolePolicyQuery;

class PolicyCheck
{
    private static $rolePolicyModel = 'RolePolicy';
    private static $policyModel = 'Policy';

    public function handle(Request $request, Closure $next, $policy)
    {
        $auth = auth()->user();
        $paramRolePolicy = [
            'role_id' => $auth->role_id
        ];

        $paramPolicy = [
            'policy' => $policy
        ];

        $checkPolicy = PolicyQuery::getOne(self::$policyModel, $request, $paramPolicy);
        $rolePolicy = RolePolicyQuery::getAll(self::$rolePolicyModel, $request, $paramRolePolicy);
        $valueRolePolicy = array_column($rolePolicy, 'policy_id');

        if (!in_array($checkPolicy->policy_id, $valueRolePolicy)) {
            return Wrapper::error('Unauthorized role, you dont have any access to this feature', 401);
        }

        return $next($request);
    }
}
