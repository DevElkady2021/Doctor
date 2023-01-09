@extends('home')
@section('title', 'الزيارات ')
@section('page', 'الزيارات')

@section('css')

@endsection
@section('content')

<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        
        <div class="table-container">
            <div class="t-header">
             <div class="row">
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-8 col-8">
                    @yield('page')
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                    <button type="button" class="btn btn-info rounded-pill" data-toggle="modal" data-target="#basicModal">
                        اضافه 
                    </button>
                </div>
                <div class="col-xl-0 col-lg-0 col-md-0 col-sm-2 col-2">
                </div>
             </div>
            </div>
            <div class="table-responsive">
                <table id="fixedHeader" class="table custom-table text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>تاريخ الزياره</th>
                            <th>اسم المريض </th>
                            <th>الطبيب المعالج</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1  ?>
                        @foreach ($visits as $visit)
                        <tr>
                            <td>{{ $x++ }}</td>
                            <td>{{ $visit->date }}</td>
                            <td>{{ $visit->patient->name }}</td>
                            <td>{{ $visit->doctor->name }}</td>
                            <td>  <button type="button" class="btn btn" data-toggle="modal" data-target="#edit{{ $visit->id }}">
                                <span class="icon-border_color text-success h5"></span> 
                            </button></td>
                            <td>  <button type="button" class="btn btn" data-toggle="modal" data-target="#DeleteModal{{ $visit->id }}">
                                <span class="icon-trash text-danger h5"></span>
                            </button></td>

                            <td><a href="{{ route('ticket.edit',$visit->id) }}"><span class="icon-file text-danger h5"></span></a></td>
                       


                            <!-- Edit   Modal -->
                            <div class="modal fade" id="edit{{ $visit->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="basicModalLabel">تعديل زيارة</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('visits.update',$visit->id) }}" method="post" >
                                            @csrf
                                            @method('PUT')
                                        <div class="modal-body">
                                            <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="inputReadOnly">تاريخ الزيارة <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputReadOnly" type="date"  name="date" value="{{ $visit->date }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="inputReadOnly">اسم المريض <span class="text-danger">*</span></label>
                                                    <select class="form-control " data-live-search="true" name="patient_id">
                                                        @foreach ($patients as $patient)
                                                            <option value="{{ $patient->id }}" @if($visit->patient->id == $patient->id) selected @endif>{{ $patient->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="inputReadOnly">الطبيب المعالج <span class="text-danger">*</span></label>
                                                    <select class="form-control " data-live-search="true" name="doctor_id">
                                                        @foreach ($doctors as $doctor)
                                                            <option value="{{ $doctor->id }}" @if($visit->doctor->id == $doctor->id) selected @endif>{{ $doctor->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <textarea name="note" id="" cols="60" rows="3"  class="form-control">{{ $visit->note }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">حفظ</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                              <!-- Delete Model  -->
                         	<!-- Modal -->
                             <div class="modal fade" id="DeleteModal{{ $visit->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="basicModalLabel">حذف زياره</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('visits.destroy',$visit->id) }}" method="post" >
                                            @csrf
                                            @method('Delete')
                                        <div class="modal-body">
                                            <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <h5>هل انت متاكد من حذف زياره 
                                                        <hr>
                                                        <span class="text-danger mx-3 ">{{ $visit->patient->name }}</span>   
                                                        <hr>
                                                        <span>{{ $visit->date }}</span> 
                                                    </h5>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">حفظ</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                        </div>
                                    </form>
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
</div>

	<!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="basicModalLabel">اضافه زيارة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('visits.store') }}" method="post" >
                    @csrf
                <div class="modal-body">
                 
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="inputReadOnly">تاريخ الزيارة <span class="text-danger">*</span></label>
                            <input class="form-control" id="inputReadOnly" type="date"  name="date">
                        </div>
                    </div>
                  
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                    	<div class="form-group">
                            <label for="inputReadOnly">اسم المريض <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" data-live-search="true" name="patient_id">
                                  <option label="" selected disabled>اختر المريض</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                    	<div class="form-group">
                            <label for="inputReadOnly">الطبيب المعالج <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" data-live-search="true" name="doctor_id">
                                   <option label="" selected disabled>اختر الطبيب</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <textarea name="note" id="" cols="60" rows="3" placeholder="اضف ملاحظاتك ان وجدت" class="form-control"></textarea>
                        </div>
                    </div>
                 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection

