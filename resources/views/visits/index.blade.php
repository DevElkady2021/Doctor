@extends('home')
@section('title', 'الزيارات ')
@section('css')

@endsection
@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-lg-9">
                <div class="">
                    <h3> الزيارات </h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3">
                <div class="">
                    <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"> اضافة زياره </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-sm">
                <table id="example" class="display table table-striped" style="width:100%">
                    <thead>
                        <tr style="text-align: center;color:black; background-color:rgb(211, 134, 19)">
                            <th>التاريخ </th>
                            <th>اسم المريض </th>
                            <th>العمليات </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visits as $visit)
                            <tr style="text-align: center;color:rgb(28, 47, 153)">
                                <td>{{ $visit->date }}</td>
                                <td>{{ $visit->patient->name }}</td>
                                <td>
                                    <div class="conhhh text-center">
                                        <a href="#" style="color: white;" class="action quickview btn btn-primary"
                                            data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $visit->id }}"> تعديل </a>

                                        <a href="#" style="color: white;" class="action quickview btn btn-danger"
                                            data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $visit->id }}"> حذف </a>

                                        <a type="button" class="btn btn-primary" href="{{ route('ticket.edit',$visit->id) }}"> روشته </a> 
                                        <a type="button" class="btn btn-info" href="{{ route('ticket.show',$visit->id) }}"> print </a>   
                                </td>
                                <div class="countermodel contentmoder">
                                    <div class="modal fade" id="editModal{{ $visit->id }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="heading-title">تعديل بيانات المريض </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="cobtervvvbb">
                                                        <form action="{{ route('visits.update', $visit->id) }}"
                                                            method="POST">
                                                            {{ method_field('patch') }}
                                                            @csrf
                                                            <div class="bd-examplepl">
                                                                <div class="row">
                                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                                            هذه العلامة (*) حقول مطلوبة.</small></p>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $visit->id }}">
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> اسم المريض *</label>
                                                                        <div class="controlsopop">
                                                                            <select id="" class="form-control"
                                                                                name="patient_id">
                                                                                @foreach ($patients as $patient)
                                                                                    <option value="{{ $patient->id }}"
                                                                                        @if ($patient->id == $visit->patient->id) selected @endif>
                                                                                        {{ $patient->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> التاريخ *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fas fa-user"></i>
                                                                            <input class="form-control" type="date"
                                                                                name="date" placeholder="" required
                                                                                value="{{ $visit->date }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                                    <div class="buttonofff">
                                                                        <button type="submit"
                                                                            class="btn btn-info">حفظ</button>
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
                                    <div class="modal fade" id="delete{{ $visit->id }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="heading-title"> حذف بيانات زياره </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="cobtervvvbb">
                                                        <form action="{{ route('visits.destroy', $visit->id) }}"
                                                            method="POST">
                                                            @method('Delete')
                                                            @csrf
                                                            <div class="bd-examplepl">
                                                                <div class="row">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $visit->id }}">
                                                                    هل انت متاكد من الحذف
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                                        <div class="buttonofff">
                                                                            <button type="submit"
                                                                                class="btn btn-info">موافق</button>
                                                                            <button type="button"
                                                                                class=" btn btn-secondary"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">الغاء</button>
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
                        <h4 class="heading-title">اضافة زياره </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <p class="italic"><small>الحقول التى تحتوى على
                                    هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form action="{{ route('visits.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 col-sm-12 col-lg-12 pl-0 mb-25 pr-0 pl-0">
                                    <div class="cobtervvvbb">
                                        <div class="datapriii">
                                        </div>
                                    </div>
                                    <div class="bd-examplepl">
                                        <div class="row">
                                            <div class="form-group col-12 labelform">
                                                <label> اسم المريض *</label>
                                                <select id="" class="form-control" name="patient_id">
                                                    <option value="" selected disabled>حدد المريض </option>
                                                    @foreach ($patients as $patient)
                                                        <option value="{{ $patient->id }}">{{ $patient->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-12 labelform">
                                                <label> التاريخ *</label>
                                                <div class="controlsopop">
                                                    <input type="date" name="date" placeholder="اضافة"
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
    </div>
    </div>
    </div>


 
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
@endsection
@section('scripts')
    @include('sweetalert::alert')

  @endsection
