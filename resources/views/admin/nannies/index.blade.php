@extends('admin.components.tables.table')
@section('pageName',trans('Nannies'))
@section('thead')
    <tr>
        <th>{{trans('web.id')}}</th>
        <th>{{trans('web.image')}}</th>
        <th>{{trans('web.name')}}</th>
        <th>{{trans('web.mobile')}}</th>
        <th>{{trans('country')}}</th>
        <th>{{trans('age')}}</th>
        <th>{{trans('religion')}}</th>
        <th>{{trans('children')}}</th>
        <th>{{trans('job')}}</th>
        <th>{{trans('salary')}}</th>
        <th>{{trans('experience')}}</th>
        <th>{{trans('marital status')}}</th>
        <th>{{trans('education')}}</th>
        <th>{{trans('height')}}</th>
        <th>{{trans('weight')}}</th>
        <th>{{trans('arabic')}}</th>
        <th>{{trans('english')}}</th>
        <th>{{trans('skills')}}</th>
        <th>{{trans('broker name')}}</th>
        <th>{{trans('web.actions')}}</th>
    </tr>

@stop
{{--  @if (auth()->User()->group->nannies_add == 1)
@section('modal')
    @include('admin.nannies.create',['id'=>'createmodal','name'=>trans('Create New Nanny'),'action'=>url()->current()])
@stop
@endif  --}}
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
                aLengthMenu: [[15, 50, 100, 200, 500, 1000,-1], [15, 50, 100, 200, 500, 1000,'{{trans('web.showAll')}}']],
                select: {
                    style: "multi"
                },
                order: [[1, "asc"]],
                bInfo: true,
                pageLength: 15,
                buttons: [

                    {extend:'copy',text:'<i class="feather icon-copy"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'csv',text:'<i class="fa fa-file-archive-o"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'excel',text:'<i class="fa fa-file-excel-o"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'pdf',text:'<i class="fa fa-file-pdf-o"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'print',text:'<i class="feather icon-printer\n"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                ],
                processing: true,
                serverSide: true,
                scroller:   true,
                ajax: {
                    url: "{{url()->current()}}"
                },
                "columns": [
                    {data: 'id', name: 'id'},
                    {
                        data: 'main_image' ,
                        name: 'main_image',
                        "mRender": function (data, type, row) {
                            return  '<div class="avatar  avatar-xl"><a target="_blank" href="{{ url("storage/") }} ' + data + '"><img src= "{{ url("storage/") }} ' + data + ' "></a></div>';
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'country_name', name: 'country_name'},
                    {data: 'age', name: 'age'},
                    {data: 'religion', name: 'religion'},
                    {data: 'children', name: 'children'},
                    {data: 'job', name: 'job'},
                    {data: 'salary', name: 'salary'},
                    {data: 'experience', name: 'experience'},
                    {data: 'marital_status', name: 'marital_status'},
                    {data: 'education', name: 'education'},
                    {data: 'height', name: 'height'},
                    {data: 'weight', name: 'weight'},
                    {data: 'arabic_lang', name: 'arabic_lang'},
                    {data: 'english_lang', name: 'english_lang'},
                    {data: 'skills', name: 'skills'},
                    {data: 'broker_name', name: 'broker_name'},
                    {

                        "mRender": function (data, type, row) {
                            var data2 = '';

                                @if (auth()->User()->group->nannies_delete == 1 )
                            var data2 = '<a href="javascript:void(0)" data-id="' + row.id + '"  class="action-delete"><i class="feather icon-trash action-delete"></i></a>';
                                @endif
                                return  data2;
                        }, orderable: false, searchable: false
                    }
                ],
                initComplete: function (settings, json) {
                    $(".dt-buttons .btn").removeClass("btn-secondary")
                }
            });
        });
    </script>
@stop
