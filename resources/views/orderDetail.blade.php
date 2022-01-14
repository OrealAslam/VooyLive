@extends('layouts.template')
@section('customStyle')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
<style type="text/css">
   .owl-dots{
   display: none;
   }
   .owl-nav button{
   width: 13px;
   background:#EA2349 !important;
   color:#fff !important;
   }
   .item img{
   width:100%;
   height:100%;
   }
   /*radio*/
   .btn_choose_sent input {
   -webkit-appearance: none;
   display: block;
   margin: 10px;
   width: 13px;
   height: 13px;
   border-radius: 12px;
   cursor: pointer;
   vertical-align: middle;
   box-shadow: hsla(0,0%,100%,.15) 0 1px 1px, inset hsla(0,0%,0%,.5) 0 0 0 1px;
   background-color: hsla(0,0%,0%,.2);
   background-image: -webkit-radial-gradient( #fff 0%, #fff 15%, #fff 28%, #fff 70% );
   background-repeat: no-repeat;
   -webkit-transition: background-position .15s cubic-bezier(.8, 0, 1, 1),
   -webkit-transform .25s cubic-bezier(.8, 0, 1, 1);
   outline: none;
   }
   .btn_choose_sent input:checked {
   -webkit-transition: background-position .2s .15s cubic-bezier(0, 0, .2, 1),
   -webkit-transform .25s cubic-bezier(0, 0, .2, 1);
   }
   .btn_choose_sent input:active {
   -webkit-transform: scale(1.5);
   -webkit-transition: -webkit-transform .1s cubic-bezier(0, 0, .2, 1);
   }
   /* The up/down direction logic */
   .btn_choose_sent input,
   .btn_choose_sent input:active {
   background-position: 0 24px;
   }
   .btn_choose_sent input:checked {
   background-position: 0 0;
   }
   .btn_choose_sent input:checked ~ input,
   .btn_choose_sent input:checked ~ input:active {
   background-position: 0 -24px;
   }
   .btn_choose_sent {
   background:#428BCA;
   color: #fff;
   box-shadow: 0 10px 20px rgba(125, 147, 178, .3);
   border: none;
   margin-left: 13px;
   border-radius: 3px;
   margin-bottom: 5px;
   font-size: 11px;
   line-height: 10px;
   padding: 8px 5px 9px 22px;
   text-align: center;
   display: inline-block;
   text-decoration: none;
   margin-right: 30px;
   transition: all .3s;
   height: auto;
   cursor: pointer;
   position: relative;
   outline: none;
   }
   .btn_choose_sent input {
   position: absolute;
   left: -4px;
   right: 0;
   z-index: 99;
   top: -3px;
   }
   .btn_choose_sent input:after{
   position: absolute;
   content: '';
   width: 15rem;
   left: 0;
   right: 0;
   /* background: red; */
   /* z-index: -1; */
   height: 40px;
   top: -10px;
   }
   .bg_btn_chose_1{
   background-color: #428BCA !important;
   }
   .bg_btn_chose_2{
   background-color: #428BCA !important;
   }
   /*-=p=--=*/
   .btn_choose_sent_check_b{
   background: #428BCA;
   color: #fff;
   box-shadow: 0 10px 20px rgba(125, 147, 178, .3);
   border: none; 
   border-radius: 3px;
   font-size: 16px;
   line-height: 10px;
   padding:  16px 20px 16px 46px;
   text-align: center;
   display: inline-block;
   text-decoration: none;
   margin-right: 30px;
   transition: all .3s;
   height: auto;
   cursor: pointer;
   position: relative;
   outline: none;
   }
   /*radio*/
   .btn-add-more{
   background: #007BFF !important;
   color: #fff !important;
   margin-top: 5px;
   border-radius: 0px !important;
   }
   .add-to-cart{
   margin-top: 30px;
   }
   .sub-form-box{
   box-shadow: 0px 0px 2px black;
   margin:15px;
   width: 93%;
   padding: 10px;
   border-radius: 5px;
   }
   .btn-disabled-block{
   border-radius: 0px;
   }
</style>
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
   <div class="container">
      <h2 class="page-title">Order Detail</h2>
      <ol class="breadcrumb">
         <li><a href="{{ Route('home') }}">Home</a></li>
         <li class="active">Order Detail</li>
      </ol>
   </div>
</div>
<!-- tab -->
<div class="cps-main-wrap">
   <div class="cps-section cps-section-padding cps-gray-bg" id="order">
      <div class="container">
         <div class="row">
            <div  class="col-sm-12 p-0">
               <div lang="row">
                  <!-- content -->
                  <div class="col-md-12 col-xs-12 order-detail-left">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="tab-content">
                              <div class="row mv-m mv-mt-5">
                                 <div class="col-md-12 col-xs-12 heading-title mv-mt-5">
                                    <h3>{{ $product->name }}</h3>
                                 </div>
                              </div>
                              <div class="row mv-m mt-10">
                                 <div class="row mt-10">
                                    <div class="col-md-4">
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="left-img order-detail-left-content">
                                                <img src="{{ asset('/upload/product/'.$product->image) }}" alt="" class="product-img">
                                             </div>
                                          </div>
                                          @if($product->category->type == 0)
                                          <div class="col-md-12 mt-10">
                                             <div class="owl-slider">
                                                <div id="carousel" class="owl-carousel">
                                                   @if(!empty($images))
                                                   @foreach($images as $key => $value)
                                                   <div class="item">
                                                      <a class="thumbnail fancybox" rel="ligthbox" href="{{ asset('/upload/product/productGallery/'.$value) }}" data-toggle="lightbox" data-gallery="gallery"><img class="owl-lazy" data-src="{{ asset('/upload/product/productGallery/'.$value) }}" alt=""></a>
                                                   </div>
                                                   @endforeach
                                                   @endif
                                                </div>
                                             </div>
                                          </div>
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-md-8">
                                       <div class="order-detail-right-content">
                                          <div class="row">
                                             <div class="col-md-12">
                                                @if(!empty(session('cart')))
                                                @if($product->category->type == 0)
                                                @if(!empty(session('cart')))
                                                @foreach((array) session('cart') as $id => $details)
                                                @if($details['pro_type'] == 0)
                                                <!-- <p style="color:red !important;"><b>You Already Package In Cart</b></p> -->
                                                @else
                                                @if($loop->first)
                                                <p style="color:red;font-size:20px;text-align: center;"><b>You Already Added Package In Cart!</b></p>
                                                @endif
                                                @endif
                                                @endforeach
                                                @endif
                                                @else
                                                @if(!empty(session('cart')))
                                                @foreach((array) session('cart') as $id => $details)
                                                @if($details['pro_type'] == 1)
                                                <!-- <p style="color:red;font-size:20px;text-align: center;"><b>You Already Added Package In Cart!</b></p> -->
                                                @else
                                                @if($loop->first)
                                                <p style="color:red;font-size:20px;text-align: center;"><b>You Already Added Product In Cart!</b></p>
                                                @endif
                                                @endif
                                                @endforeach
                                                @endif
                                                @endif
                                                @endif
                                             </div>
                                             <div class="col-md-12 col-xs-12 pro-code-avi-text" style="width: 97%;">
                                                <p class="m-0 p-0">Product Code : <span>{{ $product->product_code }}</span></p>
                                                <p class="m-0 p-0">Availability : <span class="in-stock">{{ $product->availability == 0 ? 'In Stock' : 'Out of Stock' }}</span></p>
                                                <hr class="box-hr">
                                             </div>
                                             <div class="col-md-12 price-text-product-det" style="width: 97%;">
                                                <h4>${{ number_format($product->price,2) }}</h4>
                                                <span> 
                                                @if(!empty($product->actual_price))
                                                {!! $product->actual_price ?  'Get Credit (<b>$':'' !!}{{ number_format($product->actual_price,2) ?? '' }})</b>
                                                @endif
                                                </span>
                                                <!-- <p class="p-0 m-0">Price in reward points: 100</p> -->
                                                <hr class="box-hr">
                                             </div>
                                             @if($product->category->type == 0)
                                             <div class="col-md-12 available-options">
                                                <h5>Available Options</h5>
                                             </div>
                                             <div class="form-box">
                                                <div class="sub-form-box col-md-11 mr-0">
                                                   <div class="col-md-8">
                                                      <h5>Product</h5>
                                                   </div>
                                                   @if($product->address == 0)
                                                   <div class="col-md-12 form-text">
                                                      <form class="">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <label><span>*</span> Address</label>
                                                               <input type="text" name="address[1]" placeholder="Address" class="form-control address">
                                                            </div>
                                                         </div>
                                                      </form>
                                                   </div>
                                                   @endif
                                                   @if($product->neighborhood == 0)
                                                   <div class="col-md-12 form-text">
                                                      <form class="">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <label><span>*</span> Neighborhood</label>
                                                               <input type="text" name="neighborhood[1]" placeholder="Neighborhood" class="form-control neighborhood">
                                                            </div>
                                                         </div>
                                                      </form>
                                                   </div>
                                                   @endif
                                                   <div class="col-md-12">
                                                      <hr class="box-hr">
                                                      <label>Extra Option</label>
                                                      <div class="row">
                                                         @if($product->rush_delivery == 0)
                                                         <button type="button" class="btn_choose_sent bg_btn_chose_1">
                                                            <!-- <input type="radio" name="extra_option" value="Rush Delivery - {{ $product->rush_delivery_day }} Business Day (+${{ number_format($product->rush_delivery_charge,2) }})"/>Rush Delivery - {{ $product->rush_delivery_day }} Business Day (+${{ number_format($product->rush_delivery_charge,2) }}) -->
                                                            <input type="radio" name="extra_option[1]" class="extra_option" value="1"/>Rush Delivery - {{ $product->rush_delivery_day }} Business Day (+${{ number_format($product->rush_delivery_charge,2) }})
                                                         </button>
                                                         @endif
                                                         @if($product->custom_charge == 0)
                                                         <button type="button" class="btn_choose_sent bg_btn_chose_2">
                                                            <!-- <input type="radio" name="extra_option" value="Custom Design (+${{ number_format($product->custom_design_charge,2) }})"/>Custom Design (+${{ number_format($product->custom_design_charge,2) }}) -->
                                                            <input type="radio" name="extra_option[1]" class="extra_option" value="2"/>Custom Design (+${{ number_format($product->custom_design_charge,2) }})
                                                         </button>
                                                         @endif
                                                      </div>
                                                      <hr class="box-hr">
                                                      @if($product->upload_image == 1)
                                                      <hr class="box-hr">
                                                      @endif
                                                   </div>
                                                   @if($product->upload_image == 0)
                                                   <div class="col-md-12 form-text">
                                                      <form class="">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <label>Custom Design File Upload</label>
                                                               <input type="file" name="image[1]" id='upload-file' class="form-control">
                                                               <input type="hidden" name="custom_design_file_upload[1]" class="form-control cart-file">
                                                            </div>
                                                         </div>
                                                      </form>
                                                   </div>
                                                   @endif
                                                </div>
                                             </div>
                                             @else
                                             <div class="form-box">
                                                <div class="sub-form-box" style="display: none">
                                                </div>
                                             </div>
                                             @endif
                                             @if($product->category->type == 0 )
                                             <div class="col-md-12 text-right" style="width: 97%;">
                                                <button class="btn  btn-sm btn-success btn-add-more"><i class="fa fa-cart-plus" aria-hidden="true"></i>  Add More</button>	
                                                <hr class="box-hr">
                                             </div>
                                             @endif
                                             <div class="col-md-12" style="width: 98%;">
                                                <div class="row mt-5">
                                                   <!-- @if($product->category->type == 1) -->
                                                   <!-- <div class="col-md-5 form-text">
                                                      <div class="row">
                                                      <div class="input-group plus-minus-input">
                                                      <div class="input-group-button">
                                                      <button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity">
                                                      <i class="fa fa-minus" aria-hidden="true"></i>
                                                      </button>
                                                      </div>
                                                      <input class="input-group-field" type="number" name="quantity" value="1" class="quantity">
                                                      <div class="input-group-button">
                                                      <button type="button" class="button hollow circle" data-quantity="plus" data-field="quantity">
                                                      <i class="fa fa-plus" aria-hidden="true"></i>
                                                      </button>
                                                      </div>
                                                      </div>
                                                      </div>
                                                      </div> -->
                                                   <!-- @else -->
                                                   <input class="input-group-field" type="hidden" name="quantity" value="1" class="quantity">
                                                   <!-- @endif -->
                                                   <div class="col-md-12 col-xs-12">
                                                      @if(!empty(session('cart')))
                                                      @if($product->category->type == 0)
                                                      @if(!empty(session('cart')))
                                                      @foreach((array) session('cart') as $id => $details)
                                                      @if($details['pro_type'] == 0)
                                                      @if($loop->first)
                                                      <button type="button" class="add-to-cart add-to-cart-detail-pro btn btn-block" data-id="{{ $product->id }}" data-type="{{ $product->category->type }}" style="height:auto;padding-top: 0px;cursor:pointer;border:0px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</button>
                                                      @endif
                                                      @else
                                                      @if($loop->first)
                                                      <button type="button" disabled class="btn btn-disabled-block btn-block" style="height:auto;padding-top: 0px;cursor:pointer;border:0px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</button>
                                                      @endif
                                                      @endif
                                                      @endforeach
                                                      @endif
                                                      @else
                                                      @if(!empty(session('cart')))
                                                      @foreach((array) session('cart') as $id => $details)
                                                      @if($details['pro_type'] == 1)
                                                      @if($loop->first)
                                                      <button type="button" class="add-to-cart add-to-cart-detail-pro btn btn-block" data-id="{{ $product->id }}" data-type="{{ $product->category->type }}" style="height:auto;padding-top: 0px;cursor:pointer;border:0px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</button>
                                                      @endif
                                                      @else
                                                      @if($loop->first)
                                                      <button type="button" disabled class="btn-disabled-block btn-block btn btn-block" style="height:auto;padding-top: 0px;cursor:pointer;border:0px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</button>
                                                      @endif
                                                      @endif
                                                      @endforeach
                                                      @endif
                                                      @endif
                                                      @else
                                                      <button type="button" class="add-to-cart add-to-cart-detail-pro btn btn-block" data-id="{{ $product->id }}" data-type="{{ $product->category->type }}" style="height:auto;padding-top: 0px;cursor:pointer;border:0px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</button>
                                                      @endif
                                                   </div>
                                                </div>
                                                <hr class="box-hr">
                                             </div>
                                             <!-- <div class="col-md-12">
                                                <div class="row">
                                                	<div class="col-md-6">
                                                		<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Add to Wish List</a>
                                                	</div>
                                                	<div class="col-md-6">
                                                		<a href="#"><i class="fa fa-refresh" aria-hidden="true"></i> Compare this Product</a>
                                                	</div>
                                                </div>
                                                <hr class="box-hr">
                                                </div> -->
                                             <div class="col-md-12 social-icon-part-pro-det">
                                                <ul class="m-0 p-0">
                                                   <li><a href=""><i class="fa fa-facebook-square"></i></a></li>
                                                   <!-- <li><a href=""><i class="fa fa-twitter-square"></i></a></li> -->
                                                   <li><a href=""><i class="fa fa-google-plus-square"></i></a></li>
                                                   <li><a href=""><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 description-part mv-w">
                           <div class="row">
                              <div class="col-md-12 description-text">
                                 <p>DESCRIPTION</p>
                              </div>
                              <div class="col-md-12">
                                 {!! $product->description !!}
                              </div>
                           </div>
                        </div>
                        <!-- <div class="col-md-12 mt-10 p-0">
                           <label class="tag-text">Tags : </label><span> <a href="#" class="co-fe-ge-text">{{ $product->name }}</a></span>
                           </div> -->
                        <div class="col-md-12 mt-10 p-0 mv-w related-products-last-part-det">
                           <h3 class="mt-5">RELATED PRODUCTS</h3>
                        </div>
                        <div class="col-md-12 mt-10">
                           <div class="row mt-10">
                              @php
                              $count = 1;
                              @endphp
                              @if(!empty($reletedProduct))
                              @foreach($reletedProduct as $key => $value)
                              <div class="col-md-4 {{ $count == 1 ? 'pl-0' : ''}} mv-w mv-p-0">
                                 <div class="rel-pro-box bg-white">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <img src="{{ asset('/upload/product/'.$value->image) }}" alt="" class="product-img" style="height:100%;width:100%;">
                                       </div>
                                       <div class="col-md-12 text-center pro-title">
                                          <p><a href="{{ route('order.detail',$value->id) }}">{{ $value->name }}</a></p>
                                       </div>
                                       <div class="col-md-12 text-center price-pro-box-det mt-5">
                                          <p>${{ number_format($value->price,2) }}</p>
                                       </div>
                                       <div class="col-md-12 text-center mt-5 mb-15">
                                          <a href="{{ route('order.detail',$value->id) }}" class="add-to-cart pro-box-btn mt-5">ADD TO CART</a>
                                       </div>
                                       <!-- <div class="col-md-12 text-center mt-5 add-com-text">
                                          <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Add to Wish List</a>
                                          <a href="#"><i class="fa fa-refresh ml-5" aria-hidden="true"></i> Compare this Product</a>
                                          </div> -->
                                    </div>
                                 </div>
                              </div>
                              @php
                              ++$count;
                              @endphp
                              @endforeach
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- tab -->
<!-- checkout alert box -->
<div class="checkout-alert-box append-popup-box" id="dialog" style="display: none;">
</div>
<!-- checkout alert box -->
<div class="add-more-box" style="display: none;">
   <div class="col-md-11 sub-form-box more-form">
      <div class="col-md-8 col-xs-8">
         <h5>Product </h5>
      </div>
      <div class="col-md-4 col-xs-4 text-right">
         <button class="btn btn-danger btn-remove-product">
         <i class="fa fa-trash" aria-hidden="true"></i>
         </button>
      </div>
      @if($product->address == 0)
      <div class="col-md-12  form-text">
         <form class="">
            <div class="row">
               <div class="col-md-12">
                  <label><span>*</span> Address</label>
                  <input type="text" name="address[numberForm]" placeholder="Address" class="form-control address">
               </div>
            </div>
         </form>
      </div>
      @endif
      @if($product->neighborhood == 0)
      <div class="col-md-12 form-text">
         <form class="">
            <div class="row">
               <div class="col-md-12">
                  <label><span>*</span> Neighborhood</label>
                  <input type="text" name="neighborhood[numberForm]" placeholder="Neighborhood" class="form-control neighborhood">
               </div>
            </div>
         </form>
      </div>
      @endif
      <div class="col-md-12">
         <hr class="box-hr">
         <label>Extra Option</label>
         <div class="row">
            @if($product->rush_delivery == 0)
            <button type="button" class="btn_choose_sent bg_btn_chose_1">
               <!-- <input type="radio" name="extra_option" value="Rush Delivery - {{ $product->rush_delivery_day }} Business Day (+${{ number_format($product->rush_delivery_charge,2) }})"/>Rush Delivery - {{ $product->rush_delivery_day }} Business Day (+${{ number_format($product->rush_delivery_charge,2) }}) -->
               <input type="radio" name="extra_option[numberForm]" class="extra_option" value="1"/>Rush Delivery - {{ $product->rush_delivery_day }} Business Day (+${{ number_format($product->rush_delivery_charge,2) }})
            </button>
            @endif
            @if($product->custom_charge == 0)
            <button type="button" class="btn_choose_sent bg_btn_chose_2">
               <!-- <input type="radio" name="extra_option" value="Custom Design (+${{ number_format($product->custom_design_charge,2) }})"/>Custom Design (+${{ number_format($product->custom_design_charge,2) }}) -->
               <input type="radio" name="extra_option[numberForm]" class="extra_option" value="2"/>Custom Design (+${{ number_format($product->custom_design_charge,2) }})
            </button>
            @endif
         </div>
         <hr class="box-hr">
         @if($product->upload_image == 1)
         <hr class="box-hr">
         @endif
      </div>
      @if($product->upload_image == 0)
      <div class="col-md-12 form-text">
         <form class="">
            <div class="row">
               <div class="col-md-12">
                  <label>Custom Design File Upload</label>
                  <input type="file" name="image[numberForm]" id='upload-file' class="form-control">
                  <input type="hidden" name="custom_design_file_upload[numberForm]" class="form-control cart-file">
               </div>
            </div>
         </form>
         <hr class="box-hr">
      </div>
      @endif
   </div>
