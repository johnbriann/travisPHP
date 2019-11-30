<input id="type_for_cropper" type="hidden" />
<input id="path_for_cropper" type="hidden" />
<input id="image_for_cropper" type="hidden" />
<!--<div id="open_cropper_box">CROPPER</div>-->
<script>
/*$(document).on('click','#open_cropper_box',function(){
	// if($('#image_for_cropper').val() != ''){
		$('#cropper_manager_box').show('fadeIn');
		open_cropper('abc.jpg');
	// } 
});
*/
function cover_image_change(image,path,param){
	var formdata = new FormData();
	if(param == 'cover'){
		$image = $('#image');
	}else{
		// $image = $('#image_box');
		$image = $('#image');
	}
	jQuery.each($image[0].files, function(i, file) {
		formdata.append('image', file);
	});
	formdata.append('path', path);
	  $.ajax({
		type: "POST",
		url: "<?= base_url() ?>home/upload_image_for_cropper",  
		data: formdata, 
		cache: false,
		contentType: false,
		processData: false,					
		success: function(response){
			var result = jQuery.parseJSON(response);
			if(result.status == 'success'){
				$('#cropper_manager_box').show();
				open_cropper(result.image,path,param);
				$('#image_for_cropper').val(result.image);
				$('#path_for_cropper').val(path);
				$('#type_for_cropper').val(param);
			}else{
				$('#image_for_cropper').val('');
			}
		}
	});
}
function open_cropper(img,path,param){
	$('#loading').css('display','block');
	$('#cropper_manager_bg').css('display','block');
	$('#cropper_image').removeAttr('src');
	$('#cropper_image').attr('src','<?= IMGURL?>uploads/'+path+'/'+img);
	$('#image_select').val(img);
	var image = document.getElementById('cropper_image');
	var Cropper = window.Cropper;
	var console = window.console || { log: function () {} };
	var container = document.querySelector('.img-container');
	// var image = container.getElementsByTagName('img').item(0);
	// var download = document.getElementById('download');
	var download = '';
	var actions = document.getElementById('actions');
	var dataX = document.getElementById('dataX');
	var dataY = document.getElementById('dataY');
	var dataHeight = document.getElementById('dataHeight');
	var dataWidth = document.getElementById('dataWidth');
	var dataRotate = document.getElementById('dataRotate');
	var dataScaleX = document.getElementById('dataScaleX');
	var dataScaleY = document.getElementById('dataScaleY');
	var image_src = '<?= IMGURL?>uploads/'+path+'/'+img;
	if (img != '') {
		// $('#this_image').load(function() { **good image load function** });
		var image_load = new Image();
		image_load.src = image_src;
		image_load.onload = function () {
			$('#loading').css('display','none');
		}
	}
	if(param == 'cover'){
	var options = {
		aspectRatio: 815 / 315,
		viewMode: 2,
		minCropBoxWidth: 150,
		minCropBoxHeight: 100	,
		preview: '.img-preview',
		build: function () {
		  // console.log('build');
		},
		built: function () {
		  // console.log('built');
		},
		cropstart: function (e) {
		  // console.log('cropstart', e.detail.action);
		},
		cropmove: function (e) {
		  // console.log('cropmove', e.detail.action);
		},
		cropend: function (e) {
		  // console.log('cropend', e.detail.action);
		},
		crop: function (e) {
		  var data = e.detail;

		  // console.log('crop');
		  dataX.value = Math.round(data.x);
		  dataY.value = Math.round(data.y);
		  dataHeight.value = Math.round(data.height);
		  dataWidth.value = Math.round(data.width);
		  dataRotate.value = !isUndefined(data.rotate) ? data.rotate : '';
		  dataScaleX.value = !isUndefined(data.scaleX) ? data.scaleX : '';
		  dataScaleY.value = !isUndefined(data.scaleY) ? data.scaleY : '';
		},
		zoom: function (e) {
		  // console.log('zoom', e.detail.ratio);
		}
	  };
	}else{
	var options = {
		aspectRatio: 1 / 1,
		viewMode: 2,
		minCropBoxWidth: 100,
		minCropBoxHeight: 100	,
		preview: '.img-preview',
		build: function () {
		  // console.log('build');
		},
		built: function () {
		  // console.log('built');
		},
		cropstart: function (e) {
		  // console.log('cropstart', e.detail.action);
		},
		cropmove: function (e) {
		  // console.log('cropmove', e.detail.action);
		},
		cropend: function (e) {
		  // console.log('cropend', e.detail.action);
		},
		crop: function (e) {
		  var data = e.detail;

		  // console.log('crop');
		  dataX.value = Math.round(data.x);
		  dataY.value = Math.round(data.y);
		  dataHeight.value = Math.round(data.height);
		  dataWidth.value = Math.round(data.width);
		  dataRotate.value = !isUndefined(data.rotate) ? data.rotate : '';
		  dataScaleX.value = !isUndefined(data.scaleX) ? data.scaleX : '';
		  dataScaleY.value = !isUndefined(data.scaleY) ? data.scaleY : '';
		},
		zoom: function (e) {
		  // console.log('zoom', e.detail.ratio);
		}
	  };
	}
	var cropper = new Cropper(image, options);

  // Buttons
  if (!document.createElement('canvas').getContext) {
    $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
  }

  if (typeof document.createElement('cropper').style.transition === 'undefined') {
    $('button[data-method="rotate"]').prop('disabled', true);
    $('button[data-method="scale"]').prop('disabled', true);
  }


  // Download
  if (typeof download.download === 'undefined') {
    download.className += ' disabled';
  }


  // Options
  actions.querySelector('.docs-toggles').onclick = function (event) {
    var e = event || window.event;
    var target = e.target || e.srcElement;
    var cropBoxData;
    var canvasData;
    var isCheckbox;
    var isRadio;

    if (!cropper) {
      return;
    }

    if (target.tagName.toLowerCase() === 'span') {
      target = target.parentNode;
    }

    if (target.tagName.toLowerCase() === 'label') {
      target = target.getElementsByTagName('input').item(0);
    }

    isCheckbox = target.type === 'checkbox';
    isRadio = target.type === 'radio';

    if (isCheckbox || isRadio) {
      if (isCheckbox) {
        options[target.name] = target.checked;
        cropBoxData = cropper.getCropBoxData();
        canvasData = cropper.getCanvasData();

        options.built = function () {
          // console.log('built');
          cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
        };
      } else {
        options[target.name] = target.value;
        options.built = function () {
          // console.log('built');
        };
      }

      // Restart
      cropper.destroy();
      cropper = new Cropper(image, options);
    }
  };


  // Methods
  actions.querySelector('.docs-buttons').onclick = function (event) {
    var e = event || window.event;
    var target = e.target || e.srcElement;
    var result;
    var input;
    var data;

    if (!cropper) {
      return;
    }

    while (target !== this) {
      if (target.getAttribute('data-method')) {
        break;
      }

      target = target.parentNode;
    }

    if (target === this || target.disabled || target.className.indexOf('disabled') > -1) {
      return;
    }

    data = {
      method: target.getAttribute('data-method'),
      target: target.getAttribute('data-target'),
      option: target.getAttribute('data-option'),
      secondOption: target.getAttribute('data-second-option')
    };

    if (data.method) {
      if (typeof data.target !== 'undefined') {
        input = document.querySelector(data.target);

        if (!target.hasAttribute('data-option') && data.target && input) {
          try {
            data.option = JSON.parse(input.value);
          } catch (e) {
            // console.log(e.message);
          }
        }
      }

      if (data.method === 'getCroppedCanvas') {
        data.option = JSON.parse(data.option);
      }

      result = cropper[data.method](data.option, data.secondOption);

      switch (data.method) {
        case 'scaleX':
        case 'scaleY':
          target.setAttribute('data-option', -data.option);
          break;

        case 'getCroppedCanvas':
          if (result) {

            // Bootstrap's Modal
            $('#getCroppedCanvasModal').modal().find('.modal-body').html(result);

            if (!download.disabled) {
              download.href = result.toDataURL('image/jpeg');
            }
          }

          break;

        case 'destroy':
          cropper = null;
          break;
      }

      if (typeof result === 'object' && result !== cropper && input) {
        try {
          input.value = JSON.stringify(result);
        } catch (e) {
          // console.log(e.message);
        }
      }

    }
  };

  document.body.onkeydown = function (event) {
    var e = event || window.event;

    if (!cropper || this.scrollTop > 300) {
      return;
    }

    switch (e.keyCode) {
      case 37:
        preventDefault(e);
        cropper.move(-1, 0);
        break;

      case 38:
        preventDefault(e);
        cropper.move(0, -1);
        break;

      case 39:
        preventDefault(e);
        cropper.move(1, 0);
        break;

      case 40:
        preventDefault(e);
        cropper.move(0, 1);
        break;
    }
  };


  // Import image
  // var inputImage = document.getElementById('inputImage');
  var inputImage = '';
  var URL = window.URL || window.webkitURL;
  var blobURL;

  if (URL) {
    inputImage.onchange = function () {
      var files = this.files;
      var file;

      if (cropper && files && files.length) {
        file = files[0];

        if (/^image\/\w+/.test(file.type)) {
          blobURL = URL.createObjectURL(file);
          cropper.reset().replace(blobURL);
          inputImage.value = null;
        } else {
          window.alert('Please choose an image file.');
        }
      }
    };
  } else {
    inputImage.disabled = true;
    inputImage.parentNode.className += ' disabled';
  }
	if (img != '') {
		// $('#this_image').load(function() { **good image load function** });
		var image_load = new Image();
		image_load.src = image_src;
		image_load.onload = function () {
		setTimeout(function(){
			$('#setDragMode').trigger('click');
		}, 600);
		}
	}

}

