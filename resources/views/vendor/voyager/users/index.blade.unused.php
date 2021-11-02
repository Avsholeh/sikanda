@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Users')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-upload"></i> @yield('page_title')
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-primary" href="{{ route('voyager.users.create') }}">Tambah User</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Dinas</th>
                                <th>Role</th>
                                <th>Dibuat pada</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->dinas->nm_dinas ?? '' }}</td>
                                    <td>{{ $user->custom_role->display_name }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class="no-sort no-click bread-actions">
                                        <a href="#" title="Hapus"
                                           data-toggle="modal" data-target="#dokumen_delete_modal"
                                           class="btn btn-sm btn-danger pull-right delete"
                                           data-id="{{ $user->id }}">
                                            <i class="voyager-trash"></i>
                                        </a>
                                        <a href="{{ route('voyager.users.edit', $user->id) }}" title="Ubah"
                                           class="btn btn-sm btn-primary pull-right edit">
                                            <i class="voyager-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade modal-danger" id="dokumen_delete_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="voyager-warning"></i>Konfirmasi hapus</h4>
                    </div>
                    <div class="modal-body"><h4>Yakin untuk menghapus dokumen ini?</h4></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <form action="" method="post">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Ya, Hapus">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Modal -->
    </div>
@stop

@push('javascript')
    <script>
        $(document).ready(function() {
            $(".delete").click(function() {
                $deletedId = $(this).data('id');
                console.log($deletedId);
            });
        });
    </script>
@endpush
