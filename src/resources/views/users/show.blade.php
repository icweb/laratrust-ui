@extends('trusty::layouts.trusty')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary"><em class="fa fa-pencil"></em> Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user? You will not be able to recover this data.');"><em class="fa fa-trash-o"></em> Delete</button>
                    </form>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Details</div>

                    <div class="card-body">
                        <b>Full Name: </b> {{ $user->name }}<br>
                        <b>Email: </b> {{ $user->email }} {!! isset($user->email_verified_at) ? '<span class="badge badge-pill badge-success"><em class="fa fa-check"></em> Verified</span>' : '' !!}
                        <br><br>
                        <b>Created At: </b> {{ $user->created_at->format('m/d/Y') }}<br>
                        <b>Updated At: </b> {{ $user->updated_at->format('m/d/Y') }}<br>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Roles</div>
                    <div class="card-body">
                        <table class="table" id="roles-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $item)
                                <tr>
                                    <td>
                                        <span style="display:none">
                                            {!! in_array($item->id, $role_ids) ? '1' : '0' !!}
                                        </span>
                                        {!! in_array($item->id, $role_ids) ? '<em class="fa fa-check text-success"></em>' : '<em class="fa fa-times text-danger"></em>' !!}
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

        $('#roles-table').dataTable();

    </script>
@endsection
