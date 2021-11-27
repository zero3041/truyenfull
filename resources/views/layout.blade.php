<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <meta name="description" content="{{$meta_desc}}"/>
        <meta name="keywords" content="{{$meta_keywords}}"/>
        <meta name="robots" content="index, follow"> 
        <link rel="canonical" href="{{$url_canonical}}" />

        <!------Share------->
        <meta property="og:type" content="website" />

        <meta property="og:title" content="{{$title}}" />

        <meta property="og:description" content="{{$meta_desc}}" />

        <meta property="og:image" content="{{$og_image}}" />

        <meta property="og:url" content="{{$url_canonical}}" />

        <meta property="og:site_name" content="Sachtruyen247" />

        <link rel="icon" href="{{$link_icon}}" type="image/gif" sizes="16x16">

        <title>{{$title}}</title>
        <!-- Styles -->
       

         <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style type="text/css">
          ul.mucluctab_truyen {
              list-style: none;
              padding: 0;
              margin: 12px 0;
          }
          ul.mucluctab_truyen li a {
              color: #000;
              text-transform: uppercase;
          }
          h5{
            font-weight: bold;
            line-height: 25px;
          }
           .switch_color{
            background: #181818;
            color: #fff;
          }
          .switch_color_light{
            background: #181818 !important;
            color:#000;
          }
          .noidung_color {
            color:#000;
          }
        </style>
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
       
    </head>
    <body>
        <div class="container">
            <!-----------------Menu-------------------->
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 0;margin-bottom: 10px;">
              <a class="navbar-brand" href="{{url('/')}}"><img alt="Logo" src="{{asset('public/uploads/logo/'.$info->logo)}}" width="250px"></a>
              <style type="text/css">
                ul.navbar-nav.mr-auto li a {
                  font-size: 20px;
              }
              .card.mb-3.box-shadow img {
                          height: 250px;
                          border: 3px solid #000;
                          padding: 5px;
                      }
                      .item h5 {
                  margin: 10px 0;
              }
              </style>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Trang chủ <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/truyen-tranh')}}"><i class="fas fa-book"></i>Truyện tranh <span class="sr-only"></span></a>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link" href="{{url('/doc-sach')}}"><i class="fas fa-book"></i>Sách <span class="sr-only"></span></a>
                  </li>
                
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-list-ul" aria-hidden="true"></i> Danh mục truyện
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              
                      @foreach($danhmuc as $key => $danh)
                       <a class="dropdown-item" href="{{url('danh-muc/'.$danh->slug_danhmuc)}}"><i class="fa fa-list-ul" aria-hidden="true"></i> {{$danh->tendanhmuc}}</a>
                      @endforeach
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-tags" aria-hidden="true"></i> Thể loại
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    
                      @foreach($theloai as $key => $the)
                      <a class="dropdown-item" href="{{url('the-loai/'.$the->slug_theloai)}}"><i class="fa fa-tags" aria-hidden="true"></i> {{$the->tentheloai}}</a>
                      @endforeach
                    </div>
                  </li>
               {{--     <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Đăng nhập bằng
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      
                      <a class="dropdown-item" href="{{ url('auth/google') }}">Google</a>
                      <a class="dropdown-item" href="{{ url('auth/facebook') }}">Facebook</a>
                  
                    </div>
                  </li> --}}
                
                </ul>
              
              </div>

            </nav>
            <div class="row">
              <div class="col-md-12">
                
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
             
              <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="POST">
                @csrf
                  <input class="form-control mr-sm-2" id="keywords" type="search" name="tukhoa" placeholder="Tìm kiếm tác giả,truyện...." aria-label="Search">
                  <div id="search_ajax"></div>
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>

                   {{--  <input class="switch_color_xam" type="checkbox" id="switch_color" data-on="Đen" data-off="Xám" data-toggle="toggle" data-onstyle="dark" data-offstyle="light" data-style="border"> --}}
                    <select class="custom-select mr-sm-2" id="switch_color">
                      
                      <option value="xam">Xám</option>
                      <option value="den">Đen</option>
                    
                    </select>

                    

                   
                </form>
              </div>
            </div>

            <!-----------------Slide-------------------->
            @yield('slide')
            <!-----------------Sach moi-------------------->
            @yield('content')


          <footer class="text-muted">
          <div class="container">
            <p class="float-right">
              <a href="#">Back to top</a>
            </p>
            <p>{{$info->tieude_footer}}</p>
            <p>Mạng xã hội :    <div class="fb-share-button" data-href="{{$url_canonical}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}" class="fb-xfbml-parse-ignore">Chia sẻ</a></div></p>
          </div>
            </footer>



        </div>
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60af7a6c0d381eef"></script>


 <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
 <script type="text/javascript">
      
        $(document).on('click','.xemsachnhanh',function(){

            var sach_id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
          
            $.ajax({
                url:'{{url('/xemsachnhanh')}}',
                method:"POST",
                dataType:"JSON",
                data:{sach_id:sach_id,_token:_token},
                success:function(data){
                    $('#tieude_sach').html(data.tieude_sach);
                    $('#noidung_sach').html(data.noidung_sach);
                }
            }); 
        });
    </script>
 <script type="text/javascript">
   $('.tabs_danhmuc').click(function(){
    const danhmuc_id = $(this).data('danhmuc_id');
    var _token = $('input[name="_token"]').val();

            $.ajax({
                url:'{{url('/tabs-danhmuc')}}',
                method:"POST",

                data:{_token:_token, danhmuc_id:danhmuc_id},
                success:function(data){
                    $('#tab_danhmuctruyen').html(data);
                }

            }); 
   })
 </script>
