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
        <br>
        <div class="page-header">
            <div class="breadcrumb-line breadcrumb-line-component">
                        <ul class="breadcrumb">
                            <li><a href="index.html"><i class="icon-users position-left"></i> Manage User</a></li>
                            <li class="active">Data Users</li>
                        </ul>
            </div>
        </div>
        <br>
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
<?php
    $this->load->view('administrator/template/footer');
?>