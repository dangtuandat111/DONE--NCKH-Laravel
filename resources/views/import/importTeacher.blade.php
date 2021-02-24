@section('DeMuc', 'Lịch giảng dạy')
@section('title', 'Học Phần')

@extends('admin.dashboard')
@section('content')

 <div class="content" >
            <a class="btn btn-primary" data-toggle="modal" href='#modal-add'>Import file</a><br><br>
            <div class="modal fade" id="modal-add">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="{{ url('/admin/import/hocphan') }}" method="POST" role="form" enctype="multipart/form-data">
                                <legend>Import file</legend>
                                @csrf
                                <div class="form-group">
                                    <input type="file" class="form-control" name="hocphan" id="" placeholder="Input field">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@stop()