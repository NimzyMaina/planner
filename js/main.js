/**
 * Created by nimzy on 1/21/2016.
 */

// add user validation

$(document).ready(function() {
    $('#addUserForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The First Name is required'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The Last Name is required'
                    }
                }
            },
            phone: {
                threshold: 7,
                validators: {
                    phone: {
                        message: 'The input is not a valid KE phone number',
                        country: 'SK'
                    },
                    remote: {
                        message: 'The phone number is already registered',
                        url: ajax_url,
                        data: {
                            type: 'phone'
                        },
                        type: 'POST',
                        delay: 4000
                    }
                }
            },
            email: {
                threshold: 5,
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    },
                    remote: {
                        message: 'The email is not available',
                        url: ajax_url,
                        data: {
                            type: 'email'
                        },
                        type: 'POST',
                        delay: 4000
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    different: {
                        field: 'email',
                        message: 'The password cannot be the same as email'
                    },
                    stringLength: {
                        min: 6,
                        max: 12,
                        message: 'The password must be more than 6 and less than 12 characters long'
                    }
                }
            },
            confirm: {
                validators: {
                    notEmpty: {
                        message: 'The re-type password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            role: {
                icon: 'false',
                validators: {
                    notEmpty: {
                        message: 'You have to choose the User role'
                    }
                }
            }
        }
    });
});


// instanciate datatables
$("#example1").DataTable();
$("#example2").DataTable();
$("#items").DataTable();
//$("#imgTable").DataTable();
//$("#imgTable").DataTable({
//    "aoColumnDefs": [{
//        "aTargets" : [0],
//        "mRender": function ( image, type, full )  {
//            var a;
//            a = '<img width="200" height="200" class="img-responsive2" src="'+base_url+'/uploads/items/'+image+'">';
//            return  a;
//        }
//    }]
//});

//edit on user datatable

$(function(){
    //acknowledgement message
    var message_status = $("#status");
    $("#example1 td[contenteditable=true]").blur(function(){
        var field_userid = $(this).attr("id") ;
        var value = $(this).text() ;
        $.post( update_user ,field_userid + "=" + encodeURIComponent(value),function(data){
            if(data != '')
            {
                swal({   title: 'Success!',   text: data,   timer: 2000 });
            }
        });
    });
});

//edit on vendor datatable
$(function(){
    //acknowledgement message
    var message_status = $("#status");
    $("#example2 td[contenteditable=true]").blur(function(){
        var field_userid = $(this).attr("id") ;
        var value = $(this).text() ;
        $.post( update_vendor ,field_userid + "=" + encodeURIComponent(value),function(data){
            if(data != '')
            {
                swal({   title: 'Success!',   text: data,   timer: 2000 });
            }
        });
    });
});


//icheck box

$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});


// google calender


$(document).ready(function() {

    $('#calendar').fullCalendar({

        // THIS KEY WON'T WORK IN PRODUCTION!!!
        // To make your own Google API key, follow the directions here:
        // http://fullcalendar.io/docs/google_calendar/
        googleCalendarApiKey: calender_api_key,

        // US Holidays
        events: google_calender_id,

        eventClick: function(event) {
            // opens events in a popup window
            window.open(event.url, 'gcalevent', 'width=700,height=600');
            return false;
        },

        loading: function(bool) {
            $('#loading').toggle(bool);
        }

    });

});

//add vendor validation

$(document).ready(function() {
    $('#addVendorForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Vendor Name is required'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'The Vendor Phone is required'
                    }
                }
            },
            email: {
                threshold: 5,
                validators: {
                    notEmpty: {
                        message: 'The Vendor email address is required'
                    },
                    emailAddress: {
                        message: 'The Vendor input is not a valid email address'
                    },
                    remote: {
                        message: 'The  email is not available',
                        url: ajax_url,
                        data: {
                            type: 'vendor_email'
                        },
                        type: 'POST',
                        delay: 4000
                    }
                }
            },
            website: {
                validators: {
                    uri: {
                        message: 'The input is not a valid URL'
                    }
                }
            },
            details: {
                //icon: 'false',
                validators: {
                    notEmpty: {
                        message: 'You have to provide vendor Details'
                    }
                }
            }
        }
    });
});



//add vendor item validation

$(document).ready(function() {
    $('#addVendorItemForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Item Name is required'
                    }
                }
            },
            vendor_id: {
                validators: {
                    notEmpty: {
                        message: 'The Vendor ID is required'
                    }
                }
            },
            category_id: {
                validators: {
                    notEmpty: {
                        message: 'The Category ID is required'
                    }
                }
            },
            article: {
                validators: {
                    notEmpty: {
                        message: 'The Item Article is required'
                    }
                }
            },
            'images[]': {
                validators: {
                    file: {
                        extension: 'jpeg jpg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 1024*1024,
                        message: 'Please choose a JPEG/JPG or a PNG file with a size less than 1MB.'
                    },
                    file: {
                        maxFiles: 5,
                        message: 'Oops!! Maximum number of images is 5'
                    }
                }
            }
        }
    });
});


//delete script


$(document).on('click', '.delete-object', function(){

    var id = $(this).attr('delete-id');
    var del = $(this).attr('delete-type');

    swal({
            title: 'Are you Sure?',
            text: 'You will not be able to recover this Item!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel please!',
            confirmButtonClass: 'confirm-class',
            cancelButtonClass: 'cancel-class',
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if(isConfirm) {
                //ajax
                $.post(ajax_url, {
                    object_id: id,
                    type : del
                }, function(data){
                    swal('Deleted!',
                        'Your Item has been Deleted.',
                        'success');
                    location.reload();
                }).fail(function() {
                    swal('Unable to delete.');
                });
            }else{
                swal(
                    'Cancelled',
                    'Your Item Is Safe :)',
                    'error'
                );
            }

        });

    return false;
});


function myfun(){
    swal('You clicked the span');
}

$(document).on('click', '.toog', function(){
    var id = $(this).attr('data-id');
    var status = $(this).attr('data-status');
    var type = $(this).attr('data-type');

    $.post(ajax_url, {
        object_id: id,
        type : type,
        status : status
    }, function(data){
        swal('Changed!',
            'The Item Status has been changed.',
            'success');
        location.reload();
    }).fail(function() {
        swal('Unable to Change.');
    });
    return false;
});