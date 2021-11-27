@extends('../layout')

{{-- @section('slide')

  @include('pages.slide')

@endsection --}}

@section('content')


           

<h3 class="title_truyen">SÁCH MỚI CẬP NHẬT</h3>

            <div class="album py-2 bg-light">

            <div class="container">



             <div class="row">
              
              @foreach($sach as $key => $value)

              <div class="col-md-3">

                <div class="card mb-3 box-shadow">

              

                  <img class="card-img-top" src="{{asset('public/uploads/sach/'.$value->hinhanh)}}" >
                  
                  <div class="card-body">

                      <h5 class="title_truyen">{{$value->tensach}}</h5>

                    <p class="card-text">
                      @php
                        $tomtat = substr($value->tomtat, 0,150);
                      @endphp
                      {{$tomtat.'....'}}
                      
                    </p>
                  
                    <div class="d-flex justify-content-between align-items-center">

                      <div class="btn-group">
                        <form>
                          @csrf
                       <!-- Button trigger modal -->
                        <button type="button" id="{{$value->id}}" class="btn btn-primary xemsachnhanh" data-toggle="modal" data-target="#exampleModalLong">
                          Xem nhanh sách
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document"> 
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                  <div id="tieude_sach"></div>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div id="noidung_sach"></div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                
                              </div>
                            </div>
                          </div>
                        </div>
                       </form>
                        <a  class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i>{{$value->views}}</a>

                      </div>

                     

                    </div>

                  </div>

                </div>

              </div>

            @endforeach

            </div>

          {{--   <a class="btn btn-success"  href="">Xem tất cả</a> --}}
            {{$sach->onEachSide(1)->links('pagination::bootstrap-4')}}
          </div>

      

        </div>



    @endsection