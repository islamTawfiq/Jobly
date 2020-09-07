@extends('admin.components.tables.table')
@section('pageName','Export Agencies')
@section('thead')
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Manager Name</th>
        <th>Country</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Official Documentation</th>
        <th>Status</th>
        <th>Registered At</th>
        <th>Actions</th>

    </tr>
@stop
@if (auth()->User()->group_id->agencies_add == 1)
@section('modal')
    @include('admin.users.agencies.export.create',['id'=>'createmodal','name'=>trans('create new Agency'),'action'=>url()->current()])
@stop
@endif
@section('table_scripts')
    <script>
        $(document).ready(function () {
            "use strict";
            var dataListView = $(".data-list-view").DataTable({
                responsive: true,
                columnDefs: [
                    {
                        orderable: true,
                        targets: 0,
                        // checkboxes: { selectRow: true }
                    }
                ],
                dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
                oLanguage: {
                    sLengthMenu: "_MENU_",
                    sSearch: ""
                },
                aLengthMenu: [[15, 50, 100, 200, 500, 1000,-1], [15, 50, 100, 200, 500, 1000,'Show All']],
                select: {
                    style: "multi"
                },
                order: [[1, "asc"]],
                bInfo: true,
                pageLength: 15,
                buttons: [
                    @if (auth()->User()->group->agencies_add == 1)
                    {
                        text: "<i class='feather icon-plus'></i>Add New",
                        action: function () {
                            $(this).removeClass("btn-secondary");
                            $(".add-new-data").addClass("show");
                            $(".overlay-bg").addClass("show");
                        },
                        className: "btn btn-white  buttons mb-1  waves-effect waves-light"
                    },
                    @endif
                    {extend:'copy',text:'<i class="feather icon-copy"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'csv',text:'<i class="fa fa-file-archive-o"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'excel',text:'<i class="fa fa-file-excel-o"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'pdf',text:'<i class="fa fa-file-pdf-o"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'print',text:'<i class="feather icon-printer\n"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{url()->current()}}"
                },
                "columns": [
                    {data: 'id' , name: 'id'},
                    {data: 'agency_name' , name: 'agency_name'},
                    {data: 'manager_name' , name: 'manager_name'},
                    {data: 'country_name' , name: 'country_name'},
                    {data: 'address' , name: 'address'},
                    {data: 'phone' , name: 'phone'},
                    {data: 'telephone' , name: 'telephone'},
                    {data: 'email' , name: 'email'},
                    {
                        data: 'user_image' ,
                        name: 'user_image',
                        "mRender": function (data, type, row) {
                            return  '<div class="avatar  avatar-xl"><a target="_blank" href="{{ url("storage/") }}'+data+'"><img src= "{{ url("storage/") }}'+data+'"></a></div>';
                        }
                    },
                    {
                    className:'my_class',
                    "mRender": function (data, type, row) {
                        if (row.status == 0) {
                            return '<div class="chip chip-danger"> <div class="chip-body"> <div class="chip-text">Pending</div> </div> </div>';
                        }else if(row.status == 1){
                            return '<div class="chip chip-success"> <div class="chip-body"> <div class="chip-text">Accepted</div> </div> </div>';
                        }
                    }
                },

                    {data: 'created_at' , name: 'created_at'},
                    {

                        "mRender": function (data, type, row) {
                            var data1 = '' ,
                                data2 = '' ,
                                data3 = '' ;
                                data4 = '' ;
                            @if (auth()->User()->group->agencies_edit == 1 )
                            var data1 = '<a href="{{url()->current()}}/' + row.id + '/edit" class="action-edit"><i class="feather icon-edit"></i></a>';
                            @endif
                            @if (auth()->User()->group->agencies_delete == 1 )
                            var data2 = '<a href="javascript:void(0)" data-id="' + row.id + '"  class="action-delete"><i class="feather icon-trash action-delete"></i></a>';
                            @endif
                            var data3 = '<a href="javascript:void(0)" data-id="' + row.id + '"  class="action-status"><i class="feather icon-pause action-status"></i></a>';
                            var data4 = '<a href="{{ url("/admin/user") }}/' + row.id + '/send" class="action-edit"><i class="feather icon-send"></i></a>';
                            return data1 + data3 + data2 + data4;
                        }, orderable: false, searchable: false
                    }
                ],
                initComplete: function (settings, json) {
                    $(".dt-buttons .btn").removeClass("btn-secondary")
                }
            });
        });
    </script>
    @include('admin.layout.scripts.status.index')
@stop
