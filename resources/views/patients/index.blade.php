@extends('home')
@section('title', 'المرضى ')
@section('page', 'قائمه المرضى')

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
                          <th>الاسم</th>
                          <th>العمر</th>
                          <th>رقم التليفون</th>
                          <th>النوع</th>
                          <th>العنوان</th>
                          <th>ملاحظات</th>
                          <th></th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1  ?>
                        @foreach ($patients as $patient)
                        <tr>
                          <td>{{ $x++ }}</td>
                          <td>{{ $patient->name }}</td>
                          <td>{{ $patient->age }}</td>
                          <td>{{ $patient->phone }}</td>
                          <td>{{ $patient->type }}</td>
                          <td>{{ $patient->address ?? '---' }}</td>
                          <td>{{ $patient->note ?? '---' }}</td>

                          <td>  <button type="button" class="btn btn" data-toggle="modal" data-target="#basicModal{{ $patient->id }}">
                            <span class="icon-border_color text-success h5"></span>
                        </button></td>
                          <td>  <button type="button" class="btn btn" data-toggle="modal" data-target="#DeleteModal{{ $patient->id }}">
                            <span class="icon-trash text-danger h5"></span>
                        </button></td>
                        </tr>
                        	<!-- Modal -->
                    <div class="modal fade" id="basicModal{{ $patient->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="basicModalLabel">تعديل مريض</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('patients.update',$patient->id) }}" method="post" >
                                    @csrf
                                    @method('PUT')
                                <div class="modal-body">
                                
                                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">الاسم <span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputReadOnly" type="text" value="{{ $patient->name }}" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">العمر<span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputReadOnly" type="text" value="{{ $patient->age }}" name="age">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">رقم التليفون<span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputReadOnly" type="text" value="{{ $patient->phone }}" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">العنوان</label>
                                            <input class="form-control" id="inputReadOnly" type="text" value="{{ $patient->address ?? '---' }}" name="address">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">النوع</label>
                                           <select name="type" id="" class="form-control">
                                            <option value="ذكر" @if($patient->type === "ذكر") selected @endif>ذكر</option>
                                            <option value="انثى"  @if($patient->type === "انثى") selected @endif>انثى</option>
                                           </select>
                                        </div>
                                    </div>
                                
                                        
                                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <textarea name="note" id="" cols="60" rows="3" class="form-control">{{ $patient->note  ?? '---'}}</textarea>
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
                             <div class="modal fade" id="DeleteModal{{ $patient->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="basicModalLabel">حذف مريض</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('patients.destroy',$patient->id) }}" method="post" >
                                            @csrf
                                            @method('Delete')
                                        <div class="modal-body">
                                        
                                            <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <h5>هل انت متاكد من حذف بيانات المريض 
                                                    <span class="text-danger mx-3 ">{{ $patient->name }}</span>    
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
                    <h5 class="modal-title" id="basicModalLabel">اضافه مريض</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('patients.store') }}" method="post" >
                    @csrf
                <div class="modal-body">
                 
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="inputReadOnly">الاسم <span class="text-danger">*</span></label>
                            <input class="form-control" id="inputReadOnly" type="text" placeholder="ادخل الاسم" name="name">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="inputReadOnly">العمر<span class="text-danger">*</span></label>
                            <input class="form-control" id="inputReadOnly" type="text" placeholder="ادخل العمر" name="age">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="inputReadOnly">رقم التليفون<span class="text-danger">*</span></label>
                            <input class="form-control" id="inputReadOnly" type="text" placeholder="ادخل رقم التليفون" name="phone">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="inputReadOnly">العنوان</label>
                            <input class="form-control" id="inputReadOnly" type="text" placeholder="ادخل العنوان" name="address">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="inputReadOnly">النوع</label>
                           <select name="type" id="" class="custom-select">
                            <option label="اختر النوع" selected disabled>اختر النوع</option>
                            <option value="ذكر">ذكر</option>
                            <option value="انثى">انثى</option>
                           </select>
                        </div>
                    </div>
                
                          
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <textarea name="note" id="" cols="60" rows="3" placeholder="الامراض الذى يعانى منها المريض" class="form-control"></textarea>
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
@include('sweetalert::alert')
@endsection
