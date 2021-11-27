@extends('layouts.app')



@section('content')



@include('layouts.nav')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">Liệt kê truyện : Tổng {{$count}}</div>



                <div class="card-body">
                    <div id="thongbao"></div>
                    @if (session('status'))

                        <div class="alert alert-success" role="alert">

                            {{ session('status') }}

                        </div>

                    @endif

                    <table class="table table-striped table-responsive">

                      <thead>

                        <tr>

                          <th scope="col">#</th>

                          <th scope="col">Tên truyện</th>

                          <th scope="col">Hình ảnh</th>

                          <th scope="col">Slug truyện</th>

                          <th scope="col">Tóm tắt</th>

                          <th scope="col">Thuộc Danh mục</th>

                          <th scope="col">Thuộc Thể loại</th>

                          <th scope="col">Kích hoạt</th>
                          <th scope="col">Ngày tạo</th>
                          <th scope="col">Hoàn thiện</th>

                          <th scope="col">Nổi bật</th>

                          <th scope="col">Quản lý</th>

                        </tr>

                      </thead>

                      <tbody>

                        @foreach($list_truyen as $key => $truyen)

                        <tr>

                          <th scope="row">{{$key}}</th>

                          <td>{{$truyen->tentruyen}}</td>

                          <td><img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="250" width="180"></td>

                          <td>{{$truyen->slug_truyen}}</td>

                          <td>
                            @php  
                            $tomtat = substr($truyen->tomtat, 0,200);
                            @endphp
                            {!! $tomtat!!}
                          </td>

                          <td>

                            @foreach($truyen->thuocnhieudanhmuctruyen as $thuocdanh)

                             

                              <span class="badge badge-dark">{{$thuocdanh->tendanhmuc}}</span>

                            @endforeach

                          </td>

                          <td>

                            @foreach($truyen->thuocnhieutheloaitruyen as $thuocloai)

                             

                              <span class="badge badge-secondary">{{$thuocloai->tentheloai}}</span>

                            @endforeach

                          </td>

                          <td>

                              @if($truyen->kichhoat==0)

                                <span class="text text-success">Kích hoạt</span> 

                              @else

                                <span class="text text-danger">Không Kích hoạt</span> 

                              @endif



                          </td>
                           <td>{{$truyen->created_at}} - {{ $truyen->created_at->diffForHumans()}}</td>
                              <td>

                              @if($truyen->hoanthien==0)

                                <span class="text text-success">Rồi</span> 

                              @else

                                <span class="text text-danger">Chưa</span> 

                              @endif



                          </td>

                              <td width="10%">

                              @if($truyen->truyen_noibat==0)
                                <form>
                                  @csrf
                                 <select name="truyennoibat" data-truyen_id="{{$truyen->id}}" class="custom-select truyennoibat">

                                  

                                  <option selected value="0">Truyện mới</option>

                                  <option value="1">Truyện nổi bật</option>

                                  <option value="2">Truyện xem nhiều</option>

                                 

                                </select>
                              </form>

                              @elseif($truyen->truyen_noibat==1)
                                  <form>
                                  @csrf
                                 <select name="truyennoibat" data-truyen_id="{{$truyen->id}}" class="custom-select truyennoibat">

                               

                                  <option  value="0">Truyện mới</option>

                                  <option selected value="1">Truyện nổi bật</option>

                                  <option value="2">Truyện xem nhiều</option>
                                  
                                 

                                </select>
                              </form>
                              @else
                                  <form>
                                  @csrf
                                 <select name="truyennoibat" data-truyen_id="{{$truyen->id}}" class="custom-select truyennoibat">

                                 

                                  <option  value="0">Truyện mới</option>

                                  <option value="1">Truyện nổi bật</option>

                                  <option selected value="2">Truyện xem nhiều</option>
                                  
                                 

                                </select>
                              </form>
                              @endif



                          </td>
                          <td>
                              @can('edit articles')
                                <a href="{{route('truyen.edit',[$truyen->id])}}" class="btn btn-primary ">Edit</a>
                              @endcan

                                @can('delete articles')
                              <form action="{{route('truyen.destroy',[$truyen->id])}}" method="POST">

                                @method('DELETE')

                                @csrf

                                <button onclick="return confirm('Bạn muốn xóa truyện này không?');" class="btn btn-danger">Delete</button>

                                  

                              </form>
                               @endcan

                          </td>

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

