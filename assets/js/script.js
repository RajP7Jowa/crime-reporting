$(document).ready(function(){
		/****** Show and display forms *********/
			$("#report_crime_display").show();
			$('#f_vehicle_form_display').hide();
			$('#m_vehicle_form_display').hide();
			$('#p_found_form_display').hide();
			$('#m_person_form_display').hide();
			$('#item_display').hide();
			
		$("#apply").submit(function(e){
			var valid = $("#apply").valid();
				if(valid){
					var id = $('#national_id').val();
					var type = $('#app_type').val();
					
					var data = 'national_id='+id+'&type='+type;
					
					
					$.post('php/dataHandler.php',data,function message(message){
					$('#apply').each(function(){
    					this.reset();
					});
					
					$('#application_alert').html('<div>'+ message +'</div>');
										
			    });
			}
			
			return false;
		});
		
		$("#items").submit(function(e){
			var data = $("#items").serialize();
			
			
			var valid = $("#lost_found").valid();
				if(valid){
					$.post('php/dataHandler.php',data,function message(message){
					$('#items').each(function(){
    					this.reset();
					});
					
					$('#crime').html('<div>'+ message +'</div>');
										
			    });
			}
			
			return false;
		});
		
		$("#report_crime").submit(function(e){
			var data = $("#report_crime").serialize();
			
			var valid = $("#report_crime").valid();
				if(valid){
					$.post('php/dataHandler.php',data,function message(message){
					$('#report_crime').each(function(){
    					this.reset();
					});
					
					$('#crime2').html('<p class="bg-success" style="padding:8px;">'+ message +'</p>');
										
			    });
			}
			
			return false;
		});
		
		
		$("#side_menu > li > a").on("click", function(e){
	    if(!$(this).hasClass("active")) {
	        	$("#side_menu li ul").slideUp(350);
	       	    $("#side_menu li a").removeClass("active");
	            $(this).next("ul").slideDown(350);
	            $(this).addClass("active");
	    }else if($(this).hasClass("active")){
	        $(this).removeClass("active");
	        $(this).next("ul").slideUp(350);
	     }
	  });
	  
	  /***** Handle clicks in reports******/
		$(".collapsible a").on("click",function(e){
			e.preventDefault();
		});
		
		$("#r_crime a").on("click",function(e){
			e.preventDefault();
			$("#report_crime_display").show();
			$('#f_vehicle_form_display').hide();
			$('#m_vehicle_form_display').hide();
			$('#p_found_form_display').hide();
			$('#m_person_form_display').hide();
			$('#item_display').hide();
		});
		
		$("a#person_missing").on("click",function(e){
			e.preventDefault();
			
			$("#report_crime_display").hide();
			$('#f_vehicle_form_display').hide();
			$('#m_vehicle_form_display').hide();
			$('#p_found_form_display').hide();
			$('#m_person_form_display').show();
			$('#item_display').hide();
		});
		
		$("a#person_found").on("click",function(e){
			e.preventDefault();
			$("#report_crime_display").hide();
			$('#f_vehicle_form_display').hide();
			$('#m_vehicle_form_display').hide();
			$('#p_found_form_display').show();
			$('#m_person_form_display').hide();
			$('#item_display').hide();
		});
		
		$("a#vehicle_missing").on("click",function(e){
			e.preventDefault();
			
			$("#report_crime_display").hide();
			$('#f_vehicle_form_display').hide();
			$('#m_vehicle_form_display').show();
			$('#p_found_form_display').hide();
			$('#m_person_form_display').hide();
			$('#item_display').hide();
		});
		
		$("a#vehicle_found").on("click",function(e){
			e.preventDefault();
			
			$("#report_crime_display").hide();
			$('#f_vehicle_form_display').show();
			$('#m_vehicle_form_display').hide();
			$('#p_found_form_display').hide();
			$('#m_person_form_display').hide();
			$('#item_display').hide();
		});
		
		$("#lost-found a").on("click",function(e){
			e.preventDefault();
			
			$("#report_crime_display").hide();
			$('#f_vehicle_form_display').hide();
			$('#m_vehicle_form_display').hide();
			$('#p_found_form_display').hide();
			$('#m_person_form_display').hide();
			$('#item_display').show();
		});
		
		/*
		$('#submit_login').click(function(e){
			e.preventDefault();
			
			alert("Clicked");
			$('#username_error').hide();
			
			var errors = new Array();
			
			
			var username = $('#username').val();
			var password = $('#password').val();
			
			if(!name.match("^[A-Za-z]{1,20}, [A-Za-z]{1,20}, [A-Za-z]{1,20}") || username.length < 2){
				errors.push("Username");
			}
			else if(password == ''){
				errors.push("password");
			}
			
			var present = $.inArray('Username',errors) < 0;
			var present2 = $.inArray('password',errors) < 0;
			
			if(present >= 0){
				$('#username_error').html("Please enter username correctly");
				$('#username_error').show();
			}
			else if(present2 >= 0){
				$('#password_error').html("Password required");
				$('#username_error').show();
			}
			
			if(errors.length == 0){
				alert("This works");
			}
			
			
			
		});*/

});
