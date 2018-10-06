@extends('trusty::layouts.app')

@section('content')
    <form action="{{ route('permissions.update', $permission) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Edit Permission Form</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name <span class="required text-danger small">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $permission->name) }}" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="display_name">Display Name</label>
                                        <input type="text" name="display_name" id="display_name" class="form-control" value="{{ old('display_name', $permission->display_name) }}" placeholder="Display Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $permission->description) }}" placeholder="Description">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('permissions.show', $permission) }}" class="btn btn-secondary"><em class="fa fa-times"></em> Cancel</a>
                        <button class="btn btn-primary" type="submit"><em class="fa fa-save"></em> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
