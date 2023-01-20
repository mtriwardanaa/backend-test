<?php

namespace Modules\Candidate\Http\Controllers;

use App\Helper\QueryParam;
use Illuminate\Routing\Controller;

class CandidateQuery extends Controller
{
    private static $pathModel = 'App\Models\\';
    public static function getAll($model, $request, $param = array(), $childs = array())
    {
        $table = app(self::$pathModel . $model);
        $query = new QueryParam($request, $table);
        $project = $query->projection();
        $take = $request->get('take') ?? 10;
        $paginate = $request->get('last_id') ?? false;

        $data = $table::where($param)
            ->select($project);

        if ($paginate) {
            $data = $data->where('id', '<', $paginate);
        }

        if (count($childs) > 0) {
            foreach ($childs as $key => $value) {
                $data = $data->with([
                    $key => function ($child) use ($key, $value, $query) {
                        $table = app(self::$pathModel . $value);
                        $project = $query->childProjection($table, $key);
                        $child->select($project);
                    }
                ]);
            }
        }

        $data = $data->orderBy('created_at', 'DESC')
            ->take($take)
            ->get();

        return $data;
    }

    public static function getOne($model, $request, $param = array())
    {
        $table = app(self::$pathModel . $model);
        $query = new QueryParam($request, $table);
        $project = $query->projection();

        return $table::where($param)->select($project)->first();
    }
}
