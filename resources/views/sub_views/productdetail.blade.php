  <!-- Custom Features -->
  <div class="cps-section cps-section-padding cps-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="cps-section-header text-center">
                        <h3 class="cps-section-title">{!! getSettingValue('product-detail') !!}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="connection-mock text-center">
                        <div class="connection-logoes">
                            <div class="connection-logo-item">
                                <img src="img/report-logos/school.png">
                                <span class="connection-name">{{__('sub_views_productdetail.schools')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/transit.png">
                                <span class="connection-name">{{__('sub_views_productdetail.transit')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/shops.png">
                                <span class="connection-name">{{__('sub_views_productdetail.shops')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/health.png">
                                <span class="connection-name">{{__('sub_views_productdetail.health')}}</span>
                            </div>
                        </div>
                        <div class="center-block logo-mock">
                            <div class="sm-logo center-block sm-logo-center-block"><img src="img/sm-logo.jpg" alt="site logo"></div>
                        </div>
                        <div class="connection-logoes">
                            <div class="connection-logo-item">
                                <img src="img/report-logos/parks.png">
                                <span class="connection-name">{{__('sub_views_productdetail.parks')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/cafe.png">
                                <span class="connection-name">{{__('sub_views_productdetail.cafes')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/liberary.png">
                                <span class="connection-name">{{__('sub_views_productdetail.libraries')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/demographics.png">
                                <span class="connection-name">{{__('sub_views_productdetail.demographics')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-4">
            <div class="video-box">
               <iframe src="https://www.youtube.com/embed/SKxvdMEGKfE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-4">
          <div class="video-box">
            <iframe src="https://www.youtube.com/embed/WQijL3yXB-4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-4">
          <div class="video-box">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/u-A7SeZz9Ns" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
    </div>


  <div class="cps-section cps-section-padding cps-gray-bg product_details_section" id="features">
      <div class="container">
          <div class="cps-sub-section">
              <div class="row">
                  <div class="col-md-8 col-md-offset-2 col-xs-12">
                      <div class="cps-section-header text-center">
                          <h3 class="cps-section-title">{{__('sub_views_productdetail.para1')}}</h3>
                          <p class="cps-section-text"></p>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-6 col-xs-12 xs-bottom-30 easy_to_read">
                      <h4 class="cps-subsection-title">{{__('sub_views_productdetail.easyToRead')}}</h4>
                      <p class="cps-subsection-text">{{__('sub_views_productdetail.para2')}}</p>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                      <img class="img-responsive" src="{{ asset('upload/productImageSetting/'.getSettingValue('product-detail-image')) }}" alt="...">
                  </div>
              </div>
          </div>
          <div class="cps-sub-section">
              <div class="row">
                  <div class="col-sm-6 col-sm-push-6 col-xs-12 xs-bottom-30">
                      <h4 class="cps-subsection-title">{{__('sub_views_productdetail.positiveBuyingExperience')}}</h4>
                      <p class="cps-subsection-text">{{__('sub_views_productdetail.para3')}}</p>
                  </div>
                  <div class="col-sm-6 col-sm-pull-6 col-xs-12">
                      <img class="img-responsive" src="img/features/positive_buying_experience.png" alt="...">
                  </div>
              </div>
          </div>
          <div class="cps-sub-section">
              <div class="row">
                  <div class="col-sm-6 col-xs-12 xs-bottom-30 build-confidence">
                      <h4 class="cps-subsection-title">{{__('sub_views_productdetail.buildConfidence')}}</h4>
                      <p class="cps-subsection-text">{{__('sub_views_productdetail.para4')}}</p>
                  </div>
                  <div class="col-sm-6 col-xs-12 text-center">
                      <img class="img-responsive features-side-img" src="img/features/build_confidence.jpg" alt="...">
                  </div>
              </div>
          </div>
          <div class="cps-sub-section">
              <div class="row">
                  <div class="col-sm-6 col-sm-push-6 col-xs-12 xs-bottom-30 a-step-ahead">
                      <h4 class="cps-subsection-title">{{__('sub_views_productdetail.aStepAhead')}}</h4>
                      <p class="cps-subsection-text">{{__('sub_views_productdetail.para5')}}</p>
                  </div>
                  <div class="col-sm-6 col-sm-pull-6 col-xs-12">
                      <img class="img-responsive" src="img/features/a_step_ahead.png" alt="...">
                  </div>
              </div>
          </div>
          <div class="cps-sub-section">
              <div class="row">
                  <div class="col-sm-6 col-xs-12 xs-bottom-30 new-audiences" style="">
                      <h4 class="cps-subsection-title">{{__('sub_views_productdetail.newAudiences')}}</h4>
                      <p class="cps-subsection-text">{{__('sub_views_productdetail.para6')}}</p>
                  </div>
                  <div class="col-sm-6 col-xs-12 text-center">
                      <img class="img-responsive features-side-img" src="img/features/new_audiences.png" alt="...">
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Custom Features End -->