</div>
@endsection
@section('footer_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function(){
      // This button will increment the value
      $('[data-quantity="plus"]').click(function(e){
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          fieldName = $(this).attr('data-field');
          // Get its current value
          var currentVal = parseInt($('input[name='+fieldName+']').val());
          // If is not undefined
          if (!isNaN(currentVal)) {
              // Increment
              $('input[name='+fieldName+']').val(currentVal + 1);
          } else {
              // Otherwise put a 0 there
              $('input[name='+fieldName+']').val(0);
          }
      });
   
   
      // This button will decrement the value till 0
      $('[data-quantity="minus"]').click(function(e) {
           // Stop acting like a button
           e.preventDefault();
           // Get the field name
           fieldName = $(this).attr('data-field');
           // Get its current value
           var currentVal = parseInt($('input[name='+fieldName+']').val());
           // If it isn't undefined or its greater than 0
           if (!isNaN(currentVal) && currentVal > 0) {
               // Decrement one
               $('input[name='+fieldName+']').val(currentVal - 1);
           } else {
               // Otherwise put a 0 there
               $('input[name='+fieldName+']').val(0);
           }
       });
   });
</script>
<script type="text/javascript">
   jQuery("#carousel").owlCarousel({
     autoplay: true,
     lazyLoad: true,
     loop: true,
     margin: 20,
     responsiveClass: true,
     autoHeight: true,
     autoplayTimeout: 7000,
     smartSpeed: 800,
     nav: true,
     responsive: {
       0: {
         items: 1
       },
   
       600: {
         items: 3
       },
   
       1024: {
         items: 4
       },
   
       1366: {
         items: 4
       }
     }
   });
   
