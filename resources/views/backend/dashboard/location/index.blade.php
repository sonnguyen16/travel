@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#locationModal">
        Thêm mới
    </a>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Tên điểm đến</th>
                                <th style="width: 150px;">Bản dịch</th>
                                <th style="width: 100px;">Thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($locations->currentPage() - 1) * $locations->perPage() + 1; ?>
                            @forelse($locations as $location)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td style="text-align: left; padding-left: 20px;">{{ $location->translation->name }} </td>
                                <td>
                                    {{ implode(', ', $location->language_codes->toArray()) }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" onclick="alertLang({{ $location->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                    {{-- <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $location->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">Không có dữ liệu</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{ $locations->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@include('backend.dashboard.location.modal')
@endsection
@section('styles')
<style>
    @media (min-width: 768px) {
        #modalInput{
            width: 768px;
        }
    }
    @media (max-width: 768px) {
        #modalInput{
            width: auto;
        }
    }
</style>
@endsection
@section('scripts')
<script src="{{ asset('/assets/backend/js/location.js') }}">
</script>
@endsection