 angular.module('directive', [])
.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}])


.directive("searchableMultiselect", function($timeout) {
	return {
		templateUrl: 'searchableMultiselect.html',
		restrict: 'AE',
		scope: {
			displayAttr: '@',
			selectedItems: '=',
			allItems: '=',
			readOnly: '=',
			addItem: '&',
			removeItem: '&'
		},
		link: function(scope, element, attrs) {
			element.bind('click', function (e) {
				e.stopPropagation();
			});

			scope.width = element[0].getBoundingClientRect();
	
			scope.updateSelectedItems = function(obj) {
				var selectedObj;
				for (i = 0; typeof scope.selectedItems !== 'undefined' && i < scope.selectedItems.length; i++) {
					if (scope.selectedItems[i][scope.displayAttr].toUpperCase() === obj[scope.displayAttr].toUpperCase()) {
						selectedObj = scope.selectedItems[i];
						break;
					}
				}
				if ( typeof selectedObj === 'undefined' ) {
					scope.addItem({item: obj});
				} else {
					scope.removeItem({item: selectedObj});
				}
			};
			scope.isItemSelected = function(item) {
				if ( typeof scope.selectedItems === 'undefined' ) return false;

				var tmpItem;
				for (i=0; i < scope.selectedItems.length; i++) {
					tmpItem = scope.selectedItems[i];
					if ( typeof tmpItem !== 'undefined'
					&&	typeof tmpItem[scope.displayAttr] !== 'undefined'
					&&	typeof item[scope.displayAttr] !== 'undefined'
					&&	tmpItem[scope.displayAttr].toUpperCase() === item[scope.displayAttr].toUpperCase() ) {
						return true;
					}
				}

				return false;
			};

			scope.commaDelimitedSelected = function() {
				var list = "";
				angular.forEach(scope.selectedItems, function (item, index) {
					list += item[scope.displayAttr];
					if (index < scope.selectedItems.length - 1) list += ', ';
				});
				return list.length ? list : "Nothing Selected";
			}
		}
	}
})

.directive('starRating', function () {
    return {
        scope: {
            rating: '=',
            maxRating: '@',
            readOnly: '@',
            click: "&",
            mouseHover: "&",
            mouseLeave: "&"
        },
        restrict: 'EA',
        template:
            "<div style='display: inline-block; margin: 0px; padding: 0px; cursor:pointer;' ng-repeat='idx in maxRatings track by $index'> \
                    <img ng-src='{{((hoverValue + _rating) <= $index) && \"http://www.codeproject.com/script/ratings/images/star-empty-lg.png\" || \"http://www.codeproject.com/script/ratings/images/star-fill-lg.png\"}}' \
                    ng-Click='isolatedClick($index + 1)' \
                    ng-mouseenter='isolatedMouseHover($index + 1)' \
                    ng-mouseleave='isolatedMouseLeave($index + 1)'></img> \
            </div>",
        compile: function (element, attrs) {
            if (!attrs.maxRating || (Number(attrs.maxRating) <= 0)) {
                attrs.maxRating = '5';
            };
        },
        controller: function ($scope, $element, $attrs) {
            $scope.maxRatings = [];

            for (var i = 1; i <= $scope.maxRating; i++) {
                $scope.maxRatings.push({});
            };

            $scope._rating = $scope.rating;
			
			$scope.isolatedClick = function (param) {
				if ($scope.readOnly == 'true') return;

				$scope.rating = $scope._rating = param;
				$scope.hoverValue = 0;
				$scope.click({
					param: param
				});
			};

			$scope.isolatedMouseHover = function (param) {
				if ($scope.readOnly == 'true') return;

				$scope._rating = 0;
				$scope.hoverValue = param;
				$scope.mouseHover({
					param: param
				});
			};

			$scope.isolatedMouseLeave = function (param) {
				if ($scope.readOnly == 'true') return;

				$scope._rating = $scope.rating;
				$scope.hoverValue = 0;
				$scope.mouseLeave({
					param: param
				});
			};
        }
    };
})

