/*
$(window).load(function() {
    $('.c').select2();
});

*/

new WOW().init();
wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animated', // default
    offset: 0, // default
    mobile: true, // default
    live: true // default
})
wow.init();
// GoBack
function goBack() {
    window.history.back();
}
// Password

$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$(function() {
    $("#addVehicle").click(function() {
        $("#vehicleFieldsWrapper .vehicleFields").clone().appendTo($("#vehicleFieldsWrapper "));

    });

});




$(".progress-bar").animate({
    width: "70%"
}, 2500);

// Hide
$(function() {
    $('.singerHdim').hide();
    $('.type').change(function() {
        if ($('.type').val() == 'singerH') {
            $('.singerHdim').show();
        } else {
            $('.singerHdim').hide();
        }
    });
});
$(function() {
    $('.singerSdim').show();
    $('.type').change(function() {
        if ($('.type').val() == 'singerS') {
            $('.singerSdim').show();
        } else {
            $('.singerSdim').hide();
        }
    });
});


// Hide Select

$('#party').hide();
$('.parties').change(function() {
    dropdown = $('.parties').val();
    //first hide all tabs again when a new option is selected
    $('#party').hide();
    //then show the tab content of whatever option value was selected
    $('#' + dropdown).show();
});


// Select
var $select1 = $('.select1'),
    $select2 = $('.select2'),
    $select3 = $('.selectthree'),
    $options = $select2.find('option');
$select1.on('change', function() {
    $select2.html($options.filter('[value="' + this.value + '"]'));
})

$optionT = $select3.find('option');
$select2.on('change', function() {
        $select3.html($optionT.filter('[value="' + this.value + '"]'));
    })
    .trigger('change');


// SideBar
$(document).ready(function() {
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function() {
        hamburger_cross();
    });
    overlay.click(function() {
        hamburger_cross();
    });


    function hamburger_cross() {

        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.removeClass('opacity');
            overlay.removeClass('is-open');
            overlay.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('opacity');
            overlay.removeClass('is-closed');
            overlay.addClass('is-open');
            isClosed = true;
        }
    }

    $('[data-toggle="offcanvas"]').click(function() {
        $('#wrapper').toggleClass('toggled');
    });
});



//Nav
$(window).on("scroll", function() {
    if ($(window).scrollTop() > 50) {
        $("nav.moved").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
        $("nav.moved").removeClass("active");
    }
});

// SElect

$(".edit").click(function() {
    $('.editText').select();
});
$(".edit.sec").click(function() {
    $('.editText2').select();
});
$(".edit.three").click(function() {
    $('.editText3').select();
});

// ProfileImg 
$(document).ready(function() {


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function() {
        readURL(this);
    });

    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });
});

// Gallery 
$(document).ready(function($) {
    // delegate calls to data-toggle="lightbox"
    $(document).on('click', '[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', function(event) {
        event.preventDefault();
        return $(this).ekkoLightbox({
            onShown: function() {
                if (window.console) {
                    return console.log('Checking our the events huh?');
                }
            },
            onNavigate: function(direction, itemIndex) {
                if (window.console) {
                    return console.log('Navigating ' + direction + '. Current item: ' + itemIndex);
                }
            }
        });
    });
});



// Date
$(function() {
    $(".datepicker").datepicker();
});

// Number
//$(document).ready(function () {
//  //called when key is pressed in textbox
//  $(".number").keypress(function (e) {
//     //if the letter is not digit then display error and don't type anything
//     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
//        //display error message
//        $("#errmsg").html("Numbers Only").show().fadeOut("slow");
//               return false;
//    }
//   });
//}); 


// File
'use strict';

;
(function(document, window, index) {
    var inputs = document.querySelectorAll('.inputfile');
    Array.prototype.forEach.call(inputs, function(input) {
        var label = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener('change', function(e) {
            var fileName = '';
            if (this.files && this.files.length > 1)
                fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
            else
                fileName = e.target.value.split('\\').pop();

            if (fileName)
                label.querySelector('span').innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });

        // Firefox bug fix
        input.addEventListener('focus', function() {
            input.classList.add('has-focus');
        });
        input.addEventListener('blur', function() {
            input.classList.remove('has-focus');
        });
    });
}(document, window, 0));




