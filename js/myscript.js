$(document).ready(function(){
	$requestRunning = false;
	var WHeight = $(window).height();
	var WWidth = $(window).width();

	var top = WHeight/2;

	$(document).on('submit', '#AddMaterial', function(e){
		e.preventDefault();
		$.ajax({
			url: "add_material_action.php",
			type: 'POST',
			data: new FormData(this),
			contentType: false,
			processData: false,
			'beforeSend':function(){
				$requestRunning=true;
				$('.container').append('<div class = "loading-wrapper"></div>');
			},
			'success':function(data){
				$requestRunning=false;
				function alertMessage(){
					$('.loading-wrapper').remove();
					$('.container').after('<div class="message-box">'+data+'</div>');
					var mbHeight = $('.message-box').height();
					var mbWidth = $('.message-box').width();

					var topPos = (WHeight/2)-(mbHeight/2);
					var leftPos = (WWidth/2)-(mbWidth/2);
					$('.message-box').css({
						top: topPos,
						left: leftPos
					});
				}
				function removeMessage(){
					$('.message-box').remove();
					$('#Pname').val('');
					$('#price').val('');
					$('#quantity').val('');
					$('#PImage').val('');
					// $('.display_page').html('');
					// $('.display_page').load('file_uploader.php');
				}
				setTimeout(alertMessage, 5000);
				setTimeout(removeMessage, 10000);
			}
		});
	}); //endsubmit addmaterial


	$(document).on('submit', '#AddManager', function(e){
		e.preventDefault();
		$.ajax({
			url: 'add_manager.php',
			type: 'POST',
			data: new FormData(this),
			contentType: false,
			processData: false,
			'beforeSend':function(){
				$requestRunning=true;
				$('.dist-form-wrapper').append('<div class = "linear-loading"></div>');
			},
			'success':function(data){
				$requestRunning=false;
				// alert(data);
				function alertMessage(){
					$('.linear-loading').remove();
					$('.dist-form-wrapper').append('<div class="under-message">'+data+'</div>');
					$('#DistCap').val('');
					$('#DistUser').val('');
					$('#DistPass').val('');
					$('#DistCode').val('');
				}
				function removeMessage(){
					$('.under-message').remove();
					$('.dist-list-wrapper').html('');
					$('.dist-list-wrapper').load('dist_list.php');
				}
				setTimeout(alertMessage, 2000);
				setTimeout(removeMessage, 6000);
			}
		}); //end ajax
	});//end addmanager

	// load district
	$('.dist-list-wrapper').load('dist_list.php');

	// MOVE TO district list PAGE
	$(document).on('click', '.move-back', function(e){
		e.preventDefault();
		$('.dist-list-wrapper').html('');
		$('.dist-list-wrapper').load('dist_list.php');
	});

	// View District Manager Info
	$(document).on('click', '.dist-info', function(e){
		e.preventDefault();
		$this = $(this);
		var id = $this.attr('id').split('_');
			id = id[1];
		var url = $this.attr('href');
		$.ajax({
			type:'GET',
			url: url,
			dataType:'json',
			data: {
				id: id
			},
			'beforeSend': function(){
				$('.dist-list-wrapper').html('');
			},
			'success': function(data){
				$('.dist-list-wrapper').html(data.content);
			}
		});
	}); //end district manager info

	// Edit District Manager Info
	$(document).on('click', '.edit-dist', function(e){
		e.preventDefault();
		$this = $(this);
		var id = $this.attr('id').split('_');
			id = id[1];
		var url = $this.attr('href');
		$.ajax({
			type:'GET',
			url: url,
			dataType:'json',
			data: {
				id: id
			},
			'beforeSend': function(){
				$('.dist-list-wrapper').html('');
			},
			'success': function(data){
				$('.dist-list-wrapper').html(data.content);
			}
		});
	}); //end district manager info

	//show save button 
	$(document).on('focus', '.edit-field', function(){
		$('.edit-btn').css('display', 'inline-block');
	});//end show button

	//EDIT DISTRICT
	$(document).on('submit', '#editDist', function(e){
		e.preventDefault();
		$.ajax({
			url: 'edit_dist_action.php',
			type: 'POST',
			data: new FormData(this),
			contentType: false,
			processData: false,
			'beforeSend':function(){
				$requestRunning=true;
				$('.edit-form').append('<div class = "linear-loading"></div>');
			},
			'success':function(data){
				$requestRunning=false;
				// alert(data);
				function alertMessage(){
					$('.linear-loading').remove();
					$('.edit-form').append('<div class="under-message">'+data+'</div>');
				}
				function removeMessage(){
					$('.under-message').remove();
				}
				setTimeout(alertMessage, 2000);
				setTimeout(removeMessage, 6000);
			}
		}); //end ajax
	});//end edit district

	//del Dist
	$(document).on('click', '.del-dist', function(e){
		e.preventDefault();
		$this=$(this);
		var id = $this.attr('id').split('_');
			id = id[1];
		var url = $this.attr('href');

		$.ajax({
			type: 'POST',
			url: url,
			data: {
				id: id
			},
			'beforeSend': function(){
				$('.dist-list-wrapper').append('<div class = "linear-loading"></div>');
			},
			'success': function(){
				function alertMessage(){
					$('.linear-loading').remove();
					$('.dist-list-wrapper').load('dist_list.php');
					$('.dist-list-wrapper').append('<div class="under-message">'+data+'</div>');
				}
				function remotveMessage(){
							$('.under-messaege').remove();
				}
				setTimeout(alertMessage, 2000);
				setTimeout(removeMessage, 6000);
			}

		});
	}); //end del-dist

// ----	allocate or object
	$(document).on('submit','#allocateForm', function(e){
		e.preventDefault();
		var res=$('#alloc').val();
		$.ajax({
			type: 'POST',
			url: 'allocation_process.php',
			data: new FormData(this),
			contentType: false,
			processData: false,
			'beforeSend':function(){
				$requestRunning=true;
				if(res===2){
					$('.alloc-wrapper').html('');
				}
				$('.alloc-wrapper').append('<div class = "linear-loading"></div>');
			},
			'success':function(data){
				$requestRunning=false;
				// alert(data);
				function alertMessage(){
					$('.linear-loading').remove();
					$('.alloc-wrapper').append('<div class="under-message">'+data+'</div>');
				}
				function removeMessage(){
					$('.under-message').remove();
				}
				setTimeout(alertMessage, 2000);
				setTimeout(removeMessage, 10000);
			}
		});
	});
	//DISTRICT MANAGER------------------------------------------------------------------
	$(document).on('submit', '#UserLogin', function(e){
		if($requestRunning){
			return;
		}
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'manager_login_process.php',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			processData: false,
			'beforeSend': function(){
				requestRunning=true;
				$('.login-box').append('<div class="linear-loading"></div>');
			},
			'success': function(data){
				requestRunning=false;
				function hideLoader(){
					$('.linear-loading').remove();
				}
				function reDirect(){
					// var obj = JSON.parse(data);
					if(data.indicator=='TRUE'){
					window.location.href=data.message;
					}else{
						alert(data.message);
					}
				}
				setTimeout(hideLoader, 4000);
				setTimeout(reDirect, 4100);

			}

		});
	});

	// load request
	$(document).on('click', '.request', function(e){
		e.preventDefault();
		$this=$(this);
		var id = $this.attr('id').split('_');
			id = id['1'];
		m_id = id['2'];
		var url = $this.attr('href');
		$.ajax({
			type: 'GET',
			url: url,
			dataType: 'json',
			// contentType: false,
			// processData: false,
			data: {
				id:id,
				m_id:m_id
			},
			'beforeSend': function(){
				$('.container').html('');
			},
			'success': function(data){
				$('.container').append(data.content);
			}
		});
	});

	//Place Request
	$(document).on('submit', '#requestForm', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'request_process.php',
			data: new FormData(this),
			contentType: false,
			processData: false,
			'beforeSend':function(){
				$requestRunning=true;
				$('.request-form').append('<div class = "linear-loading"></div>');
			},
			'success':function(data){
				$requestRunning=false;
				// alert(data);
				function alertMessage(){
					$('.linear-loading').remove();
					$('.request-form').append('<div class="under-message">'+data+'</div>');
				}
				function removeMessage(){
					$('.under-message').remove();
				}
				setTimeout(alertMessage, 2000);
				setTimeout(removeMessage, 10000);
			}
		});
	});

