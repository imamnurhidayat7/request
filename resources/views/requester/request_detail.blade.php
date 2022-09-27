@extends('layouts.master')

@section('content')
        <div class="row mb-2">
            <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card py-4">
                        <div class="card-body text-center">
                        <h4 class="fw-medium mb-2">Request #{{$request->id}}</h4>
                        <p>Tanggal dibuat : {{$request->created_at}}</p>
                        <button type="button" class="btn @if($request->status=='Menunggu Persetujuan') btn-warning @elseif($request->status=='Ditolak') btn-danger @else btn-success @endif btn-sm btn-rounded waves-effect waves-light">{{$request->status}}</button><br/>
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form action="{{url('update-request')}}" method="post" enctype="multipart/form-data">@csrf
                        <!-- Nav tabs -->
                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="home1" role="tabpanel">
                            <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Requester</label>
                                            <input type="text" readonly name="name" value="{{$request->user->name}}" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Layanan</label>
                                            <input type="text" readonly  name="email" value="{{$request->layanan->layanan}}" class="form-control" required="">
                                        </div>
                                    </div>
                                    @foreach($request->layanan->fields as $row)
                                    <div class="col-12 mb-2">
                                        @foreach($request->meta as $row2)
                                            @if($row->nama == $row2->nama)
                                                @if($row->jenis == 'input')
                                                    <label for="basicpill-lastname-input">{{$row->label}}</label><br/>
                                                    @if($row->tipe=='file')
                                                    <button class="btn btn-light btn-pdf" data-file="{{url('')}}/uploads/{{$row2->value}}"  data-title="{{$row->label}}" type="button">Lihat File</button>
                                                    <input type="{{$row->tipe}}"  name="{{$row->nama}}" value="{{$row2->value}}" class="form-control mt-3">
                                                    @else
                                                    <input type="{{$row->tipe}}"  name="{{$row->nama}}" value="{{$row2->value}}" class="form-control" required="">
                                                    @endif
                                                @elseif($row->jenis == 'textarea')
                                                    <label for="basicpill-lastname-input">{{$row->label}}</label>
                                                    <textarea  name="{{$row->nama}}" class="form-control" id="" cols="30" rows="5">{{$row2->value}}</textarea>
                                                @endif
                                            @endif
                                        @endforeach 
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <input type="hidden" name="request_id" value="{{$request->id}}">
                            <input type="hidden" name="layanan_id" value="{{$request->layanan->id}}">
                            <input type="hidden" name="status" value="Menunggu Persetujuan">
                            <button class="btn btn-primary mt-2" type="submit">Ajukan Kembali</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div> <!-- end row -->
            <!-- end row -->
    
            <div class="offcanvas offcanvas-end"  tabindex="-1" id="offcanvasScrolling" aria-modal="true" aria-labelledby="offcanvasScrollingLabel" role="dialog">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel"></h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <iframe id="link" src="" style="width:100%; height:100vh;" frameborder="0"></iframe>
                </div>
            </div>

           

                
    @endsection
    @section('script')
    <script>
        var table = $('#datatable2').DataTable({
            "order": [[ 0, "desc" ]],
        });

        $('.btn-pdf').on('click', function(){
            var src = $(this).data('file');
            var title = $(this).data('title');
            $('#offcanvasScrollingLabel').text(title);
            $('#link').attr('src', src);
            $('#offcanvasScrolling').offcanvas('show');
        });

    </script>
    @endsection
    </body>
</html>