<script type="text/javascript">
      show_wishlist();
      function show_wishlist(){
          if(localStorage.getItem('wishlist_truyen')!=null){

             var data = JSON.parse(localStorage.getItem('wishlist_truyen'));

             data.reverse();

             for(i=0;i<data.length;i++){

                var title = data[i].title;
                var img = data[i].img;
                var id = data[i].id;
                var url = data[i].url;

                $('#yeuthich').append(` 

                  <div class="row mt-2">
                    <div class="col-md-5"><img class="img img-responsive" width="100%" class="card-img-top" src="`+img+`" alt="`+title+`"></div>
                    
                    <div class="col-md-7 sidebar">
                      <a href="`+url+`">
                      <p>`+title+`</p>
                      </a>
                    </div>

                </div>
                 `);
            }

          }
      }
      $('.btn-thich_truyen').click(function(){
        $('.fa.fa-heart').css('color','#fac');
        const id = $('.wishlist_id').val();
        const title = $('.wishlist_title').val();
        const img = $('.card-img-top').attr('src');
        const url = $('.wishlist_url').val();
       
        const item = {
          'id': id,
          'title': title,
          'img': img,
          'url': url
        }
        if(localStorage.getItem('wishlist_truyen')==null){
           localStorage.setItem('wishlist_truyen', '[]');
        }
        var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
        var matches = $.grep(old_data, function(obj){
            return obj.id == id;
        })
        if(matches.length){
            alert('Truyện đã có trong danh sách yêu thích');
        }else{
            if(old_data.length<=5){
              old_data.push(item);
             
              
              
            }else{
              alert('Đã đạt tới giới hạn lưu truyện yêu thích.');
            }
            $('#yeuthich').append(`

                        <div class="row mt-2">
                          <div class="col-md-5"><img class="img img-responsive" width="100%" class="card-img-top" src="`+img+`" alt="`+title+`"></div>
                          
                          <div class="col-md-7 sidebar">
                            <a  href="`+url+`">
                            <p style="color:blue">`+title+`</p>
                            </a>
                          </div>

                </div>
              `);
             
            localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
            alert('Đã lưu vào danh sách truyện yêu thích.');
            
        }
         localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
       
        

       
      });
   
    </script>
    <script type="text/javascript">
      $(document).ready(function(){

         if(localStorage.getItem('switch_color')!==null){
            const data = localStorage.getItem('switch_color');
            const data_obj = JSON.parse(data);
            $(document.body).addClass(data_obj.class_1);
            $('.album').addClass(data_obj.class_2);
            $('.card-body').addClass(data_obj.class_1);
            $('ul.mucluctruyen > li > a').css('color','#fff');
            $('.sidebar > a').css('color','#fff');
           
            $("select option[value='den']").attr("selected", "selected");

          }
        })
      $("#switch_color").change(function(){
           $(document.body).toggleClass('switch_color');
           $('.album').toggleClass('switch_color_light');
            $('.card-body').toggleClass('switch_color');
             $('.noidungchuong').addClass('noidung_color');
               $('ul.mucluctruyen > li > a').css('color','#fff');
                $('.sidebar > a').css('color','#fff');

           if($(this).val() == 'den'){

               var item = {
                  'class_1':'switch_color',
                  'class_2':'switch_color_light'
                 
                }   
              localStorage.setItem('switch_color', JSON.stringify(item));

            }else if($(this).val() == 'xam'){
              
              localStorage.removeItem('switch_color');
              $('ul.mucluctruyen > li > a').css('color','#000');
               $('.sidebar > a').css('color','#000');
             
            }

          
          
          
      });

    </script>
