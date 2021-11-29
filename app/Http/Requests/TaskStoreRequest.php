<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
            'summary' => 'required',
            // 'detail' => 'nullable',
            'issue_no' => 'nullable|numeric',
            'pull_no' => 'nullable|numeric',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'task_status_id' => 'required|numeric',
            'task_category_id' => 'required|numeric',
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
