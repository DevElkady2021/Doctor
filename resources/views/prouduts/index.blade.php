@extends('home')
@section('title', 'الاصناف')
@section('css')

@endsection
@section('content')



    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-lg-9">
                <div class="">
                    <h3> قائمه الاصناف </h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3">
                <div class="">
                    <a href="#" class="action quickview btn btn-success" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"> اضافة صنف </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-sm">
                <table id="example" class="display table table-striped" style="width:100%">
                    <thead>
                        <tr style="text-align: center;color:black; background-color:rgb(12, 158, 56)">
                            <th >اسم الصنف </th>
                            <th >الجرعه </th>
                            <th >العمليات </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr style="text-align: center;color:rgb(0, 38, 255)">
                                <td >{{ $product->name }}</td>
                                <td >{{ $product->dose }}</td>
                               
                                <td>
                                    <div class="conhhh text-center">
                                        <a href="#" style="color: white;" class="action quickview btn btn-success"
                                            data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $product->id }}"> تعديل </a>

                                        <a href="#" style="color: white;" class="action quickview btn btn-danger"
                                            data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $product->id }}"> حذف </a>
                                </td>
                                <div class="countermodel contentmoder">
                                    <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="heading-title">تعديل بيانات الصنف </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">x</span></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="cobtervvvbb">

                                                        <form action="{{ route('prouduts.update', $product->id) }}"
                                                            method="POST">
                                                            {{ method_field('patch') }}
                                                            @csrf
                                                            <div class="bd-examplepl">
                                                                <div class="row">
                                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                                            هذه العلامة (*) حقول مطلوبة.</small></p>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $product->id }}">
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> اسم الصنف *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fas fa-user"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="name" placeholder="" required
                                                                                value="{{ $product->name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> الجرعه *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fas fa-user"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="dose" placeholder="" required
                                                                                value="{{ $product->dose }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                             
                                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                                <div class="buttonofff">
                                                                    <button type="submit" class="btn btn-info">حفظ</button>
                                                                    <button type="button" class=" btn btn-secondary"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close">غلق</button>

                                                                </div>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div><!-- bd-examplepl -->
                                            </div><!-- cobtervvvbb -->
                                        </div>
                                    </div>
                                </div>
            </div>

            {{-- --------------------------------------- --}}

            <div class="countermodel contentmoder">
                <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="heading-title"> حذف صنف  </h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">x</span></button>
                            </div>

                            <div class="modal-body">

                                <div class="cobtervvvbb">

                                    <form action="{{ route('prouduts.destroy', $product->id) }}" method="POST">
                                        @method('Delete')
                                        @csrf
                                        <div class="bd-examplepl">
                                            <div class="row">

                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                هل انت متاكد من الحذف
                                                <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                    <div class="buttonofff">
                                                        <button type="submit" class="btn btn-info">موافق</button>
                                                        <button type="button" class=" btn btn-secondary"
                                                            data-bs-dismiss="modal" aria-label="Close">الغاء</button>

                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div><!-- bd-examplepl -->
                            </div><!-- cobtervvvbb -->
                        </div>
                    </div>
                </div>
            </div>

            {{-- ---------------------------------------- --}}

            </tr>
            @endforeach
            </tbody>
            </table>
        </div>

    </div>
    </div>

    <div class="contentmoder">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="heading-title">اضافة صنف  </h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <p class="italic"><small>الحقول التى تحتوى على
                                    هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form action="{{ route('prouduts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 col-sm-12 col-lg-12 pl-0 mb-25 pr-0 pl-0">
                                    <div class="cobtervvvbb">
                                        <div class="datapriii">
                                        </div>
                                    </div>
                                    <div class="bd-examplepl">
                                        <div class="row">
                                            <div class="form-group col-12 labelform">
                                                <label> اسم الصنف *</label>
                                                <div class="controlsopop">
                                                    <i class="far fa-envelope"></i>
                                                    <input type="text" name="name" placeholder="اضافة"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 labelform">
                                                <label> الجرعه *</label>
                                                <div class="controlsopop">
                                                    <i class="far fa-envelope"></i>
                                                    <input type="text" name="dose" placeholder="اضافة"
                                                        class="form-control">
                                                </div>
                                            </div>
                                         
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                <div class="buttonofff">
                                                    <button type="button" class=" btn btn-secondary"
                                                        data-bs-dismiss="modal" aria-label="Close">غلق</button>
                                                    <button type="submit" class="btn btn-info">حفظ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- bd-examplepl -->
                                </div><!-- cobtervvvbb -->
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Modal end -->
    </div>


@endsection
@section('scripts')
    @include('sweetalert::alert')
@endsection