.directive('focusOnShow', function($timeout) {
    return {
        restrict: 'A',
        link: function($scope, $element, $attr) {
            if ($attr.ngShow){
                $scope.$watch($attr.ngShow, function(newValue){
                    if(newValue){ $timeout(function(){ $element[0].focus(); }, 0); }})}
					if ($attr.ngHide){
						$scope.$watch($attr.ngHide, function(newValue){
							if(!newValue){$timeout(function(){$element[0].focus();}, 0);}})}
}};})

.directive('scrollTo',function(){return function(scope,element,attrs){var ele=angular.element('#'+attrs.scrollTo);if(ele.length){element.click(function(){$("html, body").animate({scrollTop:ele.offset().top});});}};})
.directive('icheck', ['$timeout', function($timeout){
		return {
			require: 'ngModel',
			link: function($scope, element, $attrs, ngModel) {
				return $timeout(function() {
					var value = $attrs['value'];

					$scope.$watch($attrs['ngModel'], function(newValue){
						$(element).iCheck('update');
					})

					return $(element).iCheck({
						checkboxClass: 'icheckbox_minimal-blue',
						radioClass: 'iradio_minimal-blue',
					}).on('ifChanged', function(event) {
						if ($(element).attr('type') === 'checkbox' && $attrs['ngModel']) {
							$scope.$apply(function() {
								return ngModel.$setViewValue(event.target.checked);
							});
						}
						if ($(element).attr('type') === 'radio' && $attrs['ngModel']) {
							return $scope.$apply(function() {
								return ngModel.$setViewValue(value);
							});
						}
					});
				});
			}
		};
	}])
	
.directive('ddMenu', function() {
    return {
      restrict: 'A',
      scope: {
        value: '='
      },
      link: function(scope, element) {
        // set the initial value
        var $el = $(element);
        scope.value = $el.find('li:first').text();
        
        // listen for changes
        $el.on('click', 'li', function() {
          scope.value = $(this).text();
          scope.$apply(); 
        });
      }
    };
})

.directive('ckEditor', function () {
    return {
        require: '?ngModel',
        link: function (scope, elm, attr, ngModel) {
            var ck = CKEDITOR.replace(elm[0]);
            if (!ngModel) return;
            ck.on('instanceReady', function () {
                ck.setData(ngModel.$viewValue);
            });
            function updateModel() {
                scope.$apply(function () {
                ngModel.$setViewValue(ck.getData());
            });
        }
        ck.on('change', updateModel);
        ck.on('key', updateModel);
        ck.on('dataReady', updateModel);

        ngModel.$render = function (value) {
            ck.setData(ngModel.$viewValue);
        };
    }
};
})
.directive('ngFileUploadsss', function(){
		var _error = function(scope, attrs, msg){
			scope.$apply(function(){
				scope.error = msg;
				scope.message = '';
				if(attrs.onError) scope.onError(msg);
			});
		};
		var _message = function(scope, msg){
			scope.$apply(function(){
				scope.error = '';
				scope.message = msg;
			});
		};
		var _success = function(scope, attrs, res){
			scope.$apply(function(){
				scope.error = '';
				scope.message = '';
				if(attrs.fileLink) scope.fileLink = res.link;
				if(attrs.fileName) scope.fileName = res.name;
				if(attrs.onSuccess){
					scope.onSuccess(res);
				}
			});
		};
		return {
			scope: {
				fileName: '=',
				fileLink: '=',
				onSuccess: '=',
				onError: '='
			},
			template: '<div style="color:green" ng-show="message">{{message}}</div><div style="color:red" ng-show="error">{{error}}</div>',
			link: function(scope, element, attrs){
				console.log(scope);
				var options = angular.extend({url: 'api/cases/videoupload', name: 'file', replace: true}, scope.$eval(attrs.ngFileUpload));
				element.append('<iframe id=iframe_upload_v name=iframe_upload_v style="display:none"></iframe><form id=form_uploads method=post target=iframe_upload_v enctype="multipart/form-data" action="" style="display:inline"></br><div class="myLabel ">\
				<input type=file id="file_uploadsss" style="display: none;" name="file" title="Attach a Image"/><img src="/uploads/browse.png" id="upfilevideo" style="cursor:pointer" /></div></form></br>');
				
				var iframe = $('#iframe_upload_v', element), form = $('#form_uploads', element), file = $('#file_uploadsss', element);
					$("#upfilevideo").click(function () {
							//console.log(options);
					$("#file_uploadsss").trigger('click');
				});
				form.attr('action', options.url);
				file.bind('click', function(){
					form[0].reset();
				});
				if(typeof window.FileReader == 'undefined'){
					iframe.bind('load', function(){
						var res = $.trim(iframe.contents().find('body').text());
						if(res){
							try{
								res = JSON.parse(res);
								if(res.code == 200){
									_success(scope, attrs, res);
								}
								else{
									_error(scope, attrs, res.message);
								}
							}
							catch(error){
								_error(scope, attrs, 'API service error');
							}
						}
					});
					file.bind('change', function(){
						_message(scope, 'Uploading file ...');
						form.submit();
					});
				}
				else{
					file.bind('change', function(){
						_message(scope, 'Uploading file ...');
						var data = new FormData(form.get(0));
						if(options.replace) data.append('replace', scope.fileName);
						$.ajax({
							type: 'POST',
							url: options.url,
							dataType: 'json',
							data: data,
							xhr: function(){
								var _xhr = $.ajaxSettings.xhr();
								if(_xhr.upload){
									_xhr.upload.onprogress = function(e){
										scope.$apply(function(){
											scope.message = 'Uploading ' + (Math.round(e.loaded / e.total * 100) + "%");
										});
									};
								}
								return _xhr;
							},
							cache: false,
							contentType: false,
							processData: false
						}).done(function(res){
							_success(scope, attrs, res);
						}).fail(function(res){
							try{
								res = JSON.parse(res.responseText);
								_error(scope, attrs, res.message);
							}
							catch(error){
								_error(scope, attrs, 'API service error');
							}
						});
					});
				}
			}
		};
	})

	
