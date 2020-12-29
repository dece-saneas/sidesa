
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- Article Upload Image

$(function () {
    $("#upfile-article").click(function () {
        $("#file-article").trigger('click');
    });
});

function readImageArticle(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            $('.img-article').attr('src', e.target.result);
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}

// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- Select2 Placeholder

$(function () {
	$('.selectGender').select2({
		placeholder: 'Pilih Jenis Kelamin',
		allowClear: true
	});
    
    $('.selectRW').select2({
		placeholder: 'Pilih RW',
		allowClear: true
	});
    
    $('.selectRT').select2({
		placeholder: 'Pilih RT',
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
    
    $('.selectTypeSurat').select2({
		placeholder: 'Pilih Jenis Surat',
		allowClear: true
	});
    
    $('.selectTypeKas').select2({
		placeholder: 'Pilih Jenis Arus',
		allowClear: true
	});
    
    $('.selectStatus').select2({
		placeholder: 'Pilih Status',
		allowClear: true
	});
    
    $('.selectDady').select2({
		placeholder: 'Pilih Ayah',
		allowClear: true
	});
    
    $('.selectMommy').select2({
		placeholder: 'Pilih Ibu',
		allowClear: true
	});
    
    $('.selectType').select2({
		placeholder: 'Pilih Jenis',
		allowClear: true
	});
    
    $('.selectReligion').select2({
		placeholder: 'Pilih Agama',
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

$(function () {
    $('.rupiah').mask('000.000.000.000.000', {reverse: true});
})

$(function(){
    $("#dusunJSON").change(function(){
        var dusunID = $('#dusunJSON').val();
        var url = $('#dusunJSON').data("url");
        
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
        });
        
        $.ajax({
            type    : "POST",
            url     : url+'/json-rw/'+dusunID,
            dataType: 'json',
            success : function (data) {
                $('.rw').empty();
                $.each(data, function(key, value) {
                    $('select[name="rw"]').append('<option value="'+ value.id +'">'+ value.number +'</option>');
                });
            },
        });
    });
    
    $("#rwJSON").change(function(){
        var rwID = $('#rwJSON').val();
        var url = $('#rwJSON').data("url");
        
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
        });
        
        $.ajax({
            type    : "POST",
            url     : url+'/json-rt/'+rwID,
            dataType: 'json',
            success : function (data) {
                $('.rt').empty();
                $.each(data, function(key, value) {
                    $('select[name="rt"]').append('<option value="'+ value.id +'">'+ value.number +'</option>');
                });
            },
        });
    });
});

$(function () {
    // Summernote
    $('#summernote').summernote()
  })

  // The Calender
  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })