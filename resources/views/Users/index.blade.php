@extends('home')
@section('title', 'الاطباء')
@section('page', 'قائمه الاطباء')

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
                          <th>رقم التليفون</th>
                          <th>البريد الالكترونى</th>
                          <th>التخصص</th>
                          <th>العنوان</th>
                          <th></th>
                          {{-- <th></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1  ?>
                        @foreach ($doctors as $doctor)
                        <tr>
                          <td>{{ $x++ }}</td>
                          <td>{{ $doctor->name }}</td>
                          <td>{{ $doctor->phone }}</td>
                          <td>{{ $doctor->email }}</td>
                          <td>{{ $doctor->Specialization }}</td>
                          <td>{{ $doctor->address ?? '---' }}</td>
                       


                          <td>  <button type="button" class="btn btn-success rounded-circle" data-toggle="modal" data-target="#basicModal{{ $doctor->id }}">
                            <span class="icon-edit"></span>
                        </button></td>
                          {{-- <td>  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal{{ $doctor->id }}">
                            <span class="icon-trash"></span>
                        </button></td> --}}
                        </tr>
                        	<!-- Modal -->
                    <div class="modal fade" id="basicModal{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="basicModalLabel">تعديل طبيب</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('doctors.update',$doctor->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="modal-body">
                                    <center>
                                        <img src="{{ asset($doctor->image) }}" alt="لا يتم رفع صوره" width="50" class="mb-2" >
                                    </center>
                                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                        <div class="form-group ">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image" >
                                                    <label class="custom-file-label " style="font-weight: bold;">اختر صوره الطبيب</label>
                                                </div>
                                                <div class="input-group-append mx-2">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   <div class="row gutters justify-content-center">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-6">
                                        <div class="form-group">
                                            <label for="inputReadOnly">الاسم <span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputReadOnly" type="text" value='{{ $doctor->name }}'  name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-6">
                                        <div class="form-group">
                                            <label for="inputReadOnly">البريد الالكترونى<span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputReadOnly" type="email" value="{{ $doctor->email }}" name="email">
                                        </div>
                                    </div>
                                   </div>
                                   <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
                                        <div class="form-group">
                                            <label for="inputReadOnly">رقم التليفون<span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputReadOnly" type="text" value='{{ $doctor->phone }}'  name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
                                        <div class="form-group">
                                            <label for="inputReadOnly">التخصص<span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputReadOnly" type="text"  value='{{ $doctor->Specialization }}' name="Specialization">
                                        </div>
                                    </div>
                                   </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputReadOnly">العنوان</label>
                                            <input class="form-control" id="inputReadOnly" type="text"  value='{{ $doctor->address }}' name="address">
                                        </div>
                                    </div>
                                    
                               
                                
                                          
                                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <textarea name="about" id="" cols="60" rows="2"   class="form-control">{{ $doctor->about ??'لايوجد' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <textarea name="note" id="" cols="60" rows="2"  class="form-control">{{ $doctor->note ??'لايوجد' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <textarea name="other_data" id="" cols="60" rows="2"  class="form-control">{{ $doctor->other_data ??'لايوجد' }}</textarea>
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
                             <div class="modal fade" id="DeleteModal{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="basicModalLabel">حذف مريض</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('doctors.destroy',$doctor->id) }}" method="post" >
                                            @csrf
                                            @method('Delete')
                                        <div class="modal-body">
                                        
                                            <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <h5>هل انت متاكد من حذف بيانات المريض 
                                                    <span class="text-danger mx-3 ">{{ $doctor->name }}</span>    
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="basicModalLabel">اضافه طبيب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('doctors.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                 
                   <div class="row gutters justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-6">
                        <div class="form-group">
                            <label for="inputReadOnly">الاسم <span class="text-danger">*</span></label>
                            <input class="form-control" id="inputReadOnly" type="text" placeholder="ادخل الاسم" name="name">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-6">
                        <div class="form-group">
                            <label for="inputReadOnly">البريد الالكترونى<span class="text-danger">*</span></label>
                            <input class="form-control" id="inputReadOnly" type="email" placeholder="ادخل البريد الالكترونى" name="email">
                        </div>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
                        <div class="form-group">
                            <label for="inputReadOnly">رقم التليفون<span class="text-danger">*</span></label>
                            <input class="form-control" id="inputReadOnly" type="text" placeholder="ادخل رقم التليفون" name="phone">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
                        <div class="form-group">
                            <label for="inputReadOnly">التخصص<span class="text-danger">*</span></label>
                            <input class="form-control" id="inputReadOnly" type="text" placeholder="ادخل التخصص" name="Specialization">
                        </div>
                    </div>
                   </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="inputReadOnly">العنوان</label>
                            <input class="form-control" id="inputReadOnly" type="text" placeholder="ادخل العنوان" name="address">
                        </div>
                    </div>
                    
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group rounded-circle">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" >
                                    <label class="custom-file-label " style="font-weight: bold;">اختر صوره الطبيب</label>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                
                          
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <textarea name="about" id="" cols="60" rows="2" placeholder="نبذه مختصره عن الطبيب " class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <textarea name="note" id="" cols="60" rows="2" placeholder="ملاحظات" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <textarea name="other_data" id="" cols="60" rows="2" placeholder="بيانات اخرى" class="form-control"></textarea>
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
