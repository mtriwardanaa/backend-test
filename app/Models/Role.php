<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $role_id
 * @property string $role
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property RolePolicy[] $rolePolicies
 * @property User[] $users
 */
class Role extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'role_id';

    /**
     * @var array
     */
    protected $fillable = ['role', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rolePolicies()
    {
        return $this->hasMany('App\Models\RolePolicy', null, 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', null, 'role_id');
    }
}