//-------load action page
	$(document).on('click', '.action-page', function(e){
		e.preventDefault();
		$this = $(this);
		var id = $this.attr('id').split('_');
			id = id['1'];
		var url = $this.attr('href');
		$.ajax({
			type: 'GET',
			url: url,
			dataType: 'json',
			data: {
				id:id
			},
			'beforeSend': function(){
				$('.container').html('');
			},
			'success': function(data){
				$('.container').append(data.content);
			}
		});
	});

// admin reg.

	$(document).on('submit', '#adminRegistration', function(e){
		if($requestRunning){
			return;
		}
		e.preventDefault();
			$.ajax({
				type:'POST',
				url:'admin_registration.php',
				data: new FormData(this),
				contentType: false,
				processData: false,
				// 'beforeSend': function(){

				// },
				'success': function(data){
					$requestRunning=false;
					window.location.href=data;
				}
			});
	});
// admin login-------------------------------------------------
	$(document).on('submit', '#adminLogin', function(e){
		if($requestRunning){
			return;
		}
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'admin_login.php',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			processData: false,
			'beforeSend': function(){
				requestRunning=true;
				$('.login-box').append('<div class="linear-loading"></div>');
			},
			'success': function(data){
				requestRunning=false;
				function hideLoader(){
					$('.linear-loading').remove();
				}
				function reDirect(){
					// var obj = JSON.parse(data);
					if(data.indicator=='TRUE'){
					window.location.href=data.message;
					}else{
						alert(data.message);
					}
				}
				setTimeout(hideLoader, 4000);
				setTimeout(reDirect, 4100);

			}

		});
	});


	$(document).on('click', '.update-stats', function(e){
		e.preventDefault();
		$this=$(this);
		var id = $this.attr('id').split('_');
			id = id['1'];
		var url = $this.attr('href');
		$.ajax({
			type: 'GET',
			url: url,
			// dataType: 'json',
			data: {
				id:id
			},
			'success': function(){
				$('.container').html('');
				window.location.href='request_history.php?id='+id;
			}
		});
	});

	$(document).on('click', '.edit-mat', function(e){
		e.preventDefault();
		$this=$(this);
		var id = $this.attr('id').split('_');
			id = id['1'];
		var url = $this.attr('href');
		$.ajax({
			type: 'GET',
			url: url,
			data: {
				id: id,
			},
			'beforeSend': function(){
				$('.container').html('');
			},
			'success':function(data){
				$('.container').append(data);
				// $('.container').load('edit_material.php');
			}
		});
	});

	$(document).on('submit', '#editMat', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'edit_mat_process.php',
			data: new FormData(this),
			processData: false,
			contentType: false,
			'success': function(data){
				// $('.container').load('edit_material.php');
				$('.container').append(data);
			}
		});
	});


	// $(document).on('submit', '#editMat', function(e){
	// 	e.preventDefault();
	// 	$.ajax({
	// 		url: 'edit_mat_process.php',
	// 		type: 'POST',
	// 		data: new FormData(this),
	// 		contentType: false,
	// 		processData: false,
	// 		'beforeSend':function(){
	// 			$requestRunning=true;
	// 			$('.edit-form').append('<div class = "linear-loading"></div>');
	// 		},
	// 		'success':function(data){
	// 			$requestRunning=false;
	// 			// alert(data);
	// 			function alertMessage(){
	// 				$('.linear-loading').remove();
	// 				$('.edit-form').append('<div class="under-message">'+data+'</div>');
	// 			}
	// 			function removeMessage(){
	// 				$('.under-message').remove();
	// 			}
	// 			setTimeout(alertMessage, 2000);
	// 			setTimeout(removeMessage, 6000);
	// 		}
	// 	}); //end ajax
	// });//

}); //end document ready
	