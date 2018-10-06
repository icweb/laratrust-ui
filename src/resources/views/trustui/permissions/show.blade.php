@extends('trustui::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                    <form action="{{ route('permissions.destroy', $permission) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-primary"><em class="fa fa-pencil"></em> Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this permission? You will not be able to recover this data.');"><em class="fa fa-trash-o"></em> Delete</button>
                    </form>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Details</div>

                    <div class="card-body">
                        <b>Name: </b> {{ $permission->name }}<br>
                        <b>Display Name: </b> {{ $permission->display_name }}<br>
                        <b>Description: </b> {{ $permission->description }}<br>
                        <br>
                        <b>Created At: </b> {{ $permission->created_at->format('m/d/Y') }}<br>
                        <b>Updated At: </b> {{ $permission->updated_at->format('m/d/Y') }}<br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection