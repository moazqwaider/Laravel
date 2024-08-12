@extends('layouts.index')

@section('title', 'Role Permissions')
@section('main-title', 'Role Permissions')
@section('subtitle', 'Index')

@section('css')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection
@section('content')

    <section class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <form">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $role->name }} Table</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 250px;">

                                        <input type="text" id="table_search" name="search"
                                            class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default" onclick="search()">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            </form>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-bordered table table-striped text-nowrap">
                                    <thead>
                                        <tr>
                                            {{-- <th> </th> --}}
                                            <th>Name</th>
                                            <th>guard</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($permissions as $permission)
                                            <tr>
                                                {{-- <td class="jsgrid-cell jsgrid-align-center" style="width: 60px;"><input type="checkbox"></td> --}}
                                                {{-- <td><img class="img-circle img-bordered-sm" src="{{asset(Storage::url('images/'.$permission->image))}} " width="80" height="70" alt="User Image"></td> --}}

                                                <td>{{ $permission->name }}</td>
                                                <td><span class="badge bg-success">{{ $permission->guard_name }}</span>
                                                </td>
                                                <td>

                                                    <div class="icheck-primary d-inline">
                                                        <input onchange="updateRole({{ $role->id }},{{ $permission->id }})" 
                                                            @if ($permission->assigned==true)
                                                                    checked
                                                            @endif
                                                            type="checkbox" id="permission_{{ $permission->id }}">

                                                        <label for="permission_{{ $permission->id }}">
                                                        </label>
                                                    </div>

                            </div>
                            </td>
                            </tr>
                        @empty
                            <td colspan="7">No Data Found</td>
                            @endforelse


                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        {{-- {!! $data->links() !!} --}}
                        {{-- OR Use --}}
                        {{--  Directly in your blade file --}}
                        {{-- {{$data->links('pagination::bootstrap-4')}} --}}
                        {{-- {{$data->links('pagination::bootstrap-5')}} --}}

                </div>
                <!-- /.card -->
            </div>
        </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection

@section('js')

    <script>
        function updateRole(roleId, permissionId) {

            axios.post('/cms/admin/roles/' + roleId + '/permissions', {
                    permission_id: permissionId,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message);


                })
                .finally(function() {
                    // always executed
                });

        }
    </script>
@endsection