.directive('ngFileUpload', function(){
  var _error = function(scope, attrs, msg){
   scope.$apply(function(){
    scope.error = msg;
    scope.message = '';
    if(attrs.onError) scope.onError(msg);
   });
  };
  var _message = function(scope, msg){
   scope.$apply(function(){
    scope.error = '';
    scope.message = msg;
   });
  };
  var _success = function(scope, attrs, res){
   scope.$apply(function(){
    scope.error = '';
    scope.message = '';
    if(attrs.fileLink) scope.fileLink = res.link;
    if(attrs.fileName) scope.fileName = res.name;
    if(attrs.onSuccess){
     scope.onSuccess(res);
    }
   });
  };
  return {
   scope: {
    fileName: '=',
    fileLink: '=',
    onSuccess: '=',
    onError: '='
   },
   template: '<div style="color:green" ng-show="message">{{message}}</div><div style="color:red" ng-show="error">{{error}}</div>',
   link: function(scope, element, attrs){
	    console.log(scope);
    var options = angular.extend({url: 'api/upload', name: 'file', replace: true}, scope.$eval(attrs.ngFileUpload));
   element.append('<iframe id=iframe_uploads" name=iframe_uploads style="display:none"></iframe><form id=form_upload_i method=post target=iframe_uploads enctype="multipart/form-data" action="" style="display:inline"></br><div class="myLabel ">\
	<input type=file id=file_uploadsimples  style="display: none;" name="file" title="Attach a Image" /><img src="/uploads/browse.png" id="upfilesimples" style="cursor:pointer" /></div></form></br>');
	var iframe = $('#iframe_uploads', element), form = $('#form_upload_i', element), file = $('#file_uploadsimples', element);
	$("#upfilesimples").click(function () {
		$("#file_uploadsimples").trigger('click');
	});

    form.attr('action', options.url);
    file.bind('click', function(){
		 console.log(scope);
     form[0].reset();
    });
    if(typeof window.FileReader == 'undefined'){
     iframe.bind('load', function(){
      var res = $.trim(iframe.contents().find('body').text());
      if(res){
       try{
        res = JSON.parse(res);
        if(res.code == 200){
			console.log(res);
         _success(scope, attrs, res);
        }
        else{
         _error(scope, attrs, res.message);
        }
       }
       catch(error){

        _error(scope, attrs, 'API service error');
       }
      }
     });
	file.bind('change', function(){
		_message(scope, 'Uploading file ...');
		form.submit();
     });
    }
    else{
    file.bind('change', function(){
		 console.log(scope);
      _message(scope, 'Uploading file ...');
      var data = new FormData(form.get(0));
      if(options.replace) data.append('replace', scope.fileName);
      $.ajax({
       type: 'POST',
       url: options.url,
       dataType: 'json',
       data: data,
       xhr: function(){
        var _xhr = $.ajaxSettings.xhr();
        if(_xhr.upload){
         _xhr.upload.onprogress = function(e){
          scope.$apply(function(){
           scope.message = 'Uploading Progress' + (Math.round(e.loaded / e.total * 100) + "%");
          });
         };
        }
        return _xhr;
       },
       cache: false,
       contentType: false,
       processData: false
      }).done(function(res){
       _success(scope, attrs, res);
      }).fail(function(res){
       try{
        res = JSON.parse(res.responseText);
		console.log(res);
        _error(scope, attrs, res.message);
       }
       catch(error){
        _error(scope, attrs, 'API service error');
       }
      });
     });
    }
   }
  };
 })
 .directive('ngFileUploadadmin', function(){
  var _error = function(scope, attrs, msg){
   scope.$apply(function(){
    scope.error = msg;
    scope.message = '';
    if(attrs.onError) scope.onError(msg);
   });
  };
  var _message = function(scope, msg){
   scope.$apply(function(){
    scope.error = '';
    scope.message = msg;
   });
  };
  var _success = function(scope, attrs, res){
   scope.$apply(function(){
    scope.error = '';
    scope.message = '';
    if(attrs.fileLink) scope.fileLink = res.link;
    if(attrs.fileName) scope.fileName = res.name;
    if(attrs.onSuccess){
     scope.onSuccess(res);
    }
   });
  };
  return {
   scope: {
    fileName: '=',
    fileLink: '=',
    onSuccess: '=',
    onError: '='
   },
   template: '<div style="color:green" ng-show="message">{{message}}</div><div style="color:red" ng-show="error">{{error}}</div>',
   link: function(scope, element, attrs){
	    console.log(scope);
    var options = angular.extend({url: 'api/ads/upload', name: 'file', replace: true}, scope.$eval(attrs.ngFileUpload));
   element.append('<iframe id=iframe_uploads" name=iframe_uploads style="display:none"></iframe><form id=form_upload_i method=post target=iframe_uploads enctype="multipart/form-data" action="" style="display:inline"></br><div class="myLabel ">\
	<input type=file id=file_uploadsimples   name="file" title="Attach a Image" /></div></form></br>');
	var iframe = $('#iframe_uploads', element), form = $('#form_upload_i', element), file = $('#file_uploadsimples', element);


    form.attr('action', options.url);
    file.bind('click', function(){
		 console.log(scope);
     form[0].reset();
    });
    if(typeof window.FileReader == 'undefined'){
     iframe.bind('load', function(){
      var res = $.trim(iframe.contents().find('body').text());
      if(res){
       try{
        res = JSON.parse(res);
        if(res.code == 200){
			console.log(res);
         _success(scope, attrs, res);
        }
        else{
         _error(scope, attrs, res.message);
        }
       }
       catch(error){

        _error(scope, attrs, 'API service error');
       }
      }
     });
	file.bind('change', function(){
		_message(scope, 'Uploading file ...');
		form.submit();
     });
    }
    else{
    file.bind('change', function(){
		 console.log(scope);
      _message(scope, 'Uploading file ...');
      var data = new FormData(form.get(0));
      if(options.replace) data.append('replace', scope.fileName);
      $.ajax({
       type: 'POST',
       url: options.url,
       dataType: 'json',
       data: data,
       xhr: function(){
        var _xhr = $.ajaxSettings.xhr();
        if(_xhr.upload){
         _xhr.upload.onprogress = function(e){
          scope.$apply(function(){
           scope.message = 'Uploading Progress' + (Math.round(e.loaded / e.total * 100) + "%");
          });
         };
        }
        return _xhr;
       },
       cache: false,
       contentType: false,
       processData: false
      }).done(function(res){
       _success(scope, attrs, res);
      }).fail(function(res){
       try{
        res = JSON.parse(res.responseText);
		console.log(res);
        _error(scope, attrs, res.message);
       }
       catch(error){
        _error(scope, attrs, 'API service error');
       }
      });
     });
    }
   }
  };
 })
 .directive('ngFileUploads', function(){
  var _error = function(scope, attrs, msg){
   scope.$apply(function(){
    scope.error = msg;
    scope.message = '';
    if(attrs.onError) scope.onError(msg);
   });
  };
  var _message = function(scope, msg){
   scope.$apply(function(){
    scope.error = '';
    scope.message = msg;
   });
  };
  var _success = function(scope, attrs, res){
   scope.$apply(function(){
    scope.error = '';
    scope.message = '';
    if(attrs.fileLink) scope.fileLink = res.link;
    if(attrs.fileName) scope.fileName = res.name;
    if(attrs.onSuccess){
     scope.onSuccess(res);
    }
   });
  };
  return {
   scope: {
    fileName: '=',
    fileLink: '=',
    onSuccess: '=',
    onError: '='
   },
   template: '<div style="color:green" ng-show="message">{{message}}</div><div style="color:red" ng-show="error">{{error}}</div>',
   link: function(scope, element, attrs){
	   console.log(scope.fileName);
    var options = angular.extend({url: 'api/cases/upload', name: 'file', replace: true}, scope.$eval(attrs.ngFileUpload));
   element.append('<iframe id=iframe_upload name=iframe_upload style="display:none"></iframe><form id=form_upload method=post target=iframe_upload enctype="multipart/form-data" action="" style="display:inline"></br><div class="myLabel ">\
	<input type=file id=file_upload2  style="display: none;" name="file" title="Attach a Image" /><img src="/uploads/browse.png" id="upfile2" style="cursor:pointer" /></div></form></br>');
	var iframe = $('#iframe_upload', element), form = $('#form_upload', element), file = $('#file_upload2', element);
	$("#upfile2").click(function () {
		$("#file_upload2").trigger('click');
	});
	
    form.attr('action', options.url);
    file.bind('click', function(){
     form[0].reset();
    });
    if(typeof window.FileReader == 'undefined'){
     iframe.bind('load', function(){
      var res = $.trim(iframe.contents().find('body').text());
      if(res){
       try{
        res = JSON.parse(res);
        if(res.code == 200){
			console.log(res);
         _success(scope, attrs, res);
        }
        else{
         _error(scope, attrs, res.message);
        }
       }
       catch(error){

        _error(scope, attrs, 'API service error');
       }
      }
     });
	file.bind('change', function(){
		_message(scope, 'Uploading file ...');
		form.submit();
     });
    }
    else{
    file.bind('change', function(){
      _message(scope, 'Uploading file ...');
      var data = new FormData(form.get(0));
      if(options.replace) data.append('replace', scope.fileName);
      $.ajax({
       type: 'POST',
       url: options.url,
       dataType: 'json',
       data: data,
       xhr: function(){
        var _xhr = $.ajaxSettings.xhr();
        if(_xhr.upload){
         _xhr.upload.onprogress = function(e){
          scope.$apply(function(){
           scope.message = 'Uploading Progress' + (Math.round(e.loaded / e.total * 100) + "%");
          });
         };
        }
        return _xhr;
       },
       cache: false,
       contentType: false,
       processData: false
      }).done(function(res){
       _success(scope, attrs, res);
      }).fail(function(res){
       try{
        res = JSON.parse(res.responseText);
		console.log(res);
        _error(scope, attrs, res.message);
       }
       catch(error){
        _error(scope, attrs, 'API service error');
       }
      });
     });
    }
   }
  };
 })
 
 .directive('uiPager', function($timeout){
  function getLimit(limit, current, records){
   if(records == 0) return 0;
   var _limit = limit * current;
   limit = limit > records ? limit - _limit + records : limit;
   if(_limit < 0) _limit = 0;
   return _limit;
  }

  function getOffset(current, limit, records){
   if(records == 0) return 0;
   if(current == 0) current = 1;
   var offset = (current - 1) * limit;
   if(offset < 0) offset = 0;
   return offset;
  }

  function getPages(records, current, limit, links){
   var count = Math.ceil(records / limit),
    pages = [], page, i,
    odd, mid, start, end, left, right, cpage;
   if(count < 2) return;
   links = count < links ? count : links;
   odd = links % 2;
   mid = Math.floor(links / 2);
   start = current - mid;
   end = current + mid;
   left = 1 - start;
   right = end - count;
   if(left > 0){
    start += left;
    end += left - (odd ? 0 : 1);
   }
   else if(right > 0){
    start -= right - (odd ? 0 : 1);
    end -= right;
   }
   if(start != 1) pages.push({index: 1, offset: getOffset(current, limit, records), limit: getLimit(limit, current, records), text: '<<'});
   if(current != 1) pages.push({index: current - 1, offset: getOffset(current - 1, limit, records), limit: getLimit(limit, current - 1, records), text: '<'});
   for(cpage = start; cpage <= end; cpage++){
    page = {};
    if(cpage == current) page.cssclass = 'current';
    page.index = cpage;
    page.text = cpage;
    page.offset = getOffset(cpage, limit, records);
    page.limit = getLimit(limit, cpage, records);
    pages.push(page);
   }
   if(current != count) pages.push({index: current + 1, offset: getOffset(current + 1, limit, records), limit: getLimit(limit, current + 1, records), text: '>'});
   if(end != count) pages.push({index: count, offset: getOffset(count, limit, records), limit: getLimit(limit, count, records), text: '>>'});
   return pages;
  }

  return {
   scope: {
    onChange: '=',
    current: '=',
    records: '=',
    info: '='
   },
   template: '<ul class="pagination themePagination">' +
    '<li>'+
    '<a ng-repeat="page in pages" ng-class="page.cssclass" ng-click="changePage(page)">{{page.text}}</a>' +
    '</li>'+
    '</ul>',
   link: function(scope, element, attrs){
    var opts = angular.extend({limit: 20, links: 10}, scope.$eval(attrs.uiPager));
    scope.changePage = function(page){
     scope.current = page.index;
     scope.pages = getPages(scope.records, page.index, opts.limit, opts.links);
     scope.onChange(page);
     $timeout(function(){
      $("html, body").animate({scrollTop: 132});
     }, 1000);
    };
    scope.$watch('records', function(value, ovalue){
     if(!value) return;
     scope.pages = getPages(value, 1, opts.limit, opts.links);
    });
   }
  };
 })

 .directive('ngAutocomplete', function() {
    return {
      require: 'ngModel',
      scope: {
        ngModel: '=',
        options: '=?',
        details: '=?'
      },

      link: function(scope, element, attrs, controller) {

        //options for autocomplete
        var opts
        var watchEnter = false
        //convert options provided to opts
        var initOpts = function() {

          opts = {}
          if (scope.options) {

            if (scope.options.watchEnter !== true) {
              watchEnter = false
            } else {
              watchEnter = true
            }

            if (scope.options.types) {
              opts.types = []
              opts.types.push(scope.options.types)
              scope.gPlace.setTypes(opts.types)
            } else {
              scope.gPlace.setTypes([])
            }

            if (scope.options.bounds) {
              opts.bounds = scope.options.bounds
              scope.gPlace.setBounds(opts.bounds)
            } else {
              scope.gPlace.setBounds(null)
            }

            if (scope.options.country) {
              opts.componentRestrictions = {
                country: scope.options.country
              }
              scope.gPlace.setComponentRestrictions(opts.componentRestrictions)
            } else {
              scope.gPlace.setComponentRestrictions(null)
            }
          }
        }

        if (scope.gPlace == undefined) {
          scope.gPlace = new google.maps.places.Autocomplete(element[0], {});
        }
        google.maps.event.addListener(scope.gPlace, 'place_changed', function() {
          var result = scope.gPlace.getPlace();
          if (result !== undefined) {
            if (result.address_components !== undefined) {

              scope.$apply(function() {

                scope.details = result;

                controller.$setViewValue(element.val());
              });
            }
            else {
              if (watchEnter) {
                getPlace(result)
              }
            }
          }
        })

        //function to get retrieve the autocompletes first result using the AutocompleteService 
        var getPlace = function(result) {
          var autocompleteService = new google.maps.places.AutocompleteService();
          if (result.name.length > 0){
            autocompleteService.getPlacePredictions(
              {
                input: result.name,
                offset: result.name.length
              },
              function listentoresult(list, status) {
                if(list == null || list.length == 0) {

                  scope.$apply(function() {
                    scope.details = null;
                  });

                } else {
                  var placesService = new google.maps.places.PlacesService(element[0]);
                  placesService.getDetails(
                    {'reference': list[0].reference},
                    function detailsresult(detailsResult, placesServiceStatus) {

                      if (placesServiceStatus == google.maps.GeocoderStatus.OK) {
                        scope.$apply(function() {

                          controller.$setViewValue(detailsResult.formatted_address);
                          element.val(detailsResult.formatted_address);

                          scope.details = detailsResult;

                          //on focusout the value reverts, need to set it again.
                          var watchFocusOut = element.on('focusout', function(event) {
                            element.val(detailsResult.formatted_address);
                            element.unbind('focusout')
                          })

                        });
                      }
                    }
                  );
                }
              });
          }
        }

        controller.$render = function () {
          var location = controller.$viewValue;
          element.val(location);
        };

        //watch options provided to directive
        scope.watchOptions = function () {
          return scope.options
        };
        scope.$watch(scope.watchOptions, function () {
          initOpts()
        }, true);

      }
    };
  })
