<?php

namespace App\Http\Requests\Tournament\Team;

use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                Rule::unique('teams')
                    ->where(fn (Builder $query) => $query
                    ->where('group_id', $this->group_id))
                    ->ignore($this->team_id),
            ],
            'team_id' => 'required|integer|exists:teams,id',
            'group_id' => 'required|integer|exists:groups,id',
            //'player_ids' => 'required|array',
            //'player_ids.*' => 'nullable|integer|exists:players,id',
        ];
    }
}
