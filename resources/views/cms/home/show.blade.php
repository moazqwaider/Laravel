@extends('layouts.index')

@section('title','Category')
@section('main-title','Show Category')
@section('subtitle','show category')
@section('css')
<style>

    tr{
        font-weight: bold;
    }
</style>

@endsection
@section('content')

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex">
              <h3 class="card-title p-2" style="font-weight: bold;font-size: 20px">Show Category Table</h3>

              <a href="{{route('category.index')}}" class="btn btn-default ml-auto">
                <i class="fas fa-arrow-left"></i>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 ">
              <table class="table table-hover text-nowrap">

                <tbody >
                    <tr>
                        <td style="font-size: 20px" colspan="1">ID    :   <span style="color: blue ;font-weight: bold;font-size: 20px">{{$category->id}}</span></td>
                        <td colspan="5"></td>
                    {{-- <td style="color: blue ;font-weight: bold;font-size: 20px">{{$category->id}}</td> --}}
                    </tr>
                  <tr>
                    {{-- <td>ID</td>
                    <td style="color: blue ;font-weight: bold">{{$category->id}}</td> --}}
                    <td colspan="2">Category Name :</td>
                    <td style="color: blue ;font-weight: bold">{{$category->name}}</td>
                    <td colspan="2">Status</td>
                    <td><span
                        class="badge @if ($category->active == true) bg-success
                    @else
                        bg-danger @endif">{{ $category->status }}</span>
                </td>
                  </tr>

                  <tr>
                    <td colspan="2">Ceated At :</td>
                    <td style="color: blue ;font-weight: bold">{{$category->created_at}}</td>
                    <td colspan="2">Updated At</td>
                    <td style="color: blue ;font-weight: bold">{{$category->updated_at}}</td>

                </tr>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection

@section('js')

@endsection
