@section('DeMuc', 'Lịch giảng')
@section('title', 'Thay đổi giờ giảng')

@extends('admin.dashboard')
@section('content')
<section class="content">
      <div class="container-fluid">
      	  <div class="row">
          <div class="col-12">
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Them bo loc</h3>

                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                  <button type="submit" class="btn btn-primary">Vi du</button>
                  
              </div>
          </div>
        </div>
      </div>
       @if(count($errors) > 0) 
          <div class = "alert alert-danger">
            @foreach($errors->all() as $err)
              {{$err}}<br>
            @endforeach
          </div>
        @endif

        @if(session('thongbao')) 
          <div class = "alert alert-success">
              {{session('thongbao')}}
          </div>
        @endif
      <div class="row">
    	 <!-- Default box -->
        
          <div class="col-12">
            <!-- Default box -->
	          	 <div class="card">
	              <div class="card-header">
	                <h3 class="card-title">Danh sách lớp học phần</h3>
	              </div>
	              <!-- /.card-header -->
                
	              <div class="card-body">
                  <form id="frm-example" action="{{ url('/admin/fix/submit') }}" method="POST">
                    @csrf
                    <div>
                      <button type="submit" class="btn btn-primary" name="phangiang">Phan Giang</button>
                    </div>
                   
                <div>
	                <table id="example1" class="table table-bordered table-striped">
	                  <thead>
	                  <tr>
	                  	<th></th>
	                    <th>ID</th>
	                    <th>Name</th>
	                    <th>Number</th>
	                    <th>SCHOOL YEAR</th>
	                    <th>ID_TEACHER</th>
	                  </tr>
	                  </thead>
	                 <tbody>
                	
                	</tbody> 
	                 <tfoot>
      					  <tr>
      					     <th></th>
      					     <th>ID_MODULE_CLASS</th>
      					     <th>NAME</th>
      					     <th>NUMBER</th>
      					     <th>SCHOOL YEAR</th>
      					     <th>ID_TEACHER</th>
      					  </tr>
      					</tfoot>

	                </table>
                  </div>
                </form>
	              </div>

	              <!-- /.card-body -->
	            </div>
	            <!-- /.card -->
          </div>
          <!-- Close col-12-->
         </div>
</section>
@section('script')

@endsection()

@stop()