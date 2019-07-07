@extends('trusty::layouts.trusty')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('trusty.users.index') }}">Users</a></li>
                            <li><a href="{{ route('roles.index') }}">Roles</a></li>
                            <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
