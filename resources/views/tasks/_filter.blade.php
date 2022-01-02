<div>
    <form
        class="tw-flex tw-flex-wrap tw-items-center tw-justify-between tw-space-x-2">
        <label>@lang('Start Date')</label>

        <input type="hidden" name="search" value="{{ request('search') }}">

        <input
            type="date"
            class="form-control tw-flex-1"
            name="filter[from_start_date]"
            value="{{ request('filter')['from_start_date'] ?? '' }}">

        <label>@lang('End Date')</label>

        <input
            type="date"
            class="form-control tw-flex-1"
            name="filter[to_start_date]"
            value="{{ request('filter')['to_start_date'] ?? '' }}">

        <select class="form-select tw-flex-1" name="filter[category]">
            <option value="">-- Category --</option>
            @foreach ($options['categories'] as $category)
            <option value="{{ $category->id }}"
                @if (
                isset(request('filter')['category']) &&
                $category->id == request('filter')['category']
                )
                selected
                @endif
                >{{ $category->name }}</option>
            @endforeach
        </select>

        <select class="form-select tw-flex-1" name="filter[status]">
            <option value="">-- Status --</option>
            @foreach ($options['statuses'] as $status)
            <option value="{{ $status->id }}"
                @if (
                isset(request('filter')['status']) &&
                $status->id == request('filter')['status']
                )
                selected
                @endif
                >{{ $status->status }}</option>
            @endforeach
        </select>

        <x-btn.submit class="tw-ml-2">@lang('Filter')</x-btn.submit>
    </form>
</div>