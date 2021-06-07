@extends('layouts.manage')

@section('content')
    <div class="mt-5 p-3">
        <h4>
            Billing for {{ $data->firstname }} {{ $data->lastname }}
        </h4>
        <div class=" w-50">
            @foreach ($yearVisits as $visit)
                <h4 style="background:#d9d9d9" class="text-center">
                    {{ $visit['year'] }}
                </h4>
                <table class="table table-bordered">
                    @foreach ($visits as $v)
                        @if ($v->billing == 'ready')
                            @php
                            $billsrc='billingready';
                            @endphp
                        @elseif($v->billing=='complete')
                            @php
                            $billsrc='billingcomplete';
                            @endphp
                        @else
                            @php
                            $billsrc='billingincomplete';
                            @endphp
                        @endif
                        @if ($v->payment == 'partial')
                            @php
                            $paysrc='paymentpartial';
                            @endphp
                        @elseif($v->payment=='full')
                            @php
                            $paysrc ='paymentfull';
                            @endphp
                        @else
                            @php
                            $paysrc='paymentwaiting';
                            @endphp
                        @endif
                        @if ($v->dateyear == $visit['year'])
                            <tr>
                                <td>
                                    <img src="{{ asset('/images/plus.png') }}" alt="">
                                </td>
                                <td>
                                    {{ $v->encounterdate }}
                                </td>
                                <td>
                                    <img src="{{ asset('/nlimages/billing/' . $billsrc . '.png') }}" width="15" height="15">
                                    Billing
                                </td>
                                <td>
                                    <img src="{{ asset('/nlimages/billing/' . $paysrc . '.png') }}" width="15" height="15">
                                    Payment
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            @endforeach
        </div>
    </div>
@endsection