$(function() {
    var $popover = $('.popover-markup>.trigger').popover({
        html: true,
        placement: 'bottom',
        // title: '<?= lang("Select passengers");?><a class="close demise");">×</a>',
        content: function() {
            return $(this).parent().find('.content').html();
        }
    });

    // open popover & inital value in form
    var passengers = [0, 0, 0];
    $('.popover-markup>.trigger').click(function(e) {
        e.stopPropagation();
        $(".popover-content input").each(function(i) {
            $(this).val(passengers[i]);
        });
    });
    // close popover
    $(document).click(function(e) {
        if ($(e.target).is('.demise')) {
            $('.popover-markup>.trigger').popover('hide');
        }
    });
    // store form value when popover closed
    $popover.on('hide.bs.popover', function() {
        $(".popover-content input").each(function(i) {
            passengers[i] = $(this).val();
        });
    });
    // spinner(+-btn to change value) & total to parent input 
    $(document).on('click', '.number-spinner button', function() {
        var btn = $(this),
            input = btn.closest('.number-spinner').find('input'),
            total = $('#passengers').val(),
            oldValue = input.val().trim();

        if (btn.attr('data-dir') == 'up') {
            if (oldValue < input.attr('max')) {
                oldValue++;
                total++;
            }
        } else {
            if (oldValue > input.attr('min')) {
                oldValue--;
                total--;
            }
        }
        $('#passengers').val(total);
        input.val(oldValue);
    });
    $(".popover-markup>.trigger").popover('hide');
});




$(function() {
    $('#type').change(function() {
        $('.types').hide();
        $('#' + $(this).val()).show();
    });
});


// Date
$(function() {
    $(".birthday").datepicker({
        isRTL: true,
        i18n: {
            cancel: 'إلغاء',
            done: 'تم',
            previousMonth: '‹',
            nextMonth: '›',
            months: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
            monthsShort: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
            // weekdays: ['الاحد', 'الاثنين', 'الثلاثاء', 'الاربعاء', 'الخميس', 'الجمعه', 'السبت'],
            // weekdaysShort: ['سبت', 'اثنين', 'ثلاث', 'اربع', 'خميس', 'جمعه', 'سبت'],
            weekdays: [' ', ' ', ' ', ' ', ' ', ' ', ' '],
            weekdaysShort: [' ', ' ', ' ', ' ', ' ', ' ', ' '],
            weekdaysAbbrev: ['ح', 'ن', 'ث', 'ر', 'خ', 'ج', 'س'],
        },
        format: 'yyyy/mm/dd',
        yearRange: 100,
    });
    $(".dateparty").datepicker({
        isRTL: true,
        i18n: {
            cancel: 'إلغاء',
            done: 'تم',
            previousMonth: '‹',
            nextMonth: '›',
            months: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
            monthsShort: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
            weekdays: ['الاحد', 'الاثنين', 'الثلاثاء', 'الاربعاء', 'الخميس', 'الجمعه', 'السبت'],
            weekdaysShort: ['سبت', 'اثنين', 'ثلاث', 'اربع', 'خميس', 'جمعه', 'سبت'],
            weekdaysAbbrev: ['ح', 'ن', 'ث', 'ر', 'خ', 'ج', 'س'],
        },
        format: 'yyyy/mm/dd',
        yearRange: 100,
    });


});


'use strict';
let picker = new Datepicker();
let pickElm = picker.getElement();
let pLeft = 200;
let pWidth = 300;
pickElm.style.position = 'absolute';
pickElm.style.left = pLeft + 'px';
pickElm.style.top = '172px';
picker.attachTo(document.body);