function isUndefined(obj) {
	return typeof obj === 'undefined';
}
  function preventDefault(e) {
    if (e) {
      if (e.preventDefault) {
        e.preventDefault();
      } else {
        e.returnValue = false;
      }
    }
  }
$(document).on('click',"#close_cropper",function() {
	// Restart
	// var image = document.getElementById('cropper_image');
	// var cropper = new Cropper(image);
	$('#cropper_manager_box').hide();
	// cropper.destroy();
	var type = $('#type_for_cropper').val();
	$('#type_for_cropper').val('');
	$('#path_for_cropper').val('');
	$('#image_for_cropper').val('');
	if(type == 'cover'){
		$('#image').val('');
	}else{
		$('#image_box').val('');
	}
});
$(document).on('click',"#done_crop_new",function() {
	// alert();
	// var image_data = $('#image_fwd').val();
	$('#loading').css('display','block');
			var param = $('#type_for_cropper').val();
			var path = $('#path_for_cropper').val();
			var width = $("#dataWidth").val(); 
			var height = $("#dataHeight").val(); 
			var formdata = new FormData();

			formdata.append('type', param);
			formdata.append('path', path);
			formdata.append('x', $('#dataX').val());
			formdata.append('y', $('#dataY').val());
			formdata.append('w', $('#dataWidth').val());
			formdata.append('h', $('#dataHeight').val());
			formdata.append('img', $('#image_for_cropper').val());
			// console.log(formdata);
			// return false;
			if(width >= 320 && height >= 215){
				$.ajax({
					type: "POST",
					url: "<?= base_url() ?>home/crop_image",  
					data: formdata, 
	//                        cache: false,
					contentType: false,
					processData: false,					
					success: function(response){
						
						// console.log(response);
						var result = jQuery.parseJSON(response);
						if(result.status == "success"){
							if(param == 'cover'){
								$('#image_hidden').val(result.image);
								$('#cover_image').attr('src','<?= IMGURL?>uploads/'+path+'/'+result.image);
							}else{
								$('#image_box_hidden').val(result.image);
								$('#box_image').attr('src','<?= IMGURL?>uploads/'+path+'/'+result.image);
							}
							
							$('#close_cropper').trigger('click');
							// $('#cropper_manager_box').hide();
						}else{
							alert('Soemthing went wrong');
						}
							// var d = new Date();
							// $("#c_img_tag").attr("src", '<?php echo base_url(); ?>uploads/user_image/'+obj.msg+'?'+d.getTime());
							// $("#c_img_tag").css('display','block');
							// $("#image_fwd").val($('#image_select').val());
							 // $('#close_cropper').trigger('click');
							 // $('#photo_manager_close').trigger('click');
							 // $('#loading').css('display','none');
							 // $("#left_menu").animate({ scrollTop: $('#left_menu').prop("scrollHeight")}, 1000);
						// }else {
							// $("#error_container").html(obj.msg);
							// $("#error_container").show().delay(4000).fadeOut();
							 // $('#loading').css('display','none');
						// }
					}
				});
			}else{
				alert('Image is too small');
				$('#loading').css('display','none');
			}
});
</script>