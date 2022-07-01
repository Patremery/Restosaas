@extends('admin.layouts.admin')

@section('content')
<div class="dashborad-box">
    <h4 class="title">Liste des utilisateurs ({{ $users->total() }})</h4>
    <div class="section-body listing-table">
        <div class="table-responsive">
            @if($users->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom complet</th>
                            <th>email</th>
                            <th>Tel</th>
                            <th>Avis</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? '' }}</td>
                            <td><span>{{ $user->reviews->count() }} </span></td>
                            <td class="edit"><a href="#"><i class="fa fa-pencil"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
            @else
                <div class="alert alert-primary" role="alert">
                    Aucun utilisateur trouvé
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
