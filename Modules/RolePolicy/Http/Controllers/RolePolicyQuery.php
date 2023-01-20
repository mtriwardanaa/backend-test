<?php

namespace Modules\RolePolicy\Http\Controllers;

use App\Helper\QueryParam;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RolePolicyQuery extends Controller
{
    private static $pathModel = 'App\Models\\';
    public static function getAll($model, $request, $param = array(), $childs = array())
    {
        $table = app(self::$pathModel . $model);
        $query = new QueryParam($request, $table);
        $project = $query->projection();

        $data = $table::where($param)
            ->select($project);

        $data = $data->orderBy('created_at', 'DESC')
            ->get()->toArray();

        return $data;
    }
}
