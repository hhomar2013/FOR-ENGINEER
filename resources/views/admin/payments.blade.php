@extends('layouts.admin1',['title' => __('Payments')])
@section('content')
{{--    @livewire('payment')--}}
{{--{{dd($payments)}}--}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                {{__('Payments')}} {{$payments->totalCount}}
            </div>

            <div class="card-body">
                <div class="card-body">

                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-responsive-sm table-hover table-sm text-center ">
                            <thead>
                            <tr class="bg-dark text-white" >
                                <th scope="col"><i class="fa fa-list"></i></th>
                                <th scope="col">{{__('t.statue')}}</th>
                                <th scope="col">{{__('t.price')}}</th>
                                <th scope="col">{{__('Fee')}}</th>
                                <th scope="col">{{__('total')}}</th>
                                <th scope="col">{{__('Description')}}</th>
                                <th scope="col"><i class="fa fa-cogs"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =1; $ii =1;$count=0; ?>
                            @php
                                $total = 0;
                            @endphp
                          @forelse($payments->result as $key=>$val)
                                @php $total += ($val->amount / 100) - ($val->fee / 100)  @endphp
                              <tr>
                                  <td class="bg-secondary text-white">{{$i++}}</td>
                                  @if($val->status == 'paid')
                                      <td class="text-success" >{{ __('Collected')}}</td>
                                  @elseif($val->status == 'refunded')
                                      <td class="text-warning" >{{ __('refunded')}}</td>
                                  @else
                                      <td class="text-danger" >{{ __('Reject')}}</td>
                                  @endif
                                  <td >{{$val->amountFormat}}</td>
                                  <td >{{$val->feeFormat}}</td>
                                  <td >{{($val->amount / 100) - ($val->fee / 100)}}</td>
                                  <td >{{$val->description}}</td>
                                  <td>
                                      <!-- Button trigger modal -->
                                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#source-{{$key}}">
                                          <i class="fa fa-file-archive"></i>
                                      </button>
                                  </td>
                              </tr>
                              <!-- Modal -->
                              <div class="modal fade" id="source-{{$key}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{$key}}" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="{{$key}}"></h1>
{{--                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                          </div>
                                          <div class="modal-body">
                                              <div class="row">
{{--                                                  {{dd($val->source)}}--}}
                                                      <div class="col">
                                                          <span> ## :{{ $val->id }}</span><br>
                                                          <span> {{__('t.name')}} :{{ $val->source->name }}</span><br>
                                                          <p><a href="{{$val->source->transactionUrl}}" class="btn btn-warning ">{{__('Transaction Link')}}</a></p>
                                                          @if($val->status == 'paid')
                                                              <p><a href="{{route('admin.refund',['id'=>$val->id])}}" class="btn btn-info "><i class="fa-solid fa-money-bill-transfer"></i> {{__('Refund')}} {{$val->amountFormat}}</a></p>
                                                          @endif
                                                      </div>

                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{__('Close')}}</button>
{{--                                              <button type="button" class="btn btn-primary">Understood</button>--}}
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @empty
                              <tr>
                                  <td class="text-danger" colspan="5" scope="row">{{__('There is no data')}}</td>
                              </tr>
                          @endforelse


                            </tbody>
                        </table>
                        <p>{{ __('total')  }} : {{  $total }}</p>
                    </div>
{{--                    {{dd($payments)}}--}}
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item  {{$payments->prevPage == null ? 'disabled' : ''}}"><a class="page-link" href="{{$payments->prevPage}}">{{__('Previous')}}</a></li>
                            @for($x = 1 ; $x <= $payments->totalPages ; $x++)
                           <li class="page-item {{$x == $payments->currentPage ? 'active' : ''}}"><a class="page-link"  href="{{$x}}">{{$x}}</a></li>
                            @endfor
                            <li class="page-item {{$payments->currentPage == $payments->totalPages ? 'disabled' : ''}} "><a class="page-link" href="{{$payments->nextPage}}">{{__('Next')}}</a></li>
                        </ul>
                    </nav>

                </div>

            </div>
        </div>
    </div>


@endsection
@section('js')
        @include('message')
@endsection
