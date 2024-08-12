@extends('layouts.index')

@section('title', 'Role')
@section('main-title', 'Create Role')
@section('subtitle', 'Roles')

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">New Role</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form id="create-form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Minimal</label>
                                    <select class="form-control guards" id="guard_name" style="width: 100%;">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Role Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Role Name..">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" onclick="store()">Save</button>
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

    <!-- Select2 -->
    <script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        //Initialize Select2 Elements
        $('.guards').select2({
            theme: 'bootstrap4'
        })

        function store() {

            axios.post('/cms/admin/roles/', {
                    name: document.getElementById('name').value,
                    guard_name: document.getElementById('guard_name').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);

                    window.location.href = "/cms/admin/roles";
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
