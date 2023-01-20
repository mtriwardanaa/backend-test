<?php

namespace Modules\Candidate\Http\Controllers\v1;

use App\Helper\Wrapper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Candidate\Http\Controllers\CandidateCommand;
use Modules\Candidate\Http\Controllers\CandidateQuery;
use Modules\Candidate\Http\Requests\CandidateCreate;
use Illuminate\Support\Facades\Storage;
use Modules\Candidate\Http\Requests\CandidateUpdate;

class CandidateApi extends Controller
{
    private string $model;
    public function __construct()
    {
        $this->model = 'Candidate';
    }
    public function list(Request $request)
    {
        try {
            $childs = [
                'createdBy' => 'User',
            ];

            $data = CandidateQuery::getAll($this->model, $request, [], $childs);
            return Wrapper::data($data, 'Candidate list');
        } catch (\Throwable $th) {
            return Wrapper::errorFetch($th);
        }
    }

    public function create(CandidateCreate $request)
    {
        try {
            $post = $request->all();
            $auth = auth()->user();
            $post['resume'] = Storage::disk('public')->putFile(
                'resume',
                $post['resume'],
            );
            $post['created_by'] = $auth->user_id;

            $create = CandidateCommand::create($this->model, $post);
            return Wrapper::data($create, 'Candidate create', 201);
        } catch (\Throwable $th) {
            return Wrapper::errorFetch($th);
        }
    }

    public function update(CandidateUpdate $request, $candidate_id)
    {
        try {
            $post = $request->all();

            $post['resume'] = Storage::disk('public')->putFile(
                'resume',
                $post['resume'],
            );

            $param = [
                'candidate_id' => $candidate_id
            ];

            $update = CandidateCommand::update($this->model, $post, $param);
            return Wrapper::data($update, 'Candidate update', 201);
        } catch (\Throwable $th) {
            return Wrapper::errorFetch($th);
        }
    }

    public function delete(Request $request, $candidate_id)
    {
        try {
            $param = [
                'candidate_id' => $candidate_id
            ];
            $checkCandidate = CandidateQuery::getOne($this->model, $request, $param);
            if (!$checkCandidate) {
                return Wrapper::error('Candidate not found', 400);
            }

            CandidateCommand::delete($this->model, $param);

            if (Storage::disk('public')->exists($checkCandidate->resume)) {
                Storage::disk('public')->delete($checkCandidate->resume);
            }

            return Wrapper::data([], 'Candidate delete', 200);
        } catch (\Throwable $th) {
            return Wrapper::errorFetch($th);
        }
    }
}