</script>
<script type="text/javascript">
   $(document).on('change','#upload-file',function(){
       var obj = $(this); 
       var file_data = $(this).prop("files")[0]; 
       var file_name = file_data.name;
       var token = "{{ csrf_token() }}";
         	var file_extension = file_name.split('.').pop().toLowerCase();  
       	
     		var formData = new FormData();
     		formData.append('_token', token);
     		formData.append('file', file_data);
   
       if(jQuery.inArray(file_extension,['png','jpg','jpeg','xlsx','pdf']) == -1){
             alert("Invalid image file");
             obj.parent().parent().find('#upload-file').val('');
       }else{
       	 $.ajax({
             url:'/cart/fileUpload',
             method:'POST',
             cache: false,
             dataType: 'json',
             processData: false,
   		  contentType: false,
             data:formData,
             success:function(data){
              	obj.parent().parent().find('.cart-file').val(data.success);
             }
           });
       }
   });
   
   // $('.add-to-cart-detail-pro').click(function(){
   // 	var id = $(this).attr('data-id');
   
   // 	$('.form-box').find('.sub-form-box').each(function(index, el) {
   // 		$.ajax({
   // 	        url: '{{ route("view-cart-popup") }}',
   // 	        method: 'POST',
   // 	        data: {_token:token,id:id},
   // 	        success: function(data) {
   // 	        	$('.checkbox-header').css('display','block');
   //    				$('.append-popup-box').html(data.ajaxView);
   // 	        }
   // 	    });
   // 		$('.checkout-alert-box').fadeIn().delay(3000).fadeOut();
   // 	});
   // });

   $('.close-checkout-alert-box').click(function(){
   	$('.checkout-alert-box').fadeOut();
   });