.directive('loading', function (){
	return {
		restrict: 'E',
		replace:true,
		template: '<div class="loader-img"><img src="/themes/adminLte/images/loading.gif" width=50 height=50>LOADING...</div>',
		link: function (scope, element, attr) {
			scope.$watch('loading', function (val) {
				if (val)
					$(element).show();
				else
					$(element).hide();
			});
		}
	}
})
.directive('cutText', function($timeout){
		return function(scope, element, attrs){
			$timeout(function(){
				var text = element.text(), maxlength = element.attr('cut-text');
				if(text.length > maxlength){
					element.html(text.substr(0, maxlength) + '...');
					element.attr('title', text);
				}
			}, 500);
		}
	})
.directive('uiSuggest',['siteUrl', function(siteUrl,scope,$http){
	return {
		scope: {
			itemId: '=',
			itemValue: '=',
			hos: '=data',
		},
		controller: function($scope){
			$scope.onEdit = function() {
				$scope.abc='ok';
				console.log($scope.abc);
			};
			
		},
		link: function(scope, element, attrs,siteUrl){
			//console.log(siteUrl);
			var cache = {};
			var opts = angular.extend({url: location.href, minLength: 1}, scope.$eval(attrs.uiSuggest));
			 scope.toggle = function() {
                console.log("toggle");
            };
			var qa = opts.url.match(/[^#]\?/) ? '&' : '?';
			var update = function(event, ui){
				if(!ui.item) return;
				scope.$apply(function(scope){
					
					if(attrs.itemId) scope.itemId = ui.item.id || '';	
					if(attrs.itemValue) scope.itemValue = ui.item.value || '';
					if(attrs.onChange) scope.onChange(ui.item);
				});
			};
			element.bind('blur', function(){
				scope.$apply(function(){
					if(attrs.itemValue) scope.itemValue = element.val();
				});
			});
			scope.$watch('itemValue', function(value){
				element.val(value);
			});
			var options = {
				minLength: opts.minLength,
				source: function(request, response){
					if(request.term in cache){
						response(cache[request.term]);
						return;
					}
					$.ajax({
						url: opts.url + qa + 'autocomp=' + opts.name,
						dataType: "json",
						data: request,
						success: function(data){
							cache[request.term] = data.items;
							response(data.items);
						}
					});
				},
				select: update
			};
			//jqueryUi autocomplete
			element.autocomplete(options).data( "ui-autocomplete" )._renderItem = function( ul, item ) { 
				if(item.image===undefined){
					return $( "<li></li>" )  
				   .data( "item.autocomplete", item )  
				   .append( "<a href ='#' ng-click='onEdit()'>" + item.name+"</a>" )  
				   .appendTo( ul ); 
				}
				else{			
					if(item.image=== null ||item.image=='' ){item.image="no-image.png"}
					return $( "<li></li>" )  
				   .data( "item.autocomplete", item )  
				   .append( "<a href='/doctor-detail?type=search&id=" + item.pkId + "' >" + "<img style='width:45px;height:auto' src='/uploads/dr/" + item.image + "' /> " + item.firstName+ ' ' + item.middleName+ ' ' + item.lastName+"</a>" )  
				   .appendTo( ul );  
				}
			};
			
		
		}
	};
}])
 .directive('myEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.myEnter);
                });

                event.preventDefault();
            }
        });
    };
});
