$(document).ready(function(){
                
                $('.action').submit(function(e){
                        e.preventDefault();

                    $.ajax({
                        type: "POST",
                        url: "./forgot_password/aksi_forgot",
                        data:new FormData(this),
                        cache: false,
                        dataType:"json",
                        processData: false,
                        contentType: false,
                        beforeSend: function(){
                            $("#loadMe").modal({
                                  backdrop: "static", //remove ability to close modal with click
                                  keyboard: false, //remove option to close with keyboard
                                  show: true //Display loader!
                                });
                           },
                        success: function(result){
                                if (result.status=='failed') {
                                    sweetAlert({
                                        title:'Error!',
                                        text: 'Forgot Failed, E-mail is not registered!',
                                        type:'error'
                                    },function(isConfirm){
                                        window.location.href = "./forgot_password";
                                    });
                                }

                                if (result.status=='success') {
                                    sweetAlert({
                                        title:'Success',
                                        text: 'Please check email to reset password!',
                                        type:'success'
                                    },function(isConfirm){
                                        window.location.href = "./forgot_password";
                                    });
                                }
                               
                        },
                    });
                }); 


         });    