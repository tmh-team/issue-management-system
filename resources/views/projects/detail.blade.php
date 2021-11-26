@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">
        <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        {{ __('Project Detail') }}
    </div>
    <div class="card-body">
        <h3 class="text-center">Sint qui</h3>
        <div class="row">
            <div class="col-md-12">
                <h5>@lang('Summary')</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat similique beatae repellendus alias fugiat, laboriosam, consectetur fugit ducimus sapiente nemo officia molestias ipsum, natus quo assumenda excepturi quos hic atque?</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h5>@lang('Issue List')</h3>
                <table class="table table-striped">
                     <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">@lang('Issue No.')</th>
                            <th scope="col">@lang('Start Date')</th>
                            <th scope="col">@lang('End Date')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Developer')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">#</th>
                            <td><a href="#"> #2905</a></td>
                            <td>Nov 24, 2021</td>
                            <td>Nov 24, 2021</td>
                            <td>Assigned</td>
                            <td><a href="#">Arlo VonRueden</a></td>
                        </tr>
                        <tr>
                            <th scope="row">#</th>
                             <td><a href="#"> #2905</a></td>
                            <td>Nov 24, 2021</td>
                            <td>Nov 24, 2021</td>
                            <td>Assigned</td>
                            <td><a href="#">Arlo VonRueden</a></td>
                        </tr>
                        <tr>
                            <th scope="row">#</th>
                             <td><a href="#"> #2905</a></td>
                            <td>Nov 24, 2021</td>
                            <td>Nov 24, 2021</td>
                            <td>Assigned</td>
                            <td><a href="#">Arlo VonRueden</a></td>
                        </tr>
                        <tr>
                            <th scope="row">#</th>
                            <td><a href="#">#2905</a></td>
                            <td>Nov 24, 2021</td>
                            <td>Nov 24, 2021</td>
                            <td>Assigned</td>
                            <td><a href="#">Arlo VonRueden</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection