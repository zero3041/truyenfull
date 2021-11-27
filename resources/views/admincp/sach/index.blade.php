@extends('layouts.app')



@section('content')



@include('layouts.nav')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">Liệt kê sách</div>



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

                          <th scope="col">Tên sách</th>

                          <th scope="col">Hình ảnh</th>

                          <th scope="col">Slug sách</th>

                          <th scope="col">Tóm tắt</th>

                         

                          <th scope="col">Kích hoạt</th>
                          <th scope="col">Ngày tạo</th>
                         

                       

                          <th scope="col">Quản lý</th>

                        </tr>

                      </thead>

                      <tbody>

                        @foreach($list_sach as $key => $sach)

                        <tr>

                          <th scope="row">{{$key}}</th>

                          <td>{{$sach->tensach}}</td>

                          <td><img src="{{asset('public/uploads/sach/'.$sach->hinhanh)}}" height="250" width="180"></td>

                          <td>{{$sach->slug_sach}}</td>

                          <td>
                            @php  
                            $tomtat = substr($sach->tomtat, 0,200);
                            @endphp
                            {!! $tomtat!!}
                          </td>

                        
                          <td>

                              @if($sach->kichhoat==0)

                                <span class="text text-success">Kích hoạt</span> 

                              @else

                                <span class="text text-danger">Không Kích hoạt</span> 

                              @endif



                          </td>
                           <td>{{$sach->created_at}} - {{ $sach->created_at->diffForHumans()}}</td>
                             

                            
                          <td>

                                <a href="{{route('sach.edit',[$sach->id])}}" class="btn btn-primary ">Edit</a>



                              <form action="{{route('sach.destroy',[$sach->id])}}" method="POST">

                                @method('DELETE')

                                @csrf

                                <button onclick="return confirm('Bạn muốn xóa sách này không?');" class="btn btn-danger">Delete</button>

                                  

                              </form>

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

