@section('title', 'Trang chủ')



@extends('admin.dashboard')
@section('content')

   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <table class="table" id="datatable">
    <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">PhoneNumber</th>
      <th scope="col">Permission</th>
      <th scope="col">DoB</th>
      <th scope="col">User</th>
      <th scope="col">Password</th>
      <th scope="col">Id Department</th>
      <th scope="col">Degree</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    @foreach($teachers as $teacher)
    <tr>
      <th scope="row">{{$teacher->id_teacher}}</th>
      <td>{{$teacher->teacher_name}}</td>
      <td>{{$teacher->phone_number}}</td>
      <td>{{$teacher->permission}}</td>
      <td>{{$teacher->DoB}}</td>
      <td>{{$teacher->user}}</td>
      <td>{{$teacher->password}}</td>
      <td>{{$teacher->id_department}}</td>
      
      <td>
        <a href="" class="btn btn-success edit">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach

  </table>
  <div class="d-flex justify-content-center">
    {{$teachers ?? ''->links()}}
  </div>
                  
                 
                  
               
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop()