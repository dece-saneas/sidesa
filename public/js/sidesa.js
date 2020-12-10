$(document).ready(function(){
  $("#refresh").click(function(){
    $(".refresh").addClass("fa-spin");
  });
});


$(function () {
	$('.selectGender').select2({
		placeholder: 'Pilih Jenis Kelamin',
		allowClear: true
	})
})

$(function () {
    $('#datetimeBirth').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        icons: {
            time: "fas fa-clock",
            date: "fas fa-calendar-alt",
            up: "fas fa-angle-up",
            down: "fas fa-angle-down"
        }
    });
});