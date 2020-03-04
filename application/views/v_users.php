<?php $this->load->view('_head'); ?>
<h3>Users</h3>
<div id="konten">
<a class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">Tambah data</a>
<table class="table table-condensed" id="mytable">
	<thead>
		<tr>
			<th>NO</th>
			<th>id_role</th>
			<th>Nama</th>
			<th>Telfon</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="show_data">
		<!--<?php
$no = 1;
		 foreach ($dusers as $ke): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?= $ke->role; ?></td>
				<td><?php echo $ke->nama; ?></td>

				<td><?php echo $ke->phone; ?></td>
				<td><?php echo $ke->email; ?></td>
				<td><div class="btn-group"><a href="<?php echo base_url('Users/Edit/').$ke->id; ?>" class="btn btn-default">EDIT</a><a href="<?php echo base_url('Users/hapus/').$ke->id; ?>" class="btn btn-danger">Hapus</a></div></td>
			</tr>
		<?php endforeach ?>-->
	</tbody>
</table>
</div>
	<!-- MODAL ADD -->
        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Data users</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Role</label>
                        <div class="col-xs-9">
                           <select class="form-control" id="a_role" name="a_role">
                           	<?php foreach ($drole as $ki): ?>
                           		<option value="<?php echo $ki['id_role']; ?>"><?php echo $ki['role']; ?></option>
                           	<?php endforeach ?>
                           </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="a_nama" id="a_nama" class="form-control" type="text" placeholder="Nama" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Phone</label>
                        <div class="col-xs-9">
                            <input name="a_phone" id="a_phone" class="form-control" type="text" placeholder="" style="width:335px;" required>
                        </div>
                    </div>
    <div class="form-group">
                        <label class="control-label col-xs-3" >EMAIL</label>
                        <div class="col-xs-9">
                            <input name="a_email" id="a_email" class="form-control" type="text" placeholder="" style="width:335px;" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" type="submit" name="submit" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->

       
<?php $this->load->view('_foot'); ?>
 <script>
        	$(document).ready(function(){
        		tampil_data();
$('#mytable').dataTable();

function tampil_data(){
		    $.ajax({
		        type  : 'GET',
		        url   : '<?php echo base_url("Users/data_users")?>',
		        async : true,
		        dataType : 'JSON',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].id+'</td>'+
		                        '<td>'+data[i].role+'</td>'+
		                        '<td>'+data[i].nama+'</td>'+
		                        '<td>'+data[i].phone+'</td>'+
		                        '<td>'+data[i].email+'</td>'+
		                        '<td style="text-align:right;">'+'<div class="btn-group">'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'">Hapus</a>'+'</div>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}


	$('#btn_simpan').on('click',function(){
            var a_role=$('#a_role').val();
            var a_nama=$('#a_nama').val();
            var a_phone=$('#a_phone').val();
            var a_email=$('#a_email').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('users/save');?>",
                dataType : "JSON",
                data : {a_role:a_role , a_nama:a_nama, a_phone:a_phone, a_email:a_email},
                success: function(data){
                    $('[name="a_role"]').val("");
                    $('[name="a_nama"]').val("");
                    $('[name="a_phone"]').val("");
                    $('[name="a_email"]').val("");
                    
                }

            });
 $('#ModalAdd').hide();
                        tampil_data_barang();
            return false;
        });
        	});
        </script>