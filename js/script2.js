$('#cari-kota').on('click', function()
{
    $('#hasil-cari-kota').html('');

    $.ajax({
        url : 'https://api.banghasan.com/sholat/format/json/kota',
        type : 'get',
        dataType : 'json',
        success : function(result){
            let hasil = result.kota;
           

            $.each(hasil, function(i, data)
            {
                $('#hasil-cari-kota').append(
                    `<option value="`+data.id+`">`+data.nama+`</option>`
                )
            })
        }
    })
}) 


$('#lihat-jadwal').on('click', function()
{
    
    $('#jadwal-sholat').html('');

         var kota = $('#hasil-cari-kota').val();
         var tanggal = $('#input-tanggal').val();
         var tipe = 'json';
         var url = 'https://api.banghasan.com/sholat/format/'+tipe+'/jadwal/kota/'+kota+'/tanggal/'+tanggal+'';

        $.ajax({
            url : url,
            type : 'get',
            dataType : 'json',
            success : function(result){
                
                let hasil = result.jadwal.data;
                
            
                    $('#jadwal-sholat').append(`
                    <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Imsak</th>
                        <th scope="col">Subuh</th>
                        <th scope="col">Dhuha</th>
                        <th scope="col">Dzuhur</th>
                        <th scope="col">Magrib</th>
                        <th scope="col">Isya</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">`+hasil.imsak+`</th>
                        <td>`+hasil.subuh+`</td>
                        <td>`+hasil.dhuha+`</td>
                        <td>`+hasil.dzuhur+`</td>
                        <td>`+hasil.ashar+`</td>
                        <td>`+hasil.maghrib+`</td>
                        <td>`+hasil.isya+`</td>
                      </tr>
                    </tbody>
                  </table>  
                    `)
            }
        })    
});
