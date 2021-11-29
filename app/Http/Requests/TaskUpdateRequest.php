<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'issue_no' => 'nullable|numeric',
            'pull_no' => 'nullable|numeric',
            'summary' => 'nullable',
            'detail' => 'nullable',
            'task_status_id' => 'required|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'remarks' => 'nullable',
            'developer_ids' => 'nullable',
            'reviewer_ids' => 'nullable',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'task_status_id' => 'task status',
        ];
    }
}
