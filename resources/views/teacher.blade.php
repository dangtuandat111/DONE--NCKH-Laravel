

<!DOCTYPE html>
<html>
<head>
	<title>Teachers</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
	<style type="text/css">
		.left{
			height: 2000px;
			background-color: blue;
		}
		.header{
			height: 150px;
			background-color: darkblue;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
<!-- header -->
	<div class="row header">
		<div class="col-2"></div>
		<div class="col-8"></div>
		<div class="col-2"></div>
	</div>
<!-- main -->
	<div class="row">
		<div class="col-2 left">
		</div>
	<div class="col-10">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		  Add
		</button>
<!-- Add Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Add teacher</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <!-- form -->
			      <form action="{{ action('\App\Http\Controllers\teachersController@store') }}" method="POST">
			      {{ csrf_field() }}
			      <div class="modal-body">   	
					  <div class="form-group">
					    <label>Teacher Name</label>
					    <input type="text" name="teacher_name" class="form-control" placeholder="Enter Name">
					  </div>
					  <div class="form-group">
					    <label>Id</label>
					    <input type="number" name="id_teacher" class="form-control" placeholder="Enter Id">
					  </div>
					  <div class="form-group">
					    <label>Phone Number</label>
					    <input type="number" name="phone_number" class="form-control" placeholder="Enter Phone Number">
					  </div>
					  <div class="form-group">
					    <label>Permission</label>
					    <input type="text" name="permission" class="form-control" placeholder="Enter Permission">
					  </div>
					  <div class="form-group">
					    <label>DoB</label>
					    <input type="date" name="DoB" class="form-control" placeholder="Enter DoB">
					  </div>
					  <div class="form-group">
					    <label>User</label>
					    <input type="text" name="user" class="form-control" placeholder="Enter User Name">
					  </div>
					  <div class="form-group">
					    <label>Password</label>
					    <input type="number" name="password" class="form-control" placeholder="Enter Password">
					  </div>
					  <div class="form-group">
					    <label>Id Department</label>
					    <input type="text" name="id_department" class="form-control" placeholder="Enter Id Department">
					  </div>
					  <div class="form-group">
					    <label>Degree</label>
					    <input type="text" name="teacher_rank" class="form-control" placeholder="Enter Degree">
					  </div>
					  
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Add data</button>
			      </div>
			     </form>
			     <!-- end form -->
			    </div>
			  </div>
			</div>
<!-- End modal -->

<!-- Edit Modal -->
			<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        	
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <!-- form -->
			      <form action="view-teachers" method="POST" id="editForm">
			      {{ csrf_field() }}
			      {{ method_field('PUT') }}
			      <div class="modal-body">   	
					  <div class="form-group">
					    <label>Teacher Name</label>
					    <input type="text" name="teacher_name" id="teacher_name" class="form-control" placeholder="Enter Name">
					  </div>
					  <div class="form-group">
					    <label>Id</label>
					    <input type="number" name="id_teacher" id="id_teacher"class="form-control" placeholder="Enter Id">
					  </div>
					  <div class="form-group">
					    <label>Phone Number</label>
					    <input type="number" name="phone_number" id="phone_number"class="form-control" placeholder="Enter Phone Number">
					  </div>
					  <div class="form-group">
					    <label>Permission</label>
					    <input type="text" name="permission" id="permission" class="form-control" placeholder="Enter Permission">
					  </div>
					  <div class="form-group">
					    <label>DoB</label>
					    <input type="date" name="DoB" id="DoB" class="form-control" placeholder="Enter DoB">
					  </div>
					  <div class="form-group">
					    <label>User</label>
					    <input type="text" name="user" id="user" class="form-control" placeholder="Enter User Name">
					  </div>
					  <div class="form-group">
					    <label>Password</label>
					    <input type="number" name="password" id="password" class="form-control" placeholder="Enter Password">
					  </div>
					  <div class="form-group">
					    <label>Id Department</label>
					    <input type="text" name="id_department" id="id_department" class="form-control" placeholder="Enter Id Department">
					  </div>
					  <div class="form-group">
					    <label>Degree</label>
					    <input type="text" name="teacher_rank" id="teacher_rank" class="form-control" placeholder="Enter Degree">
					  </div>
					  
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Update data</button>
			      </div>
			     </form>
			     <!-- end form -->
			    </div>
			  </div>
			</div>
<!-- End modal -->
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
			<td>{{$teacher->teacher_rank}}</td>
			<td>
				<a href="" class="btn btn-success edit">Edit</a>
				<a href="" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		@endforeach

	</table>
	<div class="d-flex justify-content-center">
		{{$teachers->links()}}
	</div>
	</div>
	
	
</div> <!-- row -->

	</div>

	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			var table = $('#datatable').DataTable();
			//
			table.on('click','.edit', function(){
				$tr = $(this).closer('tr');
				if($($tr).hasClass('child')){
					$tr = $tr.prev('.parent');
				}

				var data = table.row($tr).data();
				console.log(data);

				$('#teacher_name').val(data[1]);
				$('#id_teacher').val(data[2]);
				$('#permission').val(data[3]);
				$('DoB').val(data[4]);
				$('user').val(data[5]);
				$('password').val(data[6]);
				$('id_department').val(data[7]);
				$('teacher_rank').val(data[8]);

				$('editForm').attr('action','view-teachers'+data[0]);
				$('editModal').modal('show');

			})
		})
	</script>
</body>
</html>
