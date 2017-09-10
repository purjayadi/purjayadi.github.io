<?php
$this->load->view('administrator/template/header');
$this->load->view('administrator/template/navbar');
?>
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            
        <?php
            $this->load->view('administrator/template/sidebar');
        ?>
            <!-- Main content -->
        <div class="content-wrapper">

        <div class="content">
        <a href="<?php echo base_url('users/create')?>" class="btn btn-success" ><i class=" icon-user-plus"></i> Tambah Data</a>
        <button class="btn btn-default" onclick="reload_table()"><i class=" icon-sync"></i> Reload</button>
        <button class="btn btn-danger" onclick="bulk_delete()"><i class="icon-trash"></i> Delete selected</button>
        <br />
        <br />
        <div class="panel panel-flat">
            <div class="panel-heading">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>
                        </div>
        <?php echo $this->session->flashdata('message'); ?> 
        <table id="table" class="table table-hover datatable-button-html5-columns datatable-responsive table-striped" >
            <thead>
                <tr>
                    <th><input type="checkbox" id="check-all"></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Company</th>
                    <th>Alamat</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Created On</th>
                    <th>Last Login</th>
                    <th>Jatuh Tempo</th>
                    <th>Status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
<script type="text/javascript">

var save_method; //for save method string
var table;
$(function() {
$.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        searchHighlight: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true,
        
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        columnDefs: [
            {
                targets: [3,4,6,8,10],
                visible: false
            },
            {
                className: 'control',
            },
            { 
                width: "100px",
                targets: [6]
            },
            { 
                targets: [ 0 ], //first column
                orderable: false, //set not orderable
            },
            { 
                targets: [ -1 ], //last column
                orderable: false, //set not orderable
            },
            
        ],
        order: [1, 'asc'],
        dom: '<"datatable-header"fBl><"datatable-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        }
    });


    // Basic initialization
    $('.datatable-button-html5-basic').DataTable({
        buttons: {            
            dom: {
                button: {
                    className: 'btn btn-default'
                }
            },
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        }
    });


    // PDF with image
    
    $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });
    // Column selectors
    $('.datatable-button-html5-columns').DataTable({

        buttons: {            
            buttons: [
                {
                    extend: 'copyHtml5',
                    text: '<i class=icon-copy position-left"></i> Copy',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                extend: 'print',
                text: '<i class="icon-printer position-left"></i> Print',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':visible'
                }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="icon-file-excel"></i> Excel',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class=" icon-file-pdf"></i> PDF',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="icon-move-vertical"></i> Visible Columns',
                    className: 'btn btn-default btn-icon'

                }
            ]
        }
    });
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
    });
    

    // Tab separated values
    $('.datatable-button-html5-tab').DataTable({
        buttons: {            
            buttons: [
                {
                    extend: 'copyHtml5',
                    className: 'btn btn-default',
                    text: '<i class="icon-copy3 position-left"></i> Copy'
                },
                {
                    extend: 'csvHtml5',
                    className: 'btn btn-default',
                    text: '<i class="icon-file-spreadsheet position-left"></i> CSV',
                    fieldSeparator: '\t',
                    extension: '.tsv'
                }
            ]
        }
    });
    


    // External table additions
    // ------------------------------
    $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,  
        });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    // Enable Select2 select for the length option
    $('.dataTables_length select2').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    
    //datepicker
    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
    });
    $(".datepicker-menus").datepicker({
        changeMonth: true,
        changeYear: true
    });


});

$.ajaxSetup({
        data: {
            csrf_test_name: $.cookie('csrf_cookie_name')
        }
    });


function reload_table()
{
   $('#table').DataTable().ajax.reload();//reload datatable ajax 
}



function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('users/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

function bulk_delete()
{
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    if(list_id.length > 0)
    {
        if(confirm('Are you sure delete this '+list_id.length+' data?'))
        {
            $.ajax({
                type: "POST",
                data: {id:list_id},
                url: "<?php echo site_url('users/ajax_bulk_delete')?>",
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        reload_table();
                    }
                    else
                    {
                        alert('Failed.');
                    }
                     
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }
    else
    {
        alert('no data selected');
    }
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-teal-300">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Mahasiswa Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                <div class="col-md-6"> 
                    <fieldset>
                                        <br>
                                        <input type="hidden" id="update_csrf_user" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">NIM <span class="text-danger"> *</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM" required="required" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Nama Mahasiswa <span class="text-danger"> *</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="Nama Mahasiswa" required="required" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Tempat Lahir <span class="text-danger"> *</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required="required" >
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label">Tanggal Lahir <span class="text-danger"> *</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control datepicker-menus" placeholder="Pick a date&hellip;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Agama <span class="text-danger"> *</span></label>
                                            <div class="col-lg-9">
                                            <select class="form-control"  name="agama"  data-placeholder="Agama" id="agama" >
                                            <option value="">Pilih...</option>>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu" >Hindu</option>
                                            <option value="Budha" >Budha</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Jenis Kelamin <span class="text-danger"> *</span></label>
                                            <div class="col-lg-9">
                                            <select class="form-control"  name="jenis_kelamin"  data-placeholder="jenis kelamin" id="jenis_kelamin" >
                                            <option value="">Pilih...</option>>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Alamat <span class="text-danger"> *</span> :</label>
                                            <div class="col-lg-9">
                                               <textarea rows="5" cols="5" class="form-control" class="form-control" id="alamat" name="alamat" placeholder="Lokasi" required="required"></textarea>
                                               
                                            </div>
                                        </div>

                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                       <br>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Angkatan <span class="text-danger"> *</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="angkatan" id="angkatan" class="form-control" required="required" placeholder="Tahun Angkatan" >
                                               
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label">Sekolah Asal <span class="text-danger"> *</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="sekolah_asal" id="sekolah_asal" required="required" class="form-control" placeholder="Sekolah Asal" >
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label">No. HP/Telpn. <span class="text-danger"> *</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="+00-00-0000-0000">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Golongan Darah <span class="text-danger"> *</span></label>
                                            <div class="col-lg-9">
                                            <select  name="gol_darah" id="gol_darah" data-placeholder="Pilih Golongan Darah" class="form-control">
                                                <option value="">Pilih..</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                            </select>
                                        </div>
                                        </div>
                                       <div class="form-group">
                                        <label class="col-lg-3 control-label">Photo</label>
                                        <div class="col-lg-9">
                                            <div class="media no-margin-top">
                                                <div class="media-left">
                                                    <a href="" target="_blank"><img src="" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
                                                </div>

                                                <div class="media-body">
                                                    <input type="file" class="form-control" name="photo" id="photo">
                                                    <span class="help-block">Accepted formats: gif, png, jpg, bmp. Max file size 2Mb</span>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
</div><!-- /.modal -->
<?php
    $this->load->view('administrator/template/footer');
?>