<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $candidate_id
 * @property integer $created_by
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $education
 * @property string $birthday
 * @property string $experience
 * @property string $last_position
 * @property string $applied_position
 * @property string $top_5_skills
 * @property string $resume
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Candidate extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'candidate_id';

    /**
     * @var array
     */
    protected $fillable = ['created_by', 'name', 'email', 'phone', 'education', 'birthday', 'experience', 'last_position', 'applied_position', 'top_5_skills', 'resume', 'created_at', 'updated_at'];

    public array $project = [
        'candidate_id',
        'name',
        'email',
        'phone',
        'education',
        'birthday',
        'experience',
        'last_position',
        'applied_position',
        'top_5_skills',
        'resume',
        'created_by',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'user_id');
    }
}
