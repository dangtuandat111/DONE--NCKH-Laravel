@section('DeMuc', 'Import')
@section('title', 'Giảng viên')

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
      <div class="row">
    	 <!-- Default box -->
         @if(session('thongbao')) 
                            <div class = "alert alert-success">
                                {{session('thongbao')}}
                            </div>
                          @endif
         @if(count($errors) > 0) 
                  <div class = "alert alert-danger">
                    @foreach($errors->all() as $err)
                      {{$err}}<br>
                    @endforeach
                  </div>
                @endif
          <div class="col-12">
            <!-- Default box -->
	          	 <div class="card">
	              <div class="card-header">
	                <h3 class="card-title">DataTable with default features</h3>
	              </div>
	              <!-- /.card-header -->
                
	              <div class="card-body">
                  <form id="frm-example" action="{{ url('/admin/submit') }}" method="POST">
                    @csrf
                    <div>
                      <button type="submit" class="btn btn-primary" name="phangiang">Phan Giang</button>
                    </div>
                   
                <div>
	                <table id="example1" class="table table-bordered table-striped">
	                  <thead>
	                  <tr>
	                  	<th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
	                    <th>ID</th>
	                    <th>Name</th>
	                    <th>Number</th>
	                    <th>school</th>
	                    <th>teacher</th>
	                  </tr>
	                  </thead>
	                 <tbody>
                  
                	@foreach($schedules as $sch)
                		<tr>
                			<!-- <th><input type ="checkbox" name = <?php $a = "dayla".$sch->ID_Module_Class;  echo $a; ?> ></th> -->
                      <th><input type ="checkbox" name ="name[{{$sch->ID_Module_Class}}]" ></th>
                			<td>{{$sch->ID_Module_Class}}</td>
                			<td>{{$sch->Module_Class_Name}}</td>
                			<td>{{$sch->Number_Reality}}</td>
                			<td>{{$sch->School_Year}}</td>
                			<td>{{$sch->ID_Teacher}}</td>
                		</tr>
                	@endforeach
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