</script>
<script type="text/javascript">
   $('.add-to-cart-detail-pro').click(function(e){
   	objCart = $(this);
   	var token = "{{ csrf_token() }}";
   	var data = [];
   	
   	objCart.attr('disabled','disabled');
   
   	$('.form-box').find('.sub-form-box').each(function(index, el) {
   		objForm = $(this);
   		var id = objCart.attr('data-id');
   		var quantity = objForm.find('input[name=quantity]').val();
   		var address = objForm.find('.address').val();
   		var neighborhood = objForm.find('.neighborhood').val();
   		var extra_option = objForm.find(".extra_option:checked").val();
   		var custom_design_file_upload = objForm.find('.cart-file').val();
   		var pro_type = objCart.attr('data-type');
   
   		var formData = {product_id:id,quantity:quantity,neighborhood:neighborhood,pro_type:pro_type,address:address,extra_option:extra_option,custom_design_file_upload:custom_design_file_upload};
   		data.push(formData);
   	});
   
   	$.ajax({
           url: '{{ route("add-to-cart") }}',
           method: 'POST',
           data:{_token:token,formData:data},
           success: function(data) {
           	console.log(data);
           	if (data.hasOwnProperty("error")) {
           		alert(data.error);
           		objCart.removeAttr('disabled');
           	}else{
     				$('.append-data-cart').html(data.ajaxView);
     				$('.cart-button-head').find('li a .quantity').html(data.quantity);
     				$('.cart-button-head').find('li a .total').html($.number(data.total,2));
     				$('.address').val('');
     				$('.neighborhood').val('');
     				$(".extra_option:checked").prop( "checked", false );
     				$('.cart-file').val('');
     				$('#upload-file').val('');
		   
		   			objCart.removeAttr('disabled');
		   			location.reload();
           	}

           }
       });
   	$('.more-form').remove();
   });
   
   $('.btn-add-more').click(function(event) {
   	var formMore = $('.add-more-box').html();
   	var number  = $('.sub-form-box').length;
   	formMore = formMore.replaceAll('numberForm',number);
   
   	$('.form-box').append(formMore);
   });
   $('body').on('click', '.btn-remove-product', function(event) {
   	event.preventDefault();
   	$(this).parent().parent().remove();
   });
</script>
<script>
   $(document).ready(function(){
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
   });
   });
</script>
@endsection