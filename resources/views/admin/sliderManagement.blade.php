@extends('layouts.adminLayout')
@section('content')

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" dir="rtl">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">نمایش تصویر دسته</h2>
                </div>
                <div class="modal-body">
                    <img class="image" id="image"  style=" height: 350px; width: 350px; margin-left: 80%;"  src="">
                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-dark col-md-6 col-md-offset-3" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>


    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> مدیریت دسته بندی ها</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i
                                        class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link" data-toggle="tooltip" title="بستن"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>


                <a href="{{url('admin/addSlider')}}" id="user-send" type="button" class="col-md-2 col-md-offset-5 btn btn-info" style=" font-weight: bold;">
                    <i class="fa fa-th-list"></i>                    افزودن اسلایدر                </a>
                {{--<div class="pull-right" style="direction: rtl"><i class="fa fa-square" style="font-size: 35px;color:#ffff80;"></i> مدیران واحد</div>--}}
                <div class="x_content">
                    <table style="direction:rtl;text-align: center" id="example"
                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <thead>
                        <tr>
                            <th style="text-align: center">ردیف</th>
                            <th style="text-align: center">عنوان اسلایدر</th>
                            <th style="text-align: center">تصویر</th>
                            <th style="text-align: center">وضعیت</th>
                            <th style="text-align: center;border-right: 1px solid #d6d6c2">ویرایش</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0 ?>
                        @foreach($sliders as $slider)
                            <tr class="unit">
                                <td style="font-size: 120%">{{++$i}}</td>
                                <td style="font-size: 120%">{{$slider->title}}</td>
                                @if($slider->image_src == null)
                                    <td style="font-size: 120%">تصویر ندارد</td>
                                @endif
                                @if($slider->image_src != null)
                                    <td><button class="btn btn-basic" content="{{$slider->image_src}}" id="showPicture">مشاهده تصویر</button></td>
                                @endif
                                @if($slider->active == 1)
                                    <td style="color: green; font-size: 150%;">فعال</td>
                                @endif
                                @if($slider->active == 0)
                                    <td style="color:red; font-size : 150%;">غیر فعال</td>
                                @endif
                                <td><strong><a class="btn btn-warning col-md-8 col-md-offset-2"   href="{{url('admin/editSlider/'.$slider->id)}}">ویرایش</a></strong> </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).on('click','#showPicture',function(){
                var src= $(this).attr('content');
                $('#image').attr("src","{{url('public/dashboard/sliderImages')}}"+'/'+src);
                $('#myModal').modal('show');
            })
        </script>
@endsection
