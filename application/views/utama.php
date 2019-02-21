
<!DOCTYPE html>
<html>
<head>
	<title>Utama Paging</title>
	<style type="text/css">
		
		.removeRow{
			background-color: red;
		}


	</style>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/progressbar.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/nprogress.css')?>">
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/nprogress.js')?>"></script>

<body>
<div id="load"></div>
<!--progress bar!-->
<div id="progress" class="waiting">
    <dt></dt>
    <dd></dd>
</div>
<div id="loading">
	loading...
</div>
<form id="forme" method="POST">
	<input type="hidden" name="id" class="id">
	<label>Nama</label>
	<input type="text" name="nama" id="nama" class="nama"><br>
	<label>Alamat</label>
	<textarea name="alamat" class="alamat"></textarea><br>
	<label>kelas</label>
	<input type="text" name="kelas" class="kelas"><br>
	<button name="submit" class="simpan">simpan</button>
	<button name="ubah" class="mengubah">Edit</button>
</form>

<label>Hapus semua</label><input type="checkbox" class="tandaisemua"><button class="hapusall">Hapus Semua</button><br>
<input type="text" name="pencarian" id="pencarian" placeholder="Cari data.....">
<table id="cobaa" border='1' width="100%">
	<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Kelas</th>
				<th>Action</th>
			</tr>
	</thead>
	<tbody>
		
	</tbody>

</table>

<div id="angka">
	
</div>

<div id="coba">
	
</div>
<button onclick="klik(3)">klik</button>
<div id="okee">
	
</div>

<button class="krik" ooo="3">krik</button>
<button class="krik" ooo="4">krik4</button>
<div id="ko">
	
</div>
	<table border='1' width="100%" id='postsList'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Kelas</th>
			</tr>
		</thead>

		<tbody>
			
		</tbody>
	</table>

	<div id='pagination'></div>
	<div id='paginati'></div>
<div id="nilai">
	
