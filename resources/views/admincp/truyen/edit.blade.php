@extends('layouts.app')



@section('content')



@include('layouts.nav')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Cập nhật truyện</div>

                @if ($errors->any())

                    <div class="alert alert-danger">

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <div class="card-body">

                    @if (session('status'))

                        <div class="alert alert-success" role="alert">

                            {{ session('status') }}

                        </div>

                    @endif

                    

                    <form method="POST" action="{{route('truyen.update',[$truyen->id])}}" enctype='multipart/form-data'>

                      @method('PUT')

                      @csrf

                      <div class="form-group">

                        <label for="exampleInputEmail1">Tên truyện</label>

                        <input type="text" class="form-control" value="{{$truyen->tentruyen}}" onkeyup="ChangeToSlug();" name="tentruyen" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện">

                        

                      </div>

                       <div class="form-group">



                        <label for="exampleInputEmail1">Lượt xem</label>



                        <input type="text" class="form-control" value="{{$truyen->views}}" name="views"  aria-describedby="emailHelp" placeholder="Lượt xem">



                        



                      </div>

                       <div class="form-group">

                        <label for="exampleInputEmail1">Từ khóa</label>

                        <input type="text" class="form-control" value="{{$truyen->tukhoa}}" name="tukhoa"  aria-describedby="emailHelp" placeholder="">

                        

                      </div>

                       <div class="form-group">

                        <label for="exampleInputEmail1">Tác giả</label>

                        <input type="text" class="form-control" value="{{$truyen->tacgia}}" name="tacgia" aria-describedby="emailHelp" placeholder="Tác giả">

                        

                      </div>

                      <div class="form-group">

                        <label for="exampleInputEmail1">Slug truyện</label>

                        <input type="text" class="form-control" value="{{$truyen->slug_truyen}}" name="slug_truyen" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyện...">

                        

                      </div>

                      <div class="form-group">

                        <label for="exampleInputEmail1">Tóm tắt truyện</label>

                        <textarea name="tomtat" class="form-control" id="ckeditor_truyen" rows="5" style="resize: none">{{$truyen->tomtat}}</textarea>

              

                      </div>

                        <label for="exampleInputEmail1">Danh mục truyện</label>

 

                      @foreach($danhmuc as $key => $muc)

                       

                      <div class="form-check">

                          

                          <input class="form-check-input" 



                          @if( $thuocdanhmuc->contains($muc->id) ) checked @endif



                          name="danhmuc[]" type="checkbox" id="danhmuc_{{$muc->id}}" value="{{$muc->id}}">

                          <label class="form-check-label" for="danhmuc_{{$muc->id}}">{{$muc->tendanhmuc}}</label>

                         

                      </div>



                       @endforeach



                      <label for="exampleInputEmail1">Thể loại</label>

                      @foreach($theloai as $key => $the)

                      <div class="form-check">

                          

                          <input class="form-check-input"



                           @if( $thuoctheloai->contains($the->id) ) checked @endif



                          name="theloai[]" type="checkbox" id="theloai_{{$the->id}}" value="{{$the->id}}">

                          <label class="form-check-label" for="theloai_{{$the->id}}">{{$the->tentheloai}}</label>

                         

                      </div>

                       @endforeach

                    {{--   <div class="form-group">

                        <label for="exampleInputEmail1">Danh mục truyện</label>

                        <select name="danhmuc" class="custom-select">

                          @foreach($danhmuc as $key => $muc)

                          <option {{ $muc->id==$truyen->danhmuc_id ? 'selected' : '' }} value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>

                          @endforeach

                        </select>

                      </div>

                       <div class="form-group">

                        <label for="exampleInputEmail1">Danh mục truyện</label>

                        <select name="theloai" class="custom-select">

                          @foreach($theloai as $key => $the)

                          <option {{ $the->id==$truyen->theloai_id ? 'selected' : '' }} value="{{$the->id}}">{{$the->tentheloai}}</option>

                          @endforeach

                        </select>

                      </div> --}}

                      <div class="form-group">

                        <label for="exampleInputEmail1">Hình ảnh truyện</label>

                        <input type="file" class="form-control-file" name="hinhanh">

                        <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="250" width="180">

                      </div>

                       <div class="form-group">

                        <label for="exampleInputEmail1">Kích hoạt</label>

                        <select name="kichhoat" class="custom-select">

                          @if($truyen->kichhoat==0)

                          <option selected value="0">Kích hoạt</option>

                          <option value="1">Không kích hoạt</option>

                          @else

                          <option  value="0">Kích hoạt</option>

                          <option selected value="1">Không kích hoạt</option>

                          @endif

                        </select>

                        </div>

                         <div class="form-group">

                        <label for="exampleInputEmail1">Hoàn thiện</label>

                        <select name="hoanthien" class="custom-select">

                          @if($truyen->hoanthien==0)

                          <option selected value="0">Rồi</option>

                          <option value="1">Chưa</option>

                          @else

                          <option  value="0">Rồi</option>

                          <option selected value="1">Chưa</option>

                          @endif

                        </select>
                          </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Truyện nổi bật/hot</label>
                        <select name="truyennoibat" class="custom-select">

                          @if($truyen->truyen_noibat==0)

                          <option selected value="0">Truyện mới</option>

                          <option value="1">Truyện nổi bật</option>

                          <option value="2">Truyện xem nhiều</option>

                          @elseif($truyen->truyen_noibat==1)

                          <option  value="0">Truyện mới</option>

                          <option selected value="1">Truyện nổi bật</option>

                          <option value="2">Truyện xem nhiều</option>

                          @else 

                          <option  value="0">Truyện mới</option>

                          <option  value="1">Truyện nổi bật</option>

                          <option selected value="2">Truyện xem nhiều</option>

                          @endif

                        </select>
                      </div>


                      


                      <button type="submit" name="themtruyen" class="btn btn-primary">Cập nhật</button>

                    </form>

                    

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

