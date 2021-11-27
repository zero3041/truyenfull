@extends('../layout')

@section('slide')

  @include('pages.slide')

@endsection

@section('content')

<!-- Nav tabs -->
<ul class="nav nav-tabs">
  @php
  $i = 0;
  @endphp
  @foreach($danhmuc as $key => $tab_danhmuc)
  @php
  $i++;
  @endphp
  <form>
      @csrf
  <li class="nav-item {{$i==1 ? 'active' : ''}}">
    <a data-danhmuc_id="{{$tab_danhmuc->id}}" class="nav-link tabs_danhmuc" data-toggle="tab" href="#{{$tab_danhmuc->slug_danhmuc}}">{{$tab_danhmuc->tendanhmuc}}</a>
  </li>
  </form>

  @endforeach

</ul>

<div id="tab_danhmuctruyen"></div>
<style type="text/css">
  a.kytu {
    font-weight: bold;
    padding: 5px 13px;
    /* margin: 7px 0; */
    color: black;
    font-size: 15px;
    background: burlywood;
    cursor: pointer;
}
</style>

<h3 class="title_truyen">Lọc truyện sách theo A - Z</h3>

<a class="kytu" href="{{url('/kytu/0-9')}}">0-9</a>

@foreach (range('A', 'Z') as $char)
    <a class="kytu" href="{{url('/kytu/'.$char)}}">{{$char}}</a>
@endforeach             

           

<h3 class="title_truyen">MỚI CẬP NHẬT</h3>

            <div class="album py-2 bg-light">

            <div class="container">



             <div class="row">
              
              @foreach($truyen as $key => $value)

              <div class="col-md-3">

                <div class="card mb-3 box-shadow">

                   <div class="info_truyen">
                            @if($value->loaitruyen=='truyentranh')
                            <span class="badge badge-info loaitruyen">Truyện tranh</span>   
                            @else
                            <span class="badge badge-danger loaitruyen">Truyện đọc</span>   
                            @endif  
                        </div>

                  <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" >
                  
                  <div class="card-body">

                      <h5 class="title_truyen">{{$value->tentruyen}}</h5>

                    <p class="card-text">
                      @php
                        $tomtat = substr($value->tomtat, 0,150);
                      @endphp
                      {{$tomtat.'....'}}
                      
                    </p>
                     @foreach($value->thuocnhieudanhmuctruyen as $thuocdanh)
                             
                        <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}"><span class="badge badge-dark">{{$thuocdanh->tendanhmuc}}</span></a>
                        @endforeach

                        @foreach($value->thuocnhieutheloaitruyen as $thuocloai)
                             
                        <a href="{{url('the-loai/'.$thuocloai->slug_theloai)}}"><span class="badge badge-info">{{$thuocloai->tentheloai}}</span></a>
                        @endforeach
                    <div class="d-flex justify-content-between align-items-center">

                      <div class="btn-group">

                        <a href="{{url('xem-truyen/'.$value->slug_truyen)}}"  class="btn btn-sm btn-outline-secondary">Xem truyện</a>
                       
                        <a  class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i>{{$value->views}}</a>

                      </div>

                     

                    </div>

                  </div>

                </div>

              </div>

            @endforeach

            </div>

          {{--   <a class="btn btn-success"  href="">Xem tất cả</a> --}}
            {{$truyen->onEachSide(1)->links('pagination::bootstrap-4')}}
          </div>

      

        </div>



    @endsection