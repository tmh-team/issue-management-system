@csrf

<div class="mb-3">
    <label class="form-label">@lang('Summary') <span class="text-danger">*</span></label>
    <input name="summary" value="{{ $task->summary }}" class="form-control" type="text">
    @error('summary')
    <p class="text-danger text-xs">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">@lang('Detail')</label>
    <textarea name="detail" value="{{ $task->detail }}" class="form-control" rows="3"></textarea>
    @error('detail')
    <p class="text-danger text-xs">{{ $message }}</p>
    @enderror
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">@lang('Issue No.')</label>
        <input name="issue_no" value="{{ $task->issue_no }}" class="form-control" type="number">
        @error('issue_no')
        <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('Pull No.')</label>
        <input name="pull_no" value="{{ $task->pull_no }}" class="form-control" type="number">
        @error('pull_no')
        <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">@lang('Start Date') <span class="text-danger">*</span></label>
        <input name="start_date" value="{{ $task->start_date?->toDateString() }}" class="form-control" type="date">
        @error('start_date')
        <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('End Date')</label>
        <input name="end_date" value="{{ $task->end_date?->toDateString() }}" class="form-control" type="date">
        @error('end_date')
        <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">@lang('Status') <span class="text-danger">*</span></label>
        <select class="form-select" name="task_status_id">
            <option value="" selected>-- @lang('Select Status') --</option>
            @foreach ($statuses as $status)
            <option value="{{ $status->id }}" @if($status->id === $task->task_status_id &&
                !$errors->has('task_status_id')) selected @endif>
                {{ $status->status }}</option>
            @endforeach
        </select>
        @error('task_status_id')
        <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('Category') <span class="text-danger">*</span></label>
        <select class="form-select" name="task_category_id">
            <option value="" selected>-- @lang('Select Category') --</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if($category->id === $task->task_category_id &&
                !$errors->has('task_category_id')) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('task_category_id')
        <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">@lang('Assign To')</label>
    <select class="js-select-multiple-developers form-select" name="developer_ids[]" multiple>
        @foreach ($users as $user)
        <option value="{{ $user->id }}"
            @if($developers->contains($user->id)) selected @endif>
            {{ $user->name }}</option>
        @endforeach
    </select>
    @error('developer_ids')
    <p class="text-danger text-xs">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">@lang('Reviewers')</label>
    <select class="js-select-multiple-reviewers form-select" name="reviewer_ids[]" multiple>
        @foreach ($users as $user)
        <option value="{{ $user->id }}"
            @if($reviewers->contains($user->id)) selected @endif>
            {{ $user->name }}</option>
        @endforeach
    </select>
    @error('reviewer_ids')
    <p class="text-danger text-xs">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">@lang('Remarks')</label>
    <textarea name="remarks" class="form-control" rows="3">{{ $task->remarks }}</textarea>
    @error('remarks')
    <p class="text-danger text-xs">{{ $message }}</p>
    @enderror
</div>

<div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-primary">{{ $submitBtnName }}</button>
    <a href="{{ route('tasks.index', $projectId) }}" class="btn btn-outline-secondary">@lang('Back')</a>
</div>
</form>