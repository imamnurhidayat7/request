@extends('layouts.master')

@section('content')
        <div class="row mb-2">
            <div class="col-12">
            <div class="card mini-stats-wid px-4 py-4">
                <div class="card-body">
                    <div class="media mb-4 text-center">
                        <div class="media-body">
                            <h3 class="fw-large">Form Request {{$layanan->layanan}}</h3>
                            <h4 class="mb-0"></h4>
                        </div>
                    </div>
                    <form action="{{url('tambah-request')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="row mt-4 py-4">
                        @foreach($field as $row)
                        <div class="col-12 mb-2">
                            @if($row->jenis == 'input')
                                <label for="basicpill-lastname-input">{{$row->label}}</label>
                                <input type="{{$row->tipe}}" name="{{$row->nama}}" class="form-control" required="">
                            @elseif($row->jenis == 'textarea')
                                <label for="basicpill-lastname-input">{{$row->label}}</label>
                                <textarea name="{{$row->nama}}" class="form-control" id="" cols="30" rows="5"></textarea>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <input type="hidden" name="id" value="{{$layanan->id}}">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div> 
    </div>
   
    <script language="JavaScript">
    </script>
    @endsection
    </body>
</html>
