<div {{ $attributes->merge(['class' => 'col-lg-4 col-md-6'])}}>
    <form>
        <div class="input-group">
            <input class="form-control" name="search" value="{{ request('search') }}" type="search" placeholder="Search...">
            <button class="btn btn-outline-secondary" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
    </form>
</div>