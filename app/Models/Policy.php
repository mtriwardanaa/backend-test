<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $policy_id
 * @property string $policy
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property RolePolicy[] $rolePolicies
 */
class Policy extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'policy_id';

    /**
     * @var array
     */
    protected $fillable = ['policy', 'description', 'created_at', 'updated_at'];

    public array $project = [
        'policy_id',
        'policy',
        'description',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rolePolicies()
    {
        return $this->hasMany('App\Models\RolePolicy', null, 'policy_id');
    }
}
