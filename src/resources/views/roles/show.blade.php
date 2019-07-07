@extends('trusty::layouts.trusty')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                    <form action="{{ route('trusty.roles.destroy', $role) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('trusty.roles.edit', $role) }}" class="btn btn-primary"><em class="fa fa-pencil"></em> Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role? You will not be able to recover this data.');"><em class="fa fa-trash-o"></em> Delete</button>
                    </form>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Details</div>

                    <div class="card-body">
                        <b>Name: </b> {{ $role->name }}<br>
                        <b>Display Name: </b> {{ $role->display_name }}<br>
                        <b>Description: </b> {{ $role->description }}<br>
                        <br>
                        <b>Created At: </b> {{ $role->created_at->format('m/d/Y') }}<br>
                        <b>Updated At: </b> {{ $role->updated_at->format('m/d/Y') }}<br>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Permissions</div>

                    <div class="card-body">

                        <table class="table" id="permissions-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $item)
                                <tr>
                                    <td>
                                        <span style="display:none">
                                            {!! in_array($item->id, $permission_ids) ? '1' : '0' !!}
                                        </span>
                                        {!! in_array($item->id, $permission_ids) ? '<em class="fa fa-check text-success"></em>' : '<em class="fa fa-times text-danger"></em>' !!}
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->display_name }}</td>
                                    <td>{{ $item->description }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript">

        $('#permissions-table').dataTable();

    </script>
@endsection
