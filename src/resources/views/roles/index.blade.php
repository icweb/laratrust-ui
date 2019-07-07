@extends('trusty::layouts.trusty')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                    <a href="{{ route('trusty.roles.create') }}" class="btn btn-primary"><em class="fa fa-plus"></em> New Role</a>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Roles</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="roles-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ route('trusty.roles.show', $item) }}">{{ $item->name }}</a></td>
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
    </div>
@endsection

@section('footer')
    <script type="text/javascript">

        $('#roles-table').dataTable();

    </script>
@endsection
