<?php

namespace Modules\Candidate\Http\Controllers;

use Illuminate\Routing\Controller;

class CandidateCommand extends Controller
{
    private static $pathModel = 'App\Models\\';

    public static function create($model, $payload)
    {
        $table = app(self::$pathModel . $model);
        return $table::create($payload);
    }

    public static function update($model, $payload, $param)
    {
        $table = app(self::$pathModel . $model);
        return $table::where($param)->update($payload);
    }

    public static function delete($model, $param)
    {
        $table = app(self::$pathModel . $model);
        return $table::where($param)->delete();
    }
}
