@extends('dashboard.layouts.master')
@section('title')
الفواتير
@stop
@section('css')
    <link href="{{URL::asset('assetsdashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0"> /ALL invoices / كل الفواتير</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection 
@section('content')
@include('dashboard.messages_alert')

    
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">

                <div class="card-header pb-0">
                    <a href="{{route('singleinvoice.create')}}" class="btn btn-primary" role="button"
                       aria-pressed="true">اضافه فاتوره</a>
                    <!-- <button type="button" class="btn btn-danger" id="btn_delete_all">{{trans('doctors.delete_select')}}</button> -->
                </div>

                <div class="card-body">
                    <div class="table-responsive"> 
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الخدمه</th>
                                <th>اسم المريض</th>
                                <th>تاريخ الفاتوره</th>
                                <th>اسم الدكتور</th>
                                <th>القسم</th>
                                <th>سعر الخدمه</th>
                                <th>قيمه الخصم</th>
                                <th>نسبه الضريبه</th>
                                <th>قيمه الضريبه</th>
                                <th>نوع الفانوره</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Invoices as $Invoice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>                       
                                    <td>{{ $Invoice->name }}</td>       
                                    <td>{{ $Invoice->name }}</td> 
                                    <td>{{ $Invoice->name }}</td> 
                                    <td>{{ $Invoice->name }}</td> 
                                    <td>{{ $Invoice->name }}</td>                    
                                    <td>{{ $Invoice->email }}</td>
                                    <td>{{ $Invoice->section->name}}</td>
                                    <td>{{ $Invoice->phone}}</td>    
                                    <td>{{ $Invoice->phone}}</td>                    
                                    <td>{{ $Invoice->phone}}</td>                                    
                                    <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('doctors.Processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('doctors.edit',$doctor->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password{{$doctor->id}}"><i   class="text-primary ti-key"></i>&nbsp;&nbsp;تغير كلمة المرور</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$doctor->id}}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;تغير الحالة</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$doctor->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>                           
                                @include('dashboard.invoices.delete')
                                

                            @endforeach
                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

    <!-- <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for(var i in checkboxes){
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>


    <script type="text/javascript">
        $(function () {
            $("#btn_delete_all").click(function () {
                var selected = [];
                $("#example input[name=delete_select]:checked").each(function () {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_select').modal('show')
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        });
    </script> -->

@endsection
