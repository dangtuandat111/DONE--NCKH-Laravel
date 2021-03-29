@section('DeMuc', 'Import')

@section('title', 'Học phần')


@extends('admin.dashboard')

@section('link')

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
@endsection

@section('content')
<section class="content">
	<div class = "container-fluid">
    	<div class="response"></div>
    	<div id='calendar'></div>  
 	</div>
</section>

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>

<script>
$(document).ready(function () {
var SITEURL = "{{url('/')}}";
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var calendar = $('#calendar').fullCalendar({
editable: false,
events: SITEURL + "/fullcalendar",
editable: false,
eventRender: function (event, element, view) {
if (event.allDay === 'true') {
event.allDay = true;
} else {
event.allDay = false;
}
},
selectable: false,
selectHelper: true,

select: function (start, end, allDay) {
var title = prompt('Event Title:');
if (title) {
var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
$.ajax({
url: SITEURL + "/fullcalendar/create",
data: 'title=' + title + '&start=' + start + '&end=' + end,
type: "POST",
success: function (data) {
displayMessage("Added Successfully");
}
});
calendar.fullCalendar('renderEvent',
{
title: title,
start: start,
end: end,
allDay: allDay
},
true
);
}
calendar.fullCalendar('unselect');
},
eventDrop: function (event, delta) {
var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
$.ajax({
url: SITEURL + '/fullcalendar/update',
data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
type: "POST",
success: function (response) {
displayMessage("Updated Successfully");
}
});
},

});
});
function displayMessage(message) {
$(".response").html("<div class='success'>"+message+"</div>");
setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>
@endsection
@stop()
