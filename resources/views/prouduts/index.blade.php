@extends('home')
@section('title', 'الاصناف')
@section('page', ' قائمه الاصناف')
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
                            <th >اسم الصنف </th>
                            <th >الجرعه </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1  ?>
                        @foreach ($products as $product)
                        <tr >
                            <td>{{ $x++ }}</td>
                            <td >{{ $product->name }}</td>
                            <td >{{ $product->dose }}</td>
                            <td>  <button type="button" class="btn btn" data-toggle="modal" data-target="#basicModal{{ $product->id }}">
                                <span class="icon-border_color text-success h5"></span>
                            </button></td>
                              <td>  <button type="button" class="btn btn" data-toggle="modal" data-target="#DeleteModal{{ $product->id }}">
                                <span class="icon-trash text-danger h5"></span>
                            </button></td>
                        </tr>
                        	<!-- Modal -->
                    <div class="modal fade" id="basicModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="basicModalLabel">تعديل صنف</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('prouduts.update',$product->id) }}" method="post" autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">  
                                    <div class="row gutters justify-content-center">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-6">
                                        <div class="form-group">
                                            <label for="inputReadOnly">الاسم <span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputReadOnly" type="text" value="{{ $product->name }}" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
                                        <div class="form-group">
                                            <label for="inputReadOnly">الجرعه<span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputReadOnly" type="text" value="{{ $product->dose }}" name="dose">
                                        </div>
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
                             <div class="modal fade" id="DeleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="basicModalLabel">حذف صنف</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('prouduts.destroy',$product->id) }}" method="post" >
                                            @csrf
                                            @method('Delete')
                                        <div class="modal-body">
                                        
                                            <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <h5>هل انت متاكد من حذف الصنف 
                                                    <span class="text-danger mx-3 ">{{ $product->name }}</span>    
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
                    <h5 class="modal-title" id="basicModalLabel">اضافه صنف</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('prouduts.store') }}" method="post" >
                    @csrf
                    <div class="modal-body">  
                    <div class="row gutters justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-6">
                        <div class="form-group">
                            <label for="inputReadOnly">الاسم <span class="text-danger">*</span></label>
                            <input class="form-control" id="inputReadOnly" type="text" placeholder="ادخل الاسم" name="name">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
                        <div class="form-group">
                            <label for="inputReadOnly">الجرعه<span class="text-danger">*</span></label>
                            <input class="form-control" id="inputReadOnly" type="text" placeholder="ادخل الجرعه" name="dose">
                        </div>
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
