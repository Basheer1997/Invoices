@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />


@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Invoice</span>
						</div>
					</div>
					{{-- <div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
                @if (session()->has('delete_invoice'))
                <script>
                    window.onload = function() {
                        notif({
                            msg: "تم حذف الفاتورة بنجاح",
                            type: "success"
                        })
                    }
                </script>
            @endif

                <div class="row row-sm">


					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									{{-- <h4 class="card-title mg-b-0">Bordered Table</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i> --}}
								</div>
                                <div class="col-sm-6 col-md-3">
		                        <a href="{{route('invoices.create')}}" class="btn btn-primary-gradient btn-block" style="color: white">اضافة فاتورة+</a>
                                    	</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>

                                            <tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">رقم الفاتورة</th>
												<th class="border-bottom-0">تاريخ الفاتورة</th>
												<th class="border-bottom-0">تاريخ الاستحقاق</th>
												<th class="border-bottom-0">المنتج</th>
												<th class="border-bottom-0">القسم</th>
												<th class="border-bottom-0">الخصم</th>
												<th class="border-bottom-0">نسبة الضريبة</th>
												<th class="border-bottom-0">قيمة الضريبة</th>
												<th class="border-bottom-0">الاجمالي</th>
												<th class="border-bottom-0">الحالة</th>
												<th class="border-bottom-0">الملاحظات</th>
												<th class="border-bottom-0">العمليات</th>
											</tr>


										</thead>
										<tbody>
                                            <?php $i=1 ?>
                                            @foreach ($invoices as $invoice)
											<tr>
												<td><?php echo $i ?></td>
                                                <?php $i++ ?>
												<td>{{$invoice->invoice_number}}</td>
												<td>{{$invoice->invoice_Date}}</td>
												<td>{{$invoice->Due_date}}</td>
												<td>{{$invoice->product}}</td>
												<td><a href="{{route('InvoicesDeteils',$invoice->id)}}">
													{{$invoice->section->section_name}}
												</a>
												</td>
												<td>{{$invoice->Discount}}</td>
												<td>{{$invoice->Rate_VAT}}</td>
												<td>{{$invoice->Value_VAT}}</td>
												<td>{{$invoice->Total}}</td>
												<td>
												@if($invoice->Value_Status==1)
												<span class="text-success">{{$invoice->Status}}</span>
												@elseif ($invoice->Value_Status==2)
												<span class="text-danger">{{$invoice->Status}}</span>
												@else
												<span class="text-warning">{{$invoice->Status}}</span>
												@endif
												</td>
												<td>{{$invoice->note}}</td>
												<td>

                                          <!-- Example single danger button -->
                                         <!-- Example single danger button -->

                                        <div class="btn-group">
                                            <button type="button" class="btn ripple btn-primary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            العمليات
                                            </button>
                                            @can('تعديل الفاتورة')
                                            <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ url('edit_invoice') }}/{{ $invoice->id }}">تعديل الفاتورة</a>
                                            @endcan

                                            @can('حذف الفاتورة')
                                            <button class="dropdown-item" data-invoice_id="{{$invoice->id }}"
                                                data-toggle="modal" data-target="#delete_invoice">حذف الفاتورة</button>
                                                @endcan

                                                @can('تغير حالة الدفع')
                                                <a class="dropdown-item"
                                                href="{{ URL::route('Status_show', [$invoice->id]) }}"><i
                                                    class=" text-success fas
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        fa-money-bill"></i>&nbsp;&nbsp;تغير
                                                حالة
                                                الدفع</a>
                                                @endcan
                                                @can('ارشفة الفاتورة')
                                                <a class="dropdown-item" href="#" data-invoice_id="{{ $invoice->id }}"
                                                    data-toggle="modal" data-target="#Transfer_invoice"><i
                                                        class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;نقل الي
                                                    الارشيف</a>
                                                    @endcan
                                                    @can('طباعةالفاتورة')

                                                <a class="dropdown-item" href="{{route('print.invoice',$invoice->id )}}"><i
                                                        class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;طباعة</a>
                                                        @endcan
                                        </div>
                                                </td>




											</tr>
                                            @endforeach

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
                </div>
					<!--div-->
    <!-- حذف الفاتورة -->
    <div class="modal fade" id="delete_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف الفاتورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('invoices.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                    هل انت متاكد من عملية الحذف ؟
                    <input type="hidden" name="invoice_id" id="invoice_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
                </form>
            </div>
        </div>
    </div>

{{-- أرشفة الفاتورة --}}
    <div class="modal fade" id="Transfer_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ارشفة الفاتورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('invoices.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                    هل انت متاكد من عملية الارشفة ؟
                    <input type="hidden" name="invoice_id" id="invoice_id" value="">
                    <input type="hidden" name="id_page" id="id_page" value="2">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-success">تاكيد</button>
                </div>
                </form>
            </div>
        </div>
    </div>

				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<script>
    $('#delete_invoice').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var invoice_id = button.data('invoice_id')
        var modal = $(this)
        modal.find('.modal-body #invoice_id').val(invoice_id);
    })
</script>

<script>
    $('#Transfer_invoice').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var invoice_id = button.data('invoice_id')
        var modal = $(this)
        modal.find('.modal-body #invoice_id').val(invoice_id);
    })
</script>

<script>
    $('#Transfer_invoice').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var invoice_id = button.data('invoice_id')
        var modal = $(this)
        modal.find('.modal-body #invoice_id').val(invoice_id);
    })
</script>

@endsection