picker.onPicked = function() {
    let elgd = document.getElementById('gregDate');
    let elhd = document.getElementById('hijrDate');
    if (picker.getPickedDate() instanceof Date) {
        elgd.value = picker.getPickedDate().getDateString();
        elhd.value = picker.getOppositePickedDate().getDateString()
    } else {
        elhd.value = picker.getPickedDate().getDateString();
        elgd.value = picker.getOppositePickedDate().getDateString()
    }
};

function openSidebar() {
    document.getElementById("mySidebar").style.display = "block"
}

function closeSidebar() {
    document.getElementById("mySidebar").style.display = "none"
}

function dropdown(el) {
    if (el.className.indexOf('expanded') == -1) {
        el.className = el.className.replace('collapsed', 'expanded');
    } else {
        el.className = el.className.replace('expanded', 'collapsed');
    }
}

function selectLang(el) {
    el.children[0].checked = true;
    picker.setLanguage(el.children[0].value)
}

function setFirstDay(fd) {
    picker.setFirstDayOfWeek(fd)
}

function setYear() {
    let el = document.getElementById('valYear');
    picker.setFullYear(el.value)
}

function setMonth() {
    let el = document.getElementById('valMonth');
    picker.setMonth(el.value)
}

function updateWidth(el) {
    pWidth = parseInt(el.value);
    if (!fixWidth()) {
        document.getElementById('valWidth').value = pWidth;
        picker.setWidth(pWidth)
    }
}

function pickDate(ev) {
    ev = ev || window.event;
    let el = ev.target || ev.srcElement;
    pLeft = ev.pageX;
    fixWidth();
    pickElm.style.top = ev.pageY + 'px';
    picker.setHijriMode(el.id == 'hijrDate');
    picker.show();
    el.blur()
}

function gotoToday() {
    picker.today()
}

function setTheme() {
    let el = document.getElementById('txtTheme');
    let n = parseInt(el.value);
    if (!isNaN(n)) picker.setTheme(n);
    else picker.setTheme(el.value)
}

function newTheme() {
    picker.setTheme()
}

function fixWidth() {
    let docWidth = document.body.offsetWidth;
    let isFixed = false;
    if (pLeft + pWidth > docWidth) pLeft = docWidth - pWidth;
    if (docWidth >= 992 && pLeft < 200) pLeft = 200;
    else if (docWidth < 992 && pLeft < 0) pLeft = 0;
    if (pLeft + pWidth > docWidth) {
        pWidth = docWidth - pLeft;
        picker.setWidth(pWidth);
        document.getElementById('valWidth').value = pWidth;
        document.getElementById('sliderWidth').value = pWidth;
        isFixed = true
    }
    pickElm.style.left = pLeft + 'px';
    return isFixed
}

$(window).load(function() {
    $('.loader').fadeOut(500);
});
$('#timepicker1').datetimepicker({
    toolbarPlacement: 'bottom',
    showClose: true,
    format: 'LT',
    icons: {
        close: "closeText"
    },
    // keepOpen: true,
    // inline: true,
    // useCurrent: false,
    // focusOnShow: true
});

$('#timepicker2').datetimepicker({
    toolbarPlacement: 'bottom',
    showClose: true,
    format: 'LT',
    icons: {
        close: "closeText"
    },
    // keepOpen: true,
    // inline: true,
    // useCurrent: false,
    // focusOnShow: true
});


// Animation Pages
$(function() {
    'use strict';
    var $page = $('.mobile-first'),
        options = {
            debug: true,
            prefetch: true,
            cacheLength: 2,
            onStart: {
                duration: 250, // Duration of our animation
                render: function($container) {
                    // Add your CSS animation reversing class
                    $container.addClass('is-exiting');
                    // Restart your animation
                    smoothState.restartCSSAnimations();
                }
            },
            onReady: {
                duration: 0,
                render: function($container, $newContent) {
                    // Remove your CSS animation reversing class
                    $container.removeClass('is-exiting');
                    // Inject the new content
                    $container.html($newContent);
                }
            }
        },
        smoothState = $page.smoothState(options).data('smoothState');
});

