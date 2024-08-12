@extends('layouts.index')

@section('title', 'New User')
@section('main-title', 'Create New User')
@section('subtitle', 'Users')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">New User</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form id="create-form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="mohammed..">
                                </div>

                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="a1@task.com ..">
                                </div>

                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="******..">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">confirme password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        placeholder="****** ..">
                                </div>

                                {{-- <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="category_image">
                                      <label class="custom-file-label" for="category_image">Choose file</label>
                                    </div>
                                  </div> --}}

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="active-checkbox"
                                            value="option1">
                                        <label for="active-checkbox" class="custom-control-label">Active</label>
                                    </div>

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
    <script>
        function store() {

            axios.post('/cms/admin/users/',{
                name:document.getElementById('name').value,
                email:document.getElementById('email').value,
                password:document.getElementById('password').value,
                password_confirmation:document.getElementById('password_confirmation').value,
                active:document.getElementById('active-checkbox').checked,
            })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    // to reset form
                    // document.getElementById('create-form').reset();
                   window.location.href ="/cms/admin/users";
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message);


                })
                .finally(function() {
                    // always executed
                });

                // // using for sende request have just text doesnot have file
                // axios.post('/cms/admin/category/', {
                //     name: document.getElementById('category-name').value,
                //     active: document.getElementById('active-checkbox').checked
                // })
                // .then(function(response) {
                //     // handle success
                //     console.log(response);
                //     toastr.success(response.data.message);
                //     // to reset form
                //     // document.getElementById('create-form').reset();
                //    window.location.href ="/cms/admin/category";

                //     // toastr.success(response.data.message);
                //     // Toast.fire({
                //     //     icon: response.data.icon,
                //     //     title: response.data.message,
                //     // });

                // })
                // .catch(function(error) {
                //     // handle error
                //     console.log(error);
                //     toastr.error(error.response.data.message);


                // })
                // .finally(function() {
                //     // always executed
                // });


        }
    </script>
@endsection
