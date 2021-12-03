                    if (that.params.tempFile != '') {
                        $btn = $(this);
                        /*
                        var files = $('#upload-img-file').files;
                        console.log('upload-image-file', $('#upload-img-file'));
                        console.log('files', files);
                        */

                        var formData = new FormData();
                        formData.append('_token', "{{ csrf_token() }}");
                        formData.append('img_name', img_name);
                        formData.append(img_name, that.params.tempFile);
                        formData.append('type', 'upload-hdi-icon');
                        $.ajax({
                            url: "{{ URL::route('updateHdiImage', ['hdiId' => $hdiId, 'userId' => $userId]) }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            beforeSend:function(){
                                that.showLoading($btn);
                                toastr.info('Image Upload Process Started');
                            },
                            success: function (data) {
                                that.showDebug('saveChanges - success');
                                //console.log('data',data);
                                if (data) {
                                    if (data.status == 1) {
                                        //$imgEle.attr("src", resp);
                                        //$imgEle.attr("src", '/hdis/{{$userId}}/{{$hdiId}}/'+img_name+'.svg'+'#' + new Date().getTime());

                                        //$imgEle.find('div.icon-content').html(data.resp_data);
                                        //$('#imageUpload').modal('hide');
                                        toastr.success(data.msg);
                                    } else if (data.status == 0) {
                                        if (data.msg && data.msg != '') {
                                            toastr.error(data.msg);
                                        } else {
                                            toastr.error('Something goes wrong, Please try later');
                                        }
                                    }
                                }
                            },
                            complete:function(){
                                that.hideLoading($btn);
                            }
                        });
                    } else {
                        toastr.info('You need to select image to upload ');
                    }