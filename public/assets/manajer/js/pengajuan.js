$(document).ready(function(){
    const table = document.getElementById('pengajuan');
    $(table).DataTable();

    // approve
    $(".btn-approve").on("click", function(){
        var init = $(this).attr('id')
        var temp = init.split("-")
        var id = temp[0]
        var nama = temp[1]

        $(".approve-nama").html("Apakah anda yakin menyetujui pengajuan izin dari "+nama+" ?")
        $(".approve-id_user").val(id)
    })

    // reject
    $(".btn-reject").on("click", function(){
        var init = $(this).attr('id')
        var temp = init.split("-")
        var id = temp[0]
        var nama = temp[1]

        $(".reject-nama").html("Apakah anda yakin menyetujui pengajuan izin dari "+nama+" ?")
        $(".reject-id_user").val(id)
    })
});