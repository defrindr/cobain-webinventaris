$("#id_inventaris_ajax").change(function(){
    id = $(this).children("option:selected").val();
    if(id != 0){
        $.ajax({
            url:'/api/inventaris/'+id,
            type:'get',
            dataType: 'html'
        }).done(function(data){
            json = JSON.parse(data);
            jumlah = json['jumlah'];
            
            $('#jumlahInvent').html("Stok saat ini : "+jumlah);
            $('#jumlah').attr('max',jumlah);
            $('#jumlah').attr('value', jumlah);
            $('#jumlah').removeAttr('disabled');
        });
    }else {
        $("#jumlah").attr('disabled','disabled');
    }
});


$("#id_ruang_selected").change(function(){
    id = $(this).children("option:selected").val();
    if(id != 0){
        $.ajax({
            url:'/api/inventaris/jenis/'+id,
            type:'get',
            dataType: 'html'
        }).done(function(data){
            json = JSON.parse(data);
            componentJenis(json);
            $('#id_jenis_ajax').removeAttr('disabled')
        });
    }else {
        // console.log('alloooo')
        $("#id_jenis_ajax").attr('disabled')
    }
})

$('#id_jenis_ajax').change(function(){
    id_jenis = $(this).children("option:selected").val();
    id_ruang = $('#id_ruang_selected').children("option:selected").val();
    if(id_jenis != 0){
        $.ajax({
            url:'/api/inventaris/?id_ruang='+id_ruang+'&id_jenis='+id_jenis,
            type:'get',
            dataType: 'html'
        }).done(function(data){
            json = JSON.parse(data)
            componentInventaris(json)
            $("#id_inventaris_ajax").removeAttr('disabled')
        });
    }else {
        $("#id_inventaris_ajax").attr('disabled','disabled')
    }
})

function componentInventaris(data){
    target = $('#id_inventaris_ajax')

    target.empty()

    data.forEach(d => {
        mockup = "<option value="+d.id+">"+d.nama+" </option>"
        target.append(mockup)
    });

}

function componentJenis(data){
    target = $('#id_jenis_ajax')

    target.empty();

    data.forEach(d => {
        if(d.id == 0){
            mockup = "<option value="+d.id+">"+d.nama+" </option>"
        }else{
            mockup = "<option value="+d.id+">"+d.nama+" ("+d.item+")</option>"
        }
        target.append(mockup)
    });

}