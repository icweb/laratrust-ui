@extends('trusty::layouts.trusty')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                    <a href="{{ route('trusty.users.create') }}" class="btn btn-primary"><em class="fa fa-plus"></em> New User</a>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="users-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ route('trusty.users.show', $item) }}">{{ $item->name }}</a></td>
                                        <td>{{ $item->email }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript">

        $('#users-table').dataTable();

    </script>
@endsection
