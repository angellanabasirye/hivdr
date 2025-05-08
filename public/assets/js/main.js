/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
$(function () {

    $('#bootstrap-table').on('click', '.facilityemail', function () {
        var facilityid = $(this).attr('data-id');
        var url = $(this).data('url');
        $('#manage_contact').modal('show');
        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                console.log(response.facility.email);
                $('.contactemail').val(response.facility.email);
            },
            error: function (data) {
                console.log(data);
            }

        });
    });


    $('#bootstrap-table').on('click', '.batch_defer', function () {
//        var vlresultid = $(this).attr('data-id');
        //   console.log($(this).attr('data-id'));
//
        var url = $(this).data('url');

        $("#defer-refer-sample").val($(this).attr('data-id'));
        $("#vl_result_id").val($(this).attr('data-id'));
        $("#email").val($(this).attr('data-id'));
        $('#batchdefer').modal('show');
//        $.ajax({
//            type: "GET",
//            url: url,
//            success: function (response) {
//                console.log(response);
//            },
//            error: function (data) {
//                console.log(data);
//            }
//
//        });
    });

    // Edit Facility contact  Validation
    $('#edit-facility-contact').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            email: {
                required: "Please enter a email address",
                email: "Please enter a valid email address"
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    $('#defer-refer-sample').validate({
        rules:
                {
                    defer_refer: {required: true}
                },
        messages:
                {
                    defer_refer:
                            {
                                required: "Please select action to perform<br/>"
                            }
                },
        errorElement: "code",
        errorPlacement: function (error, element)
        {
            if (element.is(":radio"))
            {
                error.appendTo(element.parents('.container'));
            } else
            { // This is the default behavior 
                error.insertAfter(element);
            }
        }
    });


    $('#batchdefer').on('hidden.bs.modal', function () {
        $("#defer-refer-sample").trigger("reset");
        $("#defer_refer-error").remove();
    });
//    $("#refer_save").on('click', function () {
//        // var url = $(this).data('url');
//
//        $.ajax({
//            type: "POST",
//            url: 'deferRefer',
//            data: $('#defer-refer-sample').serialize(),
//            success: function (response) {
//                //showNotification
//                console.log(response);
//            },
//            error: function (data) {
//                console.log(data);
//            }
//
//        });
//    });

    
    var data = {
      labels: ['Eligible for DRT', 'Referred for DRT', 'Received results', 'Amplified', 'Reviewed', 'Maintained', 'Switched', 'Substituted', 'Started on ART'],
      series: [
        [count_eligible_samples, count_referred_samples, count_received_results, count_amplified_results, count_cases_discussed, count_cases_maintained, count_cases_switched, count_cases_substituted, count_started_art]

      ]
    };

    var options = {
        seriesBarDistance: 10,
        axisX: {
            offset: 30,
            showGrid: false,
        },
        axisY: {
            scaleMinSpace: 25,
            offset: 50,
        },
        height: "400px",
        plugins: [
          Chartist.plugins.ctBarLabels()
        ]
    };

    var responsiveOptions = [
      ['screen and (max-width: 640px)', {
        seriesBarDistance: 5,
        axisX: {
          labelInterpolationFnc: function (value) {
            return value[0];
          }
        }
      }]
    ];

    Chartist.Bar('#chartActivity', data, options, responsiveOptions).on('draw', function(data) {
      if(data.type === 'bar') {
        data.element.attr({
          style: 'stroke-width: 50px'
        }); 
      }
    });

    

});





