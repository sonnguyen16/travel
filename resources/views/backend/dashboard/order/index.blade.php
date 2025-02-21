@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div style="display: flex; justify-content: end; flex-wrap: nowrap; gap: 10px;">
        <form method="GET" action="{{ route('backend.dashboard.order.index') }}" class="form-inline" id="search-form" style="display: flex; flex-wrap: nowrap; align-items: center;">
            <div class="input-group input-group-sm" style="margin-right: 10px;">
                <select name="status" class="form-control" onchange="this.form.submit()">
                    <option value="0" {{ $status == 0 ? 'selected' : '' }}>Chưa duyệt</option>
                    <option value="1" {{ $status == 1 ? 'selected' : '' }}>Đã duyệt</option>
                    <option value="2" {{ $status == 2 ? 'selected' : '' }}>Đã hủy</option>
                    <option value="3" {{ $status == 3 ? 'selected' : '' }}>Tất cả</option>
                </select>
            </div>
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    @if(request('search'))
                    <button type="button" id="clear-search" class="btn btn-default" onclick="clearSearch()"><i class="fa fa-remove"></i></button>
                    @endif 
                </div>
            </div>
        </form>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table id="table_" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                {{-- <th>Mã giảm giá</th> --}}
                                <th>Tổng tiền</th>
                                <th>HT thanh toán</th>
                                <th>Ngày đặt</th>
                                <th style="width: 100px;">Trạng thái</th>
                                <th style="width: 100px;">Thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($orders->currentPage() - 1) * $orders->perPage() + 1; ?>
                            @forelse($orders as $order)
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td style="text-align: left; padding-left: 20px;">{{ $order->name }}</td>
                                <td style="text-align: left; padding-left: 20px;">{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                {{-- <td>{{ $order->discount_code }}</td> --}}
                                <td>{{ $order->total }}</td>
                                <td>{{ strtoupper($order->payment_method) }} 
                                </td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('H:i:s d-m-Y') }}</td>
                                <td>
                                    @if ($order->status == 0)
                                    <span class="label label-warning">Chưa duyệt</span>
                                    @elseif($order->status == 1)
                                    <span class="label label-success">Đã duyệt</span>
                                    @else
                                    <span class="label label-danger">Đã hủy</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" title="Xem chi tiết" data-toggle="modal" data-target="#orderModal" onclick="alertDetail({{ $order->id }})">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    @if ($order->status == 0)
                                    <button type="button" class="btn btn-success btn-sm" title="Duyệt đơn" onclick="alertUpload({{ $order->id }}, 1)">
                                        <i class="fa fa-upload"></i>
                                    </button>
                                    @elseif($order->status == 1)
                                    <button type="button" class="btn btn-danger btn-sm" title="Hủy đơn" onclick="alertCancel({{ $order->id }}, 2)">
                                        <i class="fa fa-download"></i>
                                    </button>  
                                    @else
                                    <button type="button" class="btn btn-danger btn-sm" title="Xóa đơn" onclick="alertDelete({{ $order->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    @endif 
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10">Không có dữ liệu</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{ $orders->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@include('backend.dashboard.order.modal')
@endsection
@section('styles')
<style>
    @media (max-width: 768px) {
        #chi-tiet {
         width: auto;
      }
      .confirm-dia{
        width: auto;
      }
    }
    @media (min-width: 768px) {
      #chi-tiet {
         width: 768px;
      }
      .confirm-dia{
        width: 500px;
      }
    }
</style>
@endsection
@section('scripts')
<script src="{{ asset('/assets/backend/js/order.js') }}"></script>

<script>
    function alertDelete(id) {
        $('#myModal').data('id', id);
        $('#myModal').modal('toggle');
    }
    $('#myModal button.delete').on('click', function(e) {
        e.preventDefault();
        window.location.href = "{{ route('backend.dashboard.order.delete') }}" + "?id=" + $('#myModal').data('id') + "&search={{ request('search') }}&status={{ request('status') }}";
    });

    function alertUpload(id, status) {
        $('#uploadModal').data('id', id);
        $('#uploadModal').data('status', status);
        $('#uploadModal').modal('toggle');
    }
    $('#uploadModal button.btn-success').on('click', function(e) {
        e.preventDefault();
        window.location.href = "{{ route('backend.dashboard.order.status') }}" + "?id=" + $('#uploadModal').data('id') + "&statuss=" + $('#uploadModal').data('status') + "&search={{ request('search') }}&status={{ request('status') }}";
    });
    function alertCancel(id, status) {
        $('#cancelModal').data('id', id);
        $('#cancelModal').data('status', status);
        $('#cancelModal').modal('toggle');
    }
    $('#cancelModal button.btn-danger').on('click', function(e) {
        e.preventDefault();
        window.location.href = "{{ route('backend.dashboard.order.status') }}" + "?id=" + $('#cancelModal').data('id') + "&statuss=" + $('#cancelModal').data('status') + "&search={{ request('search') }}&status={{ request('status') }}";
    });
</script>

@endsection