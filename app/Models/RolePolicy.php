<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $role_id
 * @property integer $policy_id
 * @property string $created_at
 * @property string $updated_at
 * @property Role $role
 * @property Policy $policy
 */
class RolePolicy extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['role_id', 'policy_id', 'created_at', 'updated_at'];

    public array $project = [
        'role_id',
        'policy_id',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role', null, 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function policy()
    {
        return $this->belongsTo('App\Models\Policy', null, 'policy_id');
    }
}
