@section('DeMuc', 'Học Phần')
@section('title', 'Học Phần')

@section('link')

@endsection

@extends('admin.dashboard')
@section('content')

   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông tin học phần</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(session('thongbao')) 
                <div class = "alert alert-success">
                    {{session('thongbao')}}
                </div>
              @endif

               <table id="example1" class="table table-bordered table-striped" style="font-size:14px">
   				<thread> 
   					<tr>
   						<th>Tên học phần</th>
   						<th>Số tín chỉ</th>
   						<th>Số tiết lý thuyết</th>
   						<th>Số tiết bài tập</th>
   						<th>Số tiết thực hành</th>
   						<th>Số tiết bài tập lớn</th>
   						<th>Bộ môn</th>
   						<th>Xóa</th>
   						<th>Sửa</th>
   					</tr>
   				</thread>
                <tbody>
                	@foreach($modules as $hp)
                		<tr>
                			<td> {{$hp->Module_Name}}</td>
                			<td> {{$hp->Credit}}</td>
                			<td> {{$hp->Theory}}</td>
                			<td> {{$hp->Exercise}}</td>
                			<td> {{$hp->Practice}}</td>
                			<td> {{$hp->Project}}</td>
                			<td> {{$hp->ID_Department}}</td>
                			<td class = " center"><i class="fas fa-trash"></i><a href="../hocphan/xoa/{{$hp->ID_Module}}" onclick="return confirm('Xác nhận xóa học phần này?');">Xóa</a></td>
                			<td class = " center"><i class="fas fa-eye"></i><a href = "../hocphan/sua/{{$hp->ID_Module}}">Sửa</a></td>
                		</tr>
                	@endforeach
                </tbody> 
                </table>
	           <nav aria-label = "Page navigation">
	           	{!! $modules->links() !!}
	           </nav> 
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
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@stop()