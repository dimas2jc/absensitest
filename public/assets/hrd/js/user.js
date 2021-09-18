$(document).ready(function(){
    const table = document.getElementById('user');
    $(table).DataTable();

    // Ajax untuk ganti status user
    $('.status').on('click', function(){
        let id = $(this).attr('id').slice(7);
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: urlStatus,
            data: {
                _token: token,
                id : id
            },
            success: function(results){
                if (results.data.status == 1){
                    $('#status-'+id).removeClass('btn-danger');
                    $('#status-'+id).addClass('btn-success');
                    document.getElementById('status-'+id).textContent = "ACTIVE";

                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Status User berhasil disimpan.',
                    showConfirmButton: false,
                    timer: 2000
                    });
                    
                }
                else {
                    $('#status-'+id).removeClass('btn-success');
                    $('#status-'+id).addClass('btn-danger');
                    document.getElementById('status-'+id).textContent = "NON-ACTIVE";

                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Status User berhasil disimpan.',
                    showConfirmButton: false,
                    timer: 2000
                    });
                }
            }
        });
    });
})