@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Olt</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-{1:striped|sm|bordered|hover|inverse}table-responsive">
                        <thead class="thead-inverse|thead-default">
                            <tr>
                                <th>IP da ONU</th>
                                <th>Olt ID</th>
                                <th>Pon ID</th>
                                <th>SHELFID</th>
                                <th>SHELFTYPE</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach ($dados as $dado)

                                    <tr>
                                        <td scope="row">{{$dado['ONUIP']}}</td>
                                        <td>{{$dado['OLTID']}}</td>
                                        <td>{{$dado['PONID']}}</td>
                                        <td> {{$dado['SHELFID']}}</td>
                                        <td>{{$dado['SHELFTYPE']}}</td>
                                    </tr>







                        @endforeach
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- array:6 [▼
  "ONUIP" => "--"
  "OLTID" => "10.0.1.2"
  "PONID" => "--"
  "ONUID" => "--"
  "SHELFID" => "1-1"
  "SHELFTYPE" => "AN5516-01"
] --}}
