@extends('home')
@section('title', 'روشته ')
@section('page', 'روشته')
@section('css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">

            <div class="card text-center w-100 m-auto text-dark "
                style="box-shadow: 3px 3px 5px inset rgb(141, 116, 3);border-radius:30px">
                <div class="card-header pb-4">
                    <div class="card-title text-ivfo p-2"> اسم المريض : {{ $visit->patient->name }}</div>
                    <div class="card-title text-ivfo p-2">العمر : {{ $visit->patient->age }}</div>
                    <div class="card-title text-ivfo p-2">النوع : {{ $visit->patient->type }}</div>
                    <div class="card-title p-2"> <span class="card-title">الامراض المسجله :</span> <span
                            class="text-danger">{{ $visit->patient->note ?? 'لا توجد امراض مسجله' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form action="{{ route('ticket.update',$visit->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="col-xl-12 col-lg col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="اضف ملاحظاتك هنا" name="note"></textarea>
                              </div>
                    </div>
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>

                            <th scope="col" class="text-center h6">اسم الصنف</th>
                            <th scope="col" class="text-center h6">الجرعه</th>
                            <th scope="col"><img src="{{ asset('public/img/icon.png') }}" alt="RX"
                                    width="25"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>
                                <select id="" class="form-control" name="product_id[]">
                                    <option value="" selected disabled> حدد الصنف </option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select id="" class="form-control" name="dose[]">
                                    <option value="" selected disabled> حدد الجرعه </option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->dose }}">{{ $product->dose }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" id="addRow">+
                                </button>
                            </td>
                            <td><input type="hidden" name="visit_id[]" value="{{ $visit->id }}" class="form-control">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary" id="save">حفظ</button>
                    <a href="{{ route('visits.index') }}" class="btn btn-danger">رجوع</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#addRow').on('click', function () {
            var html = '';
            html += '<tr>';

            html +=
                '<td><select id="" class="form-control" name="product_id[]"><option value="" selected disabled>  حدد الصنف  </option>@foreach ($products as $product)<option value="{{ $product->id }}">{{ $product->name }}</option>@endforeach</select></td>';
            html +=
                '<td><select id="" class="form-control" name="dose[]"><option value="" selected disabled>  حدد الجرعه  </option>@foreach ($products as $product)<option value="{{ $product->dose }}">{{ $product->dose }}</option>@endforeach</select></td>';
            html += '<td><button type="button" class="btn btn-danger" id="remove">X</button></td>';
            html +=
                '<td><input type="hidden" name="visit_id[]" value="{{ $visit->id }}" class="form-control"></td>';
            html += '</tr>';
            $('#table').append(html);
        })
    });
    $(document).on('click', '#remove', function () {
        $(this).closest('tr').remove();
    });

</script>
@endsection
