$(document).ready(function(){
                
                $('.action').submit(function(e){
                        e.preventDefault();

                    $.ajax({
                        type: "POST",
                        url: "./login/aksi_login",
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
                                        text: 'Login Failed!',
                                        type:'error'
                                    },function(isConfirm){
                                        window.location.href = "./login";
                                    });
                                }

                                if (result.status=='blokir') {
                                    sweetAlert({
                                        title:'Error!',
                                        text: 'User access denied!',
                                        type:'error'
                                    },function(isConfirm){
                                        window.location.href = "./login";
                                    });
                                }


                                if (result.status=='success') {
                                    sweetAlert({
                                        title:'Success!',
                                        text: 'Login is successful!',
                                        type:'success',
                                    },function(isConfirm){
                                        if (result.access=="Administrator") {
                                            window.location.href = "./adm/dashboard";
                                        } else if (result.access=="Depo Admin") {
                                            window.location.href = "./depo/dashboard";
                                        } else if (result.access=="ASM") {
                                            window.location.href = "./asm/dashboard";
                                        } else if (result.access=="HO Distributor") {
                                            window.location.href = "./ho_distributor/dashboard";
                                        } else if (result.access=="HO BAT") {
                                            window.location.href = "./ho_bat/dashboard";
                                        }
                                        
                                    });
                                   
                                }
                        },
                    });
                }); 


         });    