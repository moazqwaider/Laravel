@extends('layouts.index')

@section('title', 'Change Password')
@section('main-title', 'Change Password')
@section('subtitle', 'Password')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form id="create-form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="password">Current Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Current Password ..">
                                </div>

                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password"
                                        placeholder="New Password..">
                                </div>

                                <div class="form-group">
                                    <label for="new_password_confirmation">Confrime Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation"
                                        placeholder="Password Cnfirmation ..">
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" onclick="updatePassword()">Update Password</button>
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
        function updatePassword() {
            axios.put('/cms/admin/update-password',{
                password:document.getElementById('password').value,
                new_password:document.getElementById('new_password').value,
                new_password_confirmation:document.getElementById('new_password_confirmation').value
            })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    // to reset form
                     document.getElementById('create-form').reset();
                //    window.location.href ="/cms/admin/category";



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
