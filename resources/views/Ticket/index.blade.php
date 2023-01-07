@extends('home')
@section('title', 'روشته ')
@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row">  
        <form action="{{ route('ticket.update',$visit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table class="table table-striped" id="table">
                <thead>
                  <tr>
                 <th scope="col" >#</th>
                    <th scope="col">اسم الصنف</th>
                    <th scope="col">الجرعه</th> 
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="hidden" name="visit_id[]" value="{{ $visit->id }}" class="form-control"></td>
           <td>
            <select id="" class="form-control" name="product_id[]">
                <option value="" selected disabled>  حدد الصنف  </option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}
                    </option>
                @endforeach
            </select>
           </td>
           <td>
            <select id="" class="form-control" name="dose[]">
                <option value="" selected disabled>  حدد الجرعه  </option>
                @foreach ($products as $product)
                    <option value="{{ $product->dose }}">{{ $product->dose }}
                    </option>
                @endforeach
            </select>
           </td>
           <td>
            <button type="button" class="btn btn-success" id="addRow">+
            </button>
           </td>
                  </tr>
                </tbody>
              </table>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
            </div>
             
        </form>
    </div>
</div> 
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
$('#addRow').on('click',function(){
var html = '';
  html+='<tr>';
  html+='<td><input type="hidden" name="visit_id[]" value="{{  $visit->id }}" class="form-control"></td>';
  html+='<td><select id="" class="form-control" name="product_id[]"><option value="" selected disabled>  حدد الصنف  </option>@foreach ($products as $product)<option value="{{ $product->id }}">{{ $product->name }}</option>@endforeach</select></td>';
  html+='<td><select id="" class="form-control" name="dose[]"><option value="" selected disabled>  حدد الجرعه  </option>@foreach ($products as $product)<option value="{{ $product->dose }}">{{ $product->dose }}</option>@endforeach</select></td>';
  html+='<td><button type="button" class="btn btn-danger" id="remove">X</button></td>';
  html+='</tr>';
  $('#table').append(html);
    })
    });
    $(document).on('click','#remove',function(){
    $(this).closest('tr').remove();
    });

</script>
@endsection