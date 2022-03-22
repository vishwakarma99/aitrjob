$('#facebookLogin').click(function(event){
	firebase
	  .auth()
	  .signInWithPopup(facebookProvider)
	  .then((result) => {
	    /** @type {firebase.auth.OAuthCredential} */
	    var credential = result.credential;

	    // The signed-in user info.
	    var user = result.user;

	    console.log(user);
	    console.log(credential);

	    // user.providerData[0].append('authType', 'facebook');
        
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

	    // This gives you a Facebook Access Token. You can use it to access the Facebook API.
	    var accessToken = credential.accessToken;

	    // ...
	  })
	  .catch((error) => {
	    // Handle Errors here.
	    var errorCode = error.code;
	    var errorMessage = error.message;
	    // The email of the user's account used.
	    var email = error.email;
	    // The firebase.auth.AuthCredential type that was used.
	    var credential = error.credential;
	    console.log(error)

	    // ...
	  });

})

