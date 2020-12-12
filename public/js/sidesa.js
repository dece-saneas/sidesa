$(function(){
	$("#refresh").click(function(){
		$(".refresh").addClass("fa-spin")
	});
});

$(function () {
	$('.selectGender').select2({
		placeholder: 'Pilih Jenis Kelamin',
		allowClear: true
	});
    
    $('.selectRW').select2({
		placeholder: 'Pilih RW',
		allowClear: true
	});
    
    $('.selectKetuaRT').select2({
		placeholder: 'Pilih Ketua RT',
		allowClear: true
	});
    
    $('.selectKetuaRW').select2({
		placeholder: 'Pilih Ketua RW',
		allowClear: true
	});
    
    $('.selectDusun').select2({
		placeholder: 'Pilih Dusun',
		allowClear: true
	});
    
    $('.selectKepalaDusun').select2({
		placeholder: 'Pilih Kepala Dusun',
		allowClear: true
	});
    
    $('.selectJurnalis').select2({
		placeholder: 'Pilih Jurnalis',
		allowClear: true
	});
});

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

$(function () {
  $('[data-toggle="popover"]').popover()
})

$(function () {
    $('#modal-delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var title = button.data('title')
        var note = button.data('note')
        var url = button.data('url')
        
        var modal = $(this)
        modal.find('.modal-title').text(title)
        modal.find('.modal-note').text(note)
        modal.find('.delete').attr('action', url)
    })
})