<script type = "text/javascript" >

    $(document).ready(function() {

        var color = $('#change-color :selected').val();
        var font = $('#change-font :selected').val();
        var lineheight = $('#change-lineheight :selected').val();


        if (localStorage.getItem("chapter_style") === null) {

            $('.noidungchuong').css({
                'background': '#fff',
                'line-height': '40px',
                'font-size': '25px',
                
                'font-family': '"Palatino Linotype","Arial"'
            });
        } else if (localStorage.getItem("chapter_style") !== null) {


            const data = localStorage.getItem('chapter_style');
            const data_obj = JSON.parse(data);

            $("select option[value='" + data_obj.color + "']").attr("selected", "selected");
            $("select option[value='" + data_obj.font + "']").attr("selected", "selected");
            $("select option[value='" + data_obj.lineheight + "']").attr("selected", "selected");

            $('.noidungchuong').css({
                'background': '#' + data_obj.color,
                'line-height': data_obj.lineheight + 'px',
                'font-family': data_obj.font,
                'font-size': data_obj.font_size
                
            });

        }


        $('#change-color,#change-font,#change-lineheight').on('change', function() {

            var color = $('#change-color :selected').val();
            var font = $('#change-font :selected').val();
            var lineheight = $('#change-lineheight :selected').val();

            //localstorage




            localStorage.setItem('chapter_style', '[]');
            var newItem = {
                'color': color,
                'font': font,
                'lineheight': lineheight,
                'font_size': 25,
                

            }
            localStorage.setItem('chapter_style', JSON.stringify(newItem));




            // var old_data = JSON.parse(localStorage.getItem('chapter_style'));

            const data = localStorage.getItem('chapter_style');
            const data_obj = JSON.parse(data);


            if (color != '' || font != '' || lineheight != '') {
                $('.noidungchuong').css({
                    'background': '#' + data_obj.color,
                    'line-height': data_obj.lineheight + 'px',
                    'font-family': data_obj.font,
                    'font-size': data_obj.font_size
                     
                });
            }

        });

        var $affectedElements = $('.noidungchuong');

        $('.size-increment').click(function() {
            changeFontSize(2);

        })
        $('.size-decrement').click(function() {
            changeFontSize(-2);

        })
        $(".size-orig").click(function() {
            $affectedElements.each(function() {
                var $this = $(this);
                $this.css("font-size", $('.size-orig').data('orig_size'));
                // Get the existing data



            });
            if (localStorage.getItem("chapter_style") === null) {
                var newItem = {
                    'color': color,
                    'font': font,
                    'lineheight': lineheight,
                    'font_size': parseInt($('.size-orig').data('orig_size'))
                    
                }
            } else if (localStorage.getItem("chapter_style") !== null) {
                const data = localStorage.getItem('chapter_style');
                const data_obj = JSON.parse(data);
                var newItem = {
                    'color': data_obj.color,
                    'font': data_obj.font,
                    'lineheight': data_obj.lineheight,
                    'font_size': parseInt($('.size-orig').data('orig_size'))
                    
                }
            }

            // Save back to localStorage
            localStorage.setItem('chapter_style', JSON.stringify(newItem));

        })

        function changeFontSize(direction) {
            $affectedElements.each(function() {
                var $this = $(this);
                $this.css("font-size", parseInt($this.css("font-size")) + direction);

                // Get the existing data



            });
            if (localStorage.getItem("chapter_style") === null) {
                var newItem = {
                    'color': color,
                    'font': font,
                    'lineheight': lineheight,
                    'font_size': parseInt($affectedElements.css("font-size")) + direction
                    
                }
            } else if (localStorage.getItem("chapter_style") !== null) {
                const data = localStorage.getItem('chapter_style');
                const data_obj = JSON.parse(data);
                var newItem = {
                    'color': data_obj.color,
                    'font': data_obj.font,
                    'lineheight': data_obj.lineheight,
                    'font_size': parseInt($affectedElements.css("font-size")) + direction
                   
                }
            }


            // Save back to localStorage
            localStorage.setItem('chapter_style', JSON.stringify(newItem));

        }



    })

    </script>
 <script type="text/javascript">
      $('#keywords').keyup(function(){
          var query = $(this).val();

            if(query != '')
              {
               var _token = $('input[name="_token"]').val();

               $.ajax({
                url:"{{url('/autocomplete-ajax')}}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                 $('#search_ajax').fadeIn();  
                  $('#search_ajax').html(data);
                }
               });

              }else{

                $('#search_ajax').fadeOut();  
              }
          });

          $(document).on('click', '.li_search_ajax', function(){  
              $('#keywords').val($(this).text());  
              $('#search_ajax').fadeOut();  
          }); 
      </script>
       <script type="text/javascript">
                          show_tranh();
                          function show_tranh(){
                              var showtranh = $('.showtranh').val();
                              var slug_chapter = $('.slug_chapter').val();
                              var _token = $('input[name="_token"]').val();

                              if(showtranh=='showtranh'){
                               
                                $.ajax({
                                    url:'{{url('/show-tranh')}}',
                                    method:"POST",
                                    data:{slug_chapter:slug_chapter,_token:_token},
                                    beforeSend: function(){
                                      $("#loader").show();
                                    },
                                    success:function(data){
                                       $('#show_tranh').html(data);
                                      $("#loader").hide();
                                    }

                                });
                              }
                          }
                      </script>
    <script type="text/javascript">
      $('.xemmucluc').click(function(){
          $('html, body').animate({
              scrollTop: $(".mucluctruyen").offset().top
          }, 1000);
      });
    </script>

       <script type="text/javascript">
           $('.owl-carousel').owlCarousel({
                loop:false,
                margin:10,
                dot:true,
                // nav:true,
                responsive:{
                    0:{
                        items:2
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })
       </script>
     
       <script type="text/javascript">
         $('.select-chapter').on('change',function(){

            $('.waiting').text('Đang chuyển chương vui lòng chờ xíu....');
           
            var url = $(this).val();


            if(url){


              window.location = url;
              
            }
            return false;
         });

         current_chapter();

         function current_chapter(){
            var url  = window.location.href; 

            $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
         }
       </script>
       <script type="text/javascript">
         $(".xemmucluc").click(function() {
            $('html, body').animate({
                scrollTop: $(".mucluctruyen").offset().top
            }, 1000);
        });
       </script>
       <script type="text/javascript">
       	const $dropdown = $(".dropdown");
			const $dropdownToggle = $(".dropdown-toggle");
			const $dropdownMenu = $(".dropdown-menu");
			const showClass = "show";

			$(window).on("load resize", function() {
			  if (this.matchMedia("(min-width: 768px)").matches) {
			    $dropdown.hover(
			      function() {
			        const $this = $(this);
			        $this.addClass(showClass);
			        $this.find($dropdownToggle).attr("aria-expanded", "true");
			        $this.find($dropdownMenu).addClass(showClass);
			      },
			      function() {
			        const $this = $(this);
			        $this.removeClass(showClass);
			        $this.find($dropdownToggle).attr("aria-expanded", "false");
			        $this.find($dropdownMenu).removeClass(showClass);
			      }
			    );
			  } else {
			    $dropdown.off("mouseenter mouseleave");
			  }
			});
       </script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      {!!$info->google_analytics!!}
    <div id="fb-root"></div>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=6125793717446054&autoLogAppEvents=1" nonce="045Iezic"></script>

   <script data-ad-client="ca-pub-8704329899201751" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </body>

</html>
