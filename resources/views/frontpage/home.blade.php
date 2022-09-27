@extends('layouts.master')

@section('content')
        <div class="row mb-2">
            <div class="col-12">
            <div class="mini-stats-wid">
                <div class="card-body">
                    <div class="media mb-4 text-center">
                        <div class="media-body">
                            <h2 class="fw-large">Request Catalog</h2>
                            <h4 class="mb-0"></h4>
                        </div>
                    </div>
                    <div class="row mt-4 py-4">
                        @foreach($layanan as $row)
                        <div class="col-4">
                            <div class="card card-layanan overflow-hidden py-3">
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-sm-12 text-center py-4">
                                        <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/344/external-request-hospitality-services-flaticons-lineal-color-flat-icons-2.png" alt="" width="50px">
                                            <h5 class="mb-4 mt-4">{{$row->layanan}}</h5>
                                            <a href="{{url('layanan', $row->id)}}" class="btn btn-sm btn-primary">Lihat Persyaratan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div> 
    </div>
            


    <div id="myModal" class="modal" tabindex="-1" aria-labelledby="myModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Ambil Foto</h5>
                    <button type="button" class="btn-close" onClick="cancel()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center><div id="camera" class="text-center"></div></center>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-secondary waves-effect" value="Batal" onClick="cancel()">
                    <input type="button" id="btnTakePhoto" class="btn btn-success hidden" value="Ambil Foto" onClick="take_snapshot()">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
   
    <script language="JavaScript">

        function open_camera(){
            $('#myModal').modal('show');
            Webcam.set({
                width: 320,
                height: 240,
                image_format: 'jpeg',
                jpeg_quality: 100,
                flip_horiz: true,
            });
            Webcam.attach('#camera');
            $('#btnTakePhoto').removeClass('hidden');
        }
    
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"" width="150" height="110"/>';
                $('#myModal').modal('hide');
                $('#btnOpenCamera').val('Ulangi Ambil Foto')
                //$('#btnTryAgain').removeClass('hidden');
            } );
            Webcam.reset();
        }

        function cancel(){
            $('#myModal').modal('hide');
            $('#btnOpenCamera').removeClass('hidden');
            Webcam.reset();
        }
    </script>
    @endsection
    </body>
</html>
