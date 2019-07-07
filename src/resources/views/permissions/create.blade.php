@extends('trusty::layouts.trusty')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create Permission Form</div>

                    <div class="card-body">
                        <form action="{{ route('trusty.permissions.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name <span class="required text-danger small">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', '') }}" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="display_name">Display Name</label>
                                        <input type="text" name="display_name" id="display_name" class="form-control" value="{{ old('display_name', '') }}" placeholder="Display Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" name="description" id="description" class="form-control" value="{{ old('description', '') }}" placeholder="Description">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('trusty.permissions.index') }}" class="btn btn-secondary">Cancel</a>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection