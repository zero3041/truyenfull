@extends('../layout')

@section('slide')

  @include('pages.slide')

@endsection

@section('content')






<h3 class="title_truyen">Lọc truyện sách theo A - Z</h3>
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
<a class="kytu" href="{{url('/kytu/0-9')}}">0-9</a>
@foreach (range('A', 'Z') as $char)
    <a class="kytu"  href="{{url('/kytu/'.$char)}}">{{$char}}</a>
@endforeach             

           

<h3 class="title_truyen">MỚI CẬP NHẬT</h3>

            <div class="album py-2 bg-light">

            <div class="container">
            <table class="table table-striped table-dark">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên truyện</th>
                  <th scope="col">Hình ảnh truyện</th>
                  <th scope="col">Danh mục truyện</th>
                  <th scope="col">Thể loại truyện</th>
                  <th scope="col">Lượt xem</th>
                  <th scope="col">Xem</th>
                </tr>
              </thead>
              <tbody>
                @foreach($truyen as $key => $tr)
                <tr>
                  <th scope="row">{{$key}}</th>
                  <td><a target="_blank" href="{{url('xem-truyen/'.$tr->slug_truyen)}}">{{$tr->tentruyen}}</a></td>
                  <td><img class="" src="{{asset('public/uploads/truyen/'.$tr->hinhanh)}}" width="100" height="100"></td>
                  <td>
                    
                    @foreach($tr->thuocnhieudanhmuctruyen as $thuocdanh)
                             
                      <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}"><span class="badge badge-dark">{{$thuocdanh->tendanhmuc}}</span></a>

                    @endforeach
                  </td>
                  <td>
                     @foreach($tr->thuocnhieutheloaitruyen as $thuocloai)
                             
                        <a href="{{url('the-loai/'.$thuocloai->slug_theloai)}}"><span class="badge badge-info">{{$thuocloai->tentheloai}}</span></a>
                      @endforeach
                  </td>
                  <td>{{$tr->views}}</td>
                  <td><a target="_blank" href="{{url('xem-truyen/'.$tr->slug_truyen)}}">Xem truyện</a></td>
                </tr>
                @endforeach
               
              </tbody>
            </table>

       
          {{--  {{$truyen->onEachSide(1)->links('pagination::bootstrap-4')}} --}}
           </div>

      

        </div>



@endsection