</div>
<script type="text/javascript">
$(".krik").click(function(){
	var id= $(this).attr('ooo')
	$('#ko').text(id);
});

	
$(document).ready(function(){
$('#loading').hide();


	$({property: 0}).animate({property: 105}, {
            duration: 4000,
            step: function() {
                var _percent = Math.round(this.property);
                $('#progress').css('width',  _percent+"%");
                if(_percent == 105) {
                    $("#progress").addClass("done");
                }
            },
            complete: function() {
              
            }
        });


$('.tandaisemua').click(function(e){


	
	if($(this).is(':checked')){
		//menambah class remove class
		$('.delete_checkbox').closest('tr').addClass('removeRow');
		//agar .delete_checkbox dapat terchecked
		$('.delete_checkbox').prop('checked', true); // Checks it	
	}
	else{
		//agar .delete_checkbox unchecked
		$('.delete_checkbox').prop('checked', false);
		//menghapus class removeRow pada tr	
		$('.delete_checkbox').closest('tr').removeClass('removeRow');
	}

	
});



//saat checkbox per pilihan
$('table').on('click', '.delete_checkbox', function (){
		
		if($(this).is(':checked'))
		  {
		   $(this).closest('tr').addClass('removeRow');
		  }
		 else
		  {
		   $(this).closest('tr').removeClass('removeRow');
		  }

    });




$('.hapusall').click(function(e){
	e.preventDefault();
	//untuk tetap ditempat setelah paging
			var nama= $("#pencarian").val();
			//mendefinisikan apakah id pagination displaynya block atau none
			var tamp= $('#pagination').css('display');
			
			var pagen="";
			var page="";


			if(tamp=='block'){
			pagen = $('.baru').attr('oke');
			}
			else if(tamp=='none'){
			pagen = $('#paginati .baru').attr('oke');

					//mencari apakah nilai oke di class baru terdefinisi atau tidak
					if(pagen>=1){
						pagen;
					}
					else{
						pagen=0;
					}

			}

			//jika pagen 0
			if(pagen==0){
			
				page=0;
				
			}
			else{
				page = ((pagen/5)+1);
			}


	//untukmenghapus kebawah
	var pilih = $('.delete_checkbox:checked');
	if(pilih.length>0){
		var checkbox_value=[];
		$(pilih).each(function(){
		checkbox_value.push($(this).val());

		});

		if(confirm('apa mau menghapus?')){

		

		//untuk mencari durasi ajax request var start = new Date().getTime();
		$.ajax({
			url:"<?php echo base_url('ajaxpaging/hapuspilih')?>",
			method:"POST",
			data:{checkbox_value:checkbox_value},

			beforeSend: function () {
			NProgress.start();
			// untuk mencari durasi ajax request var duration = (new Date().getTime() - start) * 100;
			//untuk loading atas loadingg();
            $('.removeRow').fadeOut(1500);
        },
			success:function(){
				
				//agar saat sesuai bisa memilih sesuai pagination atau paginati
				if(tamp=='block'){
					loadPagination(page);
					}
					else if(tamp=='none'){
					load_data(nama,page);
					}
			},
			complete:function(){
				NProgress.done();
  				NProgress.remove();
			},		

		});

	}


	}
	else{
		alert('anda belum memilih data yang dihapus');
	}


});




//aksi edit

//percobaan edit
/*
	function tetapditempan(idlll){
	if(idlll<1){
	var okelll=1;
	}
	else{
	var okelll=(idlll/5)+1;

	}
		$('#nilai').text(okelll);

		$(".mengubah").click(function(e){

		e.preventDefault();
		$.ajax({
		cache: false ,
		url:"<?php// echo base_url('ajaxpaging/aksi_edit/')?>",
		type:'post',
		dataType:'JSON',
		data:$('#forme').serialize(),
		success:function(response){
			$('#forme')[0].reset();
			loadPagination(0);
		}
	});

	});




	}

*/

	//simpan
	$(".simpan").click(function(e){
		

		e.preventDefault();
		var start = new Date().getTime();

		$.ajax({
	
			url:"<?php echo base_url('ajaxpaging/add')?>",
			type:'POST',
			dataType:'json',
			data:$("#forme").serialize(),
			beforeSend:function(){
				$('#load').show();				
				//duration number
				var duration = (new Date().getTime() - start) / 100000;
				var mulai=0;
				var oke=(duration/duration)*100;
				var x = document.getElementById("load");
			
				  var width = 0;
				  x.innerHTML = width;
				  var int = setInterval(move, duration); // Setted a longer delay...
				  function move() {
				    if (width == oke) {
				      clearInterval(int);
				    } else {
				      width += 1;
				      x.style.width = width + "%";
				      var showNumber = width;
				      x.innerHTML = showNumber.toFixed();    // Only one decimal.
				    }
				  }

				NProgress.start();
				$('#loading').show();
				// untuk loading atas loadingg();

			},
			success:function(data){
				


				$('#load').hide();
				$('#forme')[0].reset();
				loadPagination(0);

							
			},
			complete:function(){
				//#29d ganti itu paada nprogress css agar progressnya bisa ganti warna
				NProgress.done();
  				NProgress.remove();
				$('#loading').hide();
			},
		});
	});



/*$(document).on('keyup', '#pencarian', function(e) {
	 e.preventDefault();
     ooke();
     paginated();

});
//pencarian dari fungsi paginated sampai ooke

 function paginated() {
     $(document).on('click keyup', '#paginati a','#pencarian', function(event) {
         var pagen = $(this).attr('data-ci-pagination-page');
         var search = $('#pencarian').val();
        
        	$('#nilai').text(pagen);			

			if(pagen){
				pagen;
			}
			else{
				pagen=0;
			}



		if(search !=''){
			
			load_data(search,pagen);
		}

		else{
			loadPagination(0);
			$('#paginati').hide();
			$('#pagination').show();
		}

         return false;
     }).click(); //to trigger click event 
 }

function ooke(){

$(document).on('click keyup',function(e){

		e.preventDefault();
			var search = $('#pencarian').val();
			var pagen = 0;
			var jumlah = $('a[class=baru]').attr("oke");


				$('#nilai').text(pagen);			

			if(pagen){
				pagen;
			}
			else{
				pagen=0;
			}

		if(search !=''){
			
			load_data(search,pagen);
		}

		else{
			loadPagination(0);
			$('#paginati').hide();
			$('#pagination').show();
		}


});

}
*/
//edit agar tetap ditempat
		$(".mengubah").click(function(e){
		var id=$('#forme .id').val();
		
		//agar saat menekan tombol edit, bila datanya kosong bisa menampilkan alert
		if(id==''){
			alert('silahkan pilih data dahulu');
		}
		//berakhir

		e.preventDefault();
		var nama= $("#pencarian").val();
		//mendefinisikan apakah id pagination displaynya block atau none
		var tamp= $('#pagination').css('display');
		
		var pagen="";
		var page="";


		if(tamp=='block'){
		pagen = $('.baru').attr('oke');
		}
		else if(tamp=='none'){
		pagen = $('#paginati .baru').attr('oke');

				//mencari apakah nilai oke di class baru terdefinisi atau tidak
				if(pagen>=1){
					pagen;
				}
				else{
					pagen=0;
				}

		}

		//jika pagen 0
		if(pagen==0){
		
			page=0;
			
		}
		else{
			page = ((pagen/5)+1);
		}
			
		$.ajax({

		url:"<?php echo base_url('ajaxpaging/aksi_edit/')?>",
		type:'post',
		dataType:'JSON',
		data:$('#forme').serialize(),
		success:function(response){
			$('#forme')[0].reset();
			id=$('#forme .id').val('');	
				
					if(tamp=='block'){
					loadPagination(page);
					}
					else if(tamp=='none'){
					load_data(nama,page);
					}		
				


			
		
		}
	});

	});



//pagination search sukses yeeee yeeee
$(document).on('click keyup','#pencarian, #paginati a',function(e){
		e.preventDefault();
			var search = $('#pencarian').val();
			var pagen = $(this).attr('data-ci-pagination-page');
			var jumlah = $('a[class=baru]').attr('oke');

					$('#nilai').text(pagen);						

			if(pagen){
				pagen;
			}
			else{
				pagen=0;
			}

		if(search !=''){
			
			load_data(search,pagen);
		}

		else{
			loadPagination(0);
			$('#paginati').hide();
			$('#pagination').show();
		}


});



//load data untuk pagination pencarian
function load_data(query,page){

	$('#ko').text(page);
	$.ajax({
		url:"<?php echo base_url('ajaxpaging/cari/')?>"+query+'/'+page,
		type:"get",
		dataType:'json',
		beforeSend:function(){
			$('#loading').show();
		},
		success:function(response){
			
			$('#pagination').hide();
			$('#paginati').show();
			$('#paginati').html(response.pagination);
			console.log(page);
			cobatabel(response.result,response.row,response.jumlah);
			$('#loading').hide();
		}
	});

}


	
	//detect pagination link
	$('#pagination').on('click','a',function(e){
		e.preventDefault();
		var pageno = $(this).attr('data-ci-pagination-page');
		loadPagination(pageno);

	});

	loadPagination(0);

	//load pagination

	function loadPagination(pagno){

		$.ajax({
			url:"<?php echo base_url('ajaxpaging/loadRecord/')?>" + pagno,
			type:'get',
			dataType:'json',
			success:function(response){
				$('#pagination').html(response.pagination);
				console.log(response.result);
				createTable(response.result,response.row);
				keluarrow(response.row);
				cobatabel(response.result,response.row,response.jumlah);
				percobaan(response.cobas,response.row);
	

			}
		});

	}

	function percobaan(coba,angka){
		$('#coba').html(coba);
		$('#angka').html(angka);

	}



//menampilkan tabel paling atas
	function cobatabel(oke,sno,jumlah){
		sno = Number(sno);
		$('#cobaa tbody').empty();
		if(jumlah<1){
			var out ='<tr>';
			out +='<td colspan="4"><center>Jumlah record kosong</center></td>';
			out +='</tr>';
			 $('#cobaa tbody').append(out);			
		}
		else{

				for(i in oke){
					var id = oke[i].id;
					var nama = oke[i].nama;
					var alamat = oke[i].alamat;
					var kelas = oke[i].kelas;
					
					sno += 1;

					var out ='<tr>';
					out +='<td>'+sno +'</td>';
					out +='<td>'+nama+'</td>';
					out +='<td>'+alamat+'</td>';
					out +='<td>'+kelas+'</td>';
					out +='<td>'+'<button class="ubahlah" no="'+id+'">'+'EDIT</button>';
					out +='<button class="hapuslah" no="'+id+'">'+'Hapus</button>';
					out +='<button class="woke" no="'+id+'">'+'test</button>';
					out +='<input type="checkbox" class="delete_checkbox" value="'+id+'"/></td>';

					out +='</tr>';
					 $('#cobaa tbody').append(out);
								
				}
			}

	}
	//percobaan agar bisa on click di jquery
	$('table').on('click', '.woke', function (){
		var id=$(this).attr('no');
        alert(id);
    });

	//mengubah data
    $('table').on('click','.ubahlah',function(){
    
    	$('#forme')[0].reset();
    	var id=$(this).attr('no');
    	$.ajax({

    		url:"<?php echo base_url('ajaxpaging/edit/')?>"+id,
    		type:'get',
    		dataType:'JSON',
    		success:function(data){
				$('[name="id"]').val(data[0].id);
				$('[name="nama"]').val(data[0].nama);
				$('[name="alamat"]').val(data[0].alamat);
				$('[name="kelas"]').val(data[0].kelas);
				
			},
			error:function(jqXHR,textStatus,errorThrown){
				alert('gagal add atau update');
			}
    	});
    });

//menghapus data
    $('table').on('click','.hapuslah',function(){

    	var nama= $("#pencarian").val();
		//mendefinisikan apakah id pagination displaynya block atau none
		var tamp= $('#pagination').css('display');
		
		var pagen="";
		var page="";


		if(tamp=='block'){
		pagen = $('.baru').attr('oke');
		}
		else if(tamp=='none'){
		pagen = $('#paginati .baru').attr('oke');

				//mencari apakah nilai oke di class baru terdefinisi atau tidak
				if(pagen>=1){
					pagen;
				}
				else{
					pagen=0;
				}

		}

		//jika pagen 0
		if(pagen==0){
		
			page=0;
			
		}
		else{
			page = ((pagen/5)+1);
		}

    	var id=$(this).attr('no');
	    if(confirm('apa mau menghapus?')){
				$.ajax({
					url:"<?php echo base_url('ajaxpaging/hapus/')?>"+id,
					type:'delete',
					dataType:'JSON',
					success:function(){
						alert("berhasil hapus");
							if(tamp=='block'){
							loadPagination(page);
							}
							else if(tamp=='none'){
							load_data(nama,page);
							}
					},
						error:function(jqXHR,textStatus,errorThrown){
							alert('gagal add atau update');
						}
				});
		}

    });


//percobaan
		$(".woke").click(function(){
			loadPagination(0);
			$('#ko').text("kkkll");
		});

//menampilkan data setelah menambah data
	function createTable(result,sno){
		sno = Number(sno);
		$('#postsList tbody').empty();

		for(index in result){
			var id = result[index].id;
			var nama = result[index].nama;
			var alamat = result[index].alamat;
			var kelas = result[index].kelas;

			sno += 1;

			var tr ='<tr>';
			tr += '<td>'+sno+'</td>';
			tr += '<td>'+nama+'</td>';
			tr += '<td>'+alamat+'</td>';
			tr += '<td>'+kelas+'</td>';
			tr += '</tr>';
			$('#postsList tbody').append(tr);
		}

	}
	//entahlah fungsinya untuk apa
	
	function keluarrow(terserah){
		$('#ha').html(terserah);
	}



	//membuat table




});


</script>

</body>
</html>