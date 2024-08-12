@extends('layouts.index')

@section('title', 'Edit Admins')
@section('main-title', 'Admin')
@section('subtitle', 'Admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="create-form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Update User</label>
                                    <input type="text" class="form-control" id="name" value="{{ $admin->name }}"
                                        placeholder="Update name ..">

                                </div>

                                <div class="form-group">
                                    <label for="email">Update Email</label>
                                    <input type="email" class="form-control" id="email" value="{{ $admin->email }}"
                                        placeholder="Update Email ..">

                                </div>
                                @php
                                    $guard = auth('admin')->check() ? 'admin' : 'user';

                                @endphp
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input  class="custom-control-input" id="checkbox" type="checkbox" checked
                                            @if (auth($guard)->id() == $admin->id)
                                            disabled @endif
                                                {{-- @if ($category->active) checked @endif --}} id="active-checkbox">
                                            <label for="checkbox" class="custom-control-label">Active</label>
                                        </div>

                                    </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary"
                                    onclick="editadmin('{{ $admin->id}}','{{$redirect ?? true}}')">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->



                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('js')
    <script>
        function editadmin(id,redierct) {
            axios.put('/cms/admin/admins/' + id, {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    active: document.getElementById('checkbox').checked
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    if(redierct){
                        window.location.href = "/cms/admin/admins";
                    }


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
