$('#emailSubmit').click(function(event){
    $('.field_error').html('');
    email = $('#email').val();
    password = $('#password').val();
    if(email == ''){
        $('#email_error').html('Please enter email Id.');
        return false;
    }
    
    if(password == ''){
        $('#password_error').html('Please enter password');
        return false;
    }
    
    firebase.auth().createUserWithEmailAndPassword(email, password).then(function(user) {
        firebase.auth().signInWithEmailAndPassword(email, password).then((userCredential) => {
    	    /** @type {firebase.auth.OAuthCredential} */
    	    var credential = result.credential;
    
    	    // The signed-in user info.
    	    const user = userCredential.user;
            
    	    $.ajax({
                url: App_URL+"/register",
                type : "post",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                dataType : "json",
                data : {
                        uid: user.uid,
                        role: 2,
                        mobile_number: user.providerData[0]['phoneNumber'],
                        auth_type: 'facebook',
                        email: user.providerData[0]['email']
                    },
                success : function(data){
                    if(data.status == "success"){
                      window.location.href = response.redirect;
                    }else{
                      location.reload();
                    }
        
                },
                error : function (error){
                    location.reload();
                } 
            })
    	})
    	.catch(function(error) {
             $('#password_error').html(errorMessage);
        });
    }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        
        if(errorCode == 'auth/email-already-in-use'){
            
             firebase.auth().signInWithEmailAndPassword(email, password).then((userCredential) => {
        
        	    // The signed-in user info.
        	    const user = userCredential.user;
        
        	    $.ajax({
                    url: App_URL+"/register",
                    type : "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    dataType : "json",
                    data : {
                            uid: user.uid,
                            role: 1,
                            mobile_number: user.providerData[0]['phoneNumber'],
                            auth_type: 'email',
                            email: user.providerData[0]['email']
                        },
                    success : function(response){
                        if(response.redirect != ""){
                            window.location.href = response.redirect;
                        }else{
                          location.reload();
                        }
            
                    },
                    error : function (error){
                        location.reload();
                    } 
                })
        	})
        	.catch(function(error) {
                var errorCode = error.code;
                var errorMessage = error.message;
                if(errorCode == 'auth/wrong-password'){
                    $('#password_error').html('The password is invalid');    
                }else if(errorCode == 'auth/too-many-requests'){
                    $('#password_error').html('Access to this account has been temporarily disabled due to many failed login attempts.<br> Try after sometime');    
                }else{
                    $('#password_error').html(errorMessage);
                }
                
            });
        }else{
            console.log(errorMessage);
            $('#password_error').html(errorMessage);
        }
    });
})




