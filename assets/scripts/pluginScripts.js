/** Get File Location **/
function pluginURL(){
	var plugin_url = pluginScript.pluginsUrl;
	return plugin_url;
}

$(function(){
	$("#loader").hide();
	$("#overlay").hide();
    $('#product-authenticator').bind('submit', function(evt){
    	evt.preventDefault();
	    var FWCode = $("#authenticateProductCode").val().trim();

	    if(FWCode == ""){

    		alert("EMPTY");

    	}else{	    
    		$("#overlay").show();
    		$("#loader").show();
	    	var Lang = 'en-gb';	    	
	    	var url = 'https://ck.fw-12365.com/ashx/SecurityQueryApi.ashx?Key=tc201805051108&FWCode='+FWCode+'&Lang='+Lang;

	        jQuery.ajax({
	            headers: { "Accept": "application/json"},
	            type: 'GET',
	            url: url,
	            crossDomain: true,
	            beforeSend: function(xhr){
	                xhr.withCredentials = true;
	          	},
	            success: function(data, textStatus, request){
	            	var json = $.parseJSON(data);
	            	if( json.State == 1 ){
	                	$.confirm({
						    title: '<img src="'+ pluginURL() +'assets/images/Successful.png"> <span id="authenticate-success">Authentication Successful!</span>',
						    content: 
						    	'Its a relief that your Bidi Stick is authentic. Get ready for a unique vaping experience. ' + 
						    	'</br>Number : ' + json.BarCode + '</b></br></br><center><img src="https://ck.fw-12365.com/' + json.BarcodeImg + '"></center>',
						    buttons: {
						        Ok: function () {
						            // location.reload();
						            $("#overlay").hide();
	                				$("#loader").hide();
						        }
						    }
						});
	                }else if( json.State == 2 ){
	                	$("#overlay").hide();
	                	$("#loader").hide();
	                	$.confirm({
						    title: '<span id="authenticate-warning"><img src="'+ pluginURL() +'assets/images/warning.png"> <span id="authenticate-warning">This Code Has a Possible Duplicate</span></span>',
						    content:
						    'This security code is valid but has been inputted <b>' + json.Times + '</b> time(s). ' +
						    'The last input attempt was <b>' + json.FirstDate + '</b></br>' +
						    'Try again or <a href="https://www.bidivapor.com/authenticator">report</a> this product to us. We can help you validate it.' +
						    '</br>Number : <b>' + json.BarCode + '</b></br></br><center><img src="https://ck.fw-12365.com/'+json.BarcodeImg+'"></center>',
						    buttons: {
						        Ok: function () {
						            // location.reload();
						            $("#overlay").hide();
	                				$("#loader").hide();
						        }
						    }
						});
	                }else{
	                	$("#overlay").hide();
	                	$("#loader").hide();
	                	$.confirm({
						    title: '<img src="'+ pluginURL() +'assets/images/Code Error.png"> <span id="authenticate-error">Oops! Code Error.</span>',
						    content: 
						    'The security code you entered does not exist.' + 
						    'We are sorry, but it seems this product is Fake. Kindly <a href="https://bidivapor.com/contact-us/">report</a> our counterfeit product immediately!',
						    buttons: {
						        Ok: function () {
						            // location.reload();
						            $("#overlay").hide();
	                				$("#loader").hide();
						        }
						    }
						});
	                }
	            }
			 });
	        
    	}
        
    });
    
});

// https://ck.fw-12365.com/Files/BarCodeImg/20204209124223960.jpg