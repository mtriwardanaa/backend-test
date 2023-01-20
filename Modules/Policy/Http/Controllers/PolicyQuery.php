<?php

namespace Modules\Policy\Http\Controllers;

use App\Helper\QueryParam;
use Illuminate\Routing\Controller;

class PolicyQuery extends Controller
{
    private static $pathModel = 'App\Models\\';

    public static function getOne($model, $request, $param = array())
    {
        $table = app(self::$pathModel . $model);
        $query = new QueryParam($request, $table);
        $project = $query->projection();

        return $table::where($param)->select($project)->first();
    }
}
