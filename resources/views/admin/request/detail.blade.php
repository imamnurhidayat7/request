@extends('admin.master_admin')

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
                        <a class="btn btn-success btn-sm waves-effect mt-2 waves-light @if($request->status=='Disetujui') disabled @endif" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="mdi mdi-pencil d-block font-size-16"></i> </a>
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
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
                                            <input type="text" readonly name="email" value="{{$request->layanan->layanan}}" class="form-control" required="">
                                        </div>
                                    </div>
                                    @foreach($request->layanan->fields as $row)
                                    <div class="col-12 mb-2">
                                        @foreach($request->meta as $row2)
                                            @if($row->nama == $row2->nama)
                                                @if($row->jenis == 'input')
                                                    <label for="basicpill-lastname-input">{{$row->label}}</label><br/>
                                                    @if($row->tipe=='file')
                                                    <button class="btn btn-primary btn-pdf" data-file="{{url('')}}/uploads/{{$row2->value}}"  data-title="{{$row->label}}" type="button">Lihat File</button>
                                                    <!-- <a href="" class="btn btn-sm btn-primary">Lihat File</a> -->
                                                    @else
                                                    <input type="{{$row->tipe}}" readonly name="{{$row->nama}}" value="{{$row2->value}}" class="form-control" required="">
                                                    @endif
                                                @elseif($row->jenis == 'textarea')
                                                    <label for="basicpill-lastname-input">{{$row->label}}</label>
                                                    <textarea readonly name="{{$row->nama}}" class="form-control" id="" cols="30" rows="5">{{$row2->value}}</textarea>
                                                @endif
                                            @endif
                                        @endforeach 
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- <div class="tab-pane" id="profile1" role="tabpanel">
                            <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Status Karyawan</label>
                                            <select name="status" id="" class="form-control" required="">
                                                <option value="Karyawan Tetap" selected="">Karyawan Tetap</option>
                                                <option value="Karyawan Tetap">Karyawan Tetap</option>
                                                <option value="Karyawan Kontrak">Karyawan Kontrak</option>
                                                <option value="Karyawan Magang">Karyawan Magang</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Tanggal Bergabung</label>
                                            <input type="date" name="date_of_joining" class="form-control" value="2022-02-09" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Jabatan</label>
                                            <select name="role" id="" class="form-control" required="">
                                            <option value="25" selected="">Staff</option>
                                                                                                <option value="1">Admin</option>
                                                                                                <option value="13">Graphic Design</option>
                                                                                                <option value="16">Manager</option>
                                                                                                <option value="23">Digital Marketing</option>
                                                                                                <option value="24">Finance</option>
                                                                                                <option value="25">Staff</option>
                                                                                            </select>
                                        </div>
                                    </div>
									                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Penanggung Jawab</label>
                                            <select name="manager_id" id="" class="form-control" required="">
                                                <option value="2" hidden="">Thia</option>
                                                                                                                                                <option value="4">Thia</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </select>
                                        </div>
                                    </div>
									                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-namecard-input">Sisa Cuti</label>
                                            <input type="text" name="remaining_leaves" class="form-control" value="6" required="">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>
                </div>
            </div> <!-- end row -->
            </form>
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

            <!-- Static Backdrop Modal -->
            <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{url('/admin/request/update')}}" method="post">@csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Update Status Permintaan Layanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                        <label>Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option hidden disabled>Pilih Status</option>
                                            <option value="Menunggu Persetujuan" @if($request->status == 'Menunggu Persetujuan') selected @endif>Menunggu Persetujuan</option>
                                            <option value="Disetujui" @if($request->status == 'Disetujui') selected @endif>Disetujui</option>
                                            <option value="Ditolak" @if($request->status == 'Ditolak') selected @endif>Ditolak</option>
                                        </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control">{{$request->keterangan}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="{{$request->id}}">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
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
