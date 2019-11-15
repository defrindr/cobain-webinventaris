$("#id_inventaris_ajax").change(function(){
    id = $(this).children("option:selected").val();
    $.ajax({
        url:'/api/inventaris/'+id,
        type:'get',
        dataType: 'html'
    }).done(function(data){
        json = JSON.parse(data);
        jumlah = json['jumlah'];
        console.log("TCL: jumlah", jumlah)
        
        $('#jumlahInvent').html("Stok saat ini : "+jumlah);
        $('#jumlah').attr('max',jumlah);
        $('#jumlah').attr('value', jumlah);
        $('#jumlah').removeAttr('disabled');
    });
});