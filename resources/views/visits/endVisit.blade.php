@extends('home')
@section('title', ' الزيارات المنتهيه ')
@section('page', '  الزيارات المنتهيه')

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
                            <th>ملاحظات</th>
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
                            <td>{{ $visit->note }}</td>
                           
                            <td><a href="{{ route('ticket.show',$visit->id) }}"><span class="icon-eye text-danger h5"></span></a></td>

                        
                            </div>
                        </tr>
                        @endforeach
                     </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

   


@endsection
@section('scripts')

@endsection

