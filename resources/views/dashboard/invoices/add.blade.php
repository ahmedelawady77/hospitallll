@extends('dashboard.layouts.master')
@section('css')
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assetsdashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{URL::asset('assetsdashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

    <!-- Internal Select2 css -->
    <link href="{{URL::asset('Dashboassetsdashboardard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('assetsdashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assetsdashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assetsdashboard/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('assetsdashboard/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">

@section('title')
    اضافه فاتوره
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> اضافه فاتوره</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
               اضافه فاتوره</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
@include('dashboard.messages_alert')

    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('singleinvoice.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     <div class="pd-30 pd-sm-40 bg-gray-200">

                       <div class="row row-xs align-items-center mg-b-20">
                              <div class="col-md-1">
                                <label for="patientId">اسم المريض</label>
                             </div>
                           <div class="col-md-11 mg-t-5 mg-md-t-0">
                              <select class="form-control" name="patientId" id="patientId">
                                <option value="">-- اختر المريض --</option>
                                   @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                   @endforeach
                              </select>
                          </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                              <div class="col-md-1">
                                <label for="doctortId">اسم الدكتور</label>
                             </div>
                           <div class="col-md-11 mg-t-5 mg-md-t-0">
                              <select class="form-control" name="doctortId" id="doctortId">
                                <option value="">-- اختر الدكتور --</option>
                                   @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                   @endforeach
                              </select>
                          </div>
                        </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        القسم</label>
                                </div>

                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <select name="section_id" class="form-control SlectBox">
                                        <option value="" selected disabled>------</option>
                                        @foreach($sections as $section)
                                            <option value="{{$section->id}}">{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                              <div class="col-md-1">
                                <label for="invoiceType">نوع الفاتوره</label>
                              </div>
                             <div class="col-md-11 mg-t-5 mg-md-t-0">
                               <select class="form-control" name="invoiceType" id="invoiceType">
                                 <option value="">-- اختر نوع الفاتوره --</option>
                                 <option value="cash">نقدي</option>
                                 <option value="credit">اجل</option>
                               </select>
                             </div>
                            </div>

                           <div class="row row-xs align-items-center mg-b-20">
                                 <div class="col-md-1">
                                    <label for="servicetId">اسم الخدمه</label>
                                 </div>
                             <div class="col-md-5 mg-t-5 mg-md-t-0">
                                <select class="form-control" name="servicetId" id="servicetId" onchange="updateServicePrice()">
                                   <option value="">-- اختر الخدمه --</option>
                                       @foreach ($services as $service)
                                   <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }}</option>
                                      @endforeach
                                </select>
                               </div>
                                 <div class="col-md-6 mg-t-5 mg-md-t-0">
                                   <span id="servicePrice" class="form-control">-- سعر الخدمه --</span>
                                 </div>
                              </div>

                                    <script>
                                       function updateServicePrice()
                                        {
                                       const selectedServiceId = $('#servicetId').val();
                                       const selectedServicePrice = $('#servicetId option:selected').data('price');

                                        if (selectedServicePrice) {
                                        $('#servicePrice').text(selectedServicePrice);
                                        } else {
                                        $('#servicePrice').text('-- سعر الخدمه --');
                                        }
                                        }
                                        
                                    </script>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="valueofdiscond">قيمه الخصم</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="valueofdiscond" type="valueofdiscond">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                   <div class="col-md-1">
                                        <label for="taxRate">نسبه الضريبه</label>
                                  </div>
                               <div class="col-md-11 mg-t-5 mg-md-t-0">
                                 <select class="form-control" name="taxRate" id="taxRate" onchange="updateServicePrice()">
                                   <option value="">-- اختر الضريبه --</option>
                                     <option value="5">5%</option>
                                     <option value="10">10%</option>
                                     <option value="15">15%</option>
                                     <option value="20">20%</option>
                                     <option value="25">25%</option>
                                     <option value="30">30%</option>
                                     <option value="30">35%</option>
                                     <option value="30">40%</option>

                                   </select>
                                </div>
                            </div>



                            </div>
                                    <button type="submit"
                                    class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">ارسال</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assetsdashboard/js/select2.js') }}"></script>
    <script src="{{ URL::asset('assetsdashboard/js/advanced-form-elements.js') }}"></script>

    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assetsdashboard/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{URL::asset('assetsdashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('assetsdashboard/plugins/notify/js/notifit-custom.js')}}"></script>


    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('dashboard/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('dashboard/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('dashboard/js/form-elements.js')}}"></script>


@endsection
