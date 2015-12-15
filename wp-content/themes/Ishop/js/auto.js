jQuery(document).ready(function($){
    var max_height = 0;
    $('#main .prod-title > h2').each(function(){
        var height = $(this).height();
        if (height > max_height) {
            max_height = height
        }
    })
    $('#main .prod-title > h2').css('min-height', max_height);

    $('#viewCartTable .itemQuantity').change(function(){
        $('#UpdateSumma').click();
    });

    var namearr = {};
    var kol = {};
    var price = {};
    var total = {};
    var count;
    var obsh;
    function massive() {
        count = $('#viewCartTable tbody tr:not([class])').size();
        for (var i=1; i<=count; i++) {
            var nm = $('#viewCartTable tbody tr:nth-child('+i+'):not([class]) td:nth-child(1)').text();
            namearr[i]=nm;
            var kl = $('#viewCartTable tbody tr:nth-child('+i+'):not([class]) td:nth-child(2) input').attr('value');
            kol[i]=kl;
            var pr = $('#viewCartTable tbody tr:nth-child('+i+'):not([class]) td:nth-child(3)').text();
            price[i]=pr;
            var ttl = $('#viewCartTable tbody tr:nth-child('+i+'):not([class]) td:nth-child(4)').text();
            total[i]=ttl;
        }
        obsh = $('#viewCartTable tr.total td:last-child').text();
    }
    function r() {
        for (var i=1; i<=count; i++){
            $("#table1").append("<input type='hidden' name='namef[]' value='"+namearr[i]+"'>");
            $("#table1").append('<input type="hidden" name="price[]" value="'+price[i]+'">');
            $("#table1").append('<input type="hidden" name="kol[]" value="'+kol[i]+'">');
            $("#table1").append('<input type="hidden" name="total[]" value="'+total[i]+'">');
        }
        $("#table1").append('<input type="hidden" name="obsh" value="'+obsh+'">');
    }

    if($('form#zakaz').length > 0) {
        $("form#zakaz").submit(function(){
            var formaccept = true;
            $("form#zakaz .require-field").each(function(){
                if(!this.value){
                    if($(this).next().attr('class')!="error_message") {
                        $("<p class='error_message'>Пожалуйста заполните это поле.</p>").insertAfter($(this));
                        $(this).css('border-color', 'red');
                        formaccept = false;
                    } else {
                        $(this).next().text('Пожалуйста заполните это поле.');
                        $(this).css('border-color', 'red');
                        formaccept = false;
                    }
                } else if ($(this).hasClass('email')) {
                    reg = /^(|(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6})$/i;
                    if (!$(this).val().match(reg)) {
                        if($(this).next().attr('class')!="error_message") {
                            $("<p class='error_message'>Пожалуйста, введите свой настоящий email.</p>").insertAfter($(this));
                            $(this).css('border-color', 'red');
                            formaccept = false;
                        } else {
                            $(this).next().text('Пожалуйста, введите свой настоящий email.');
                            $(this).css('border-color', 'red');
                            formaccept = false;
                        }
                    }
                }
            });
            if(formaccept){
                massive();
                r();
            }
            return formaccept;
        });

        $("form#zakaz .require-field").blur(function(){
            if(!this.value){
                if($(this).next().attr('class')!="error_message") {
                    $("<p class='error_message'>Пожалуйста заполните это поле.</p>").insertAfter($(this));
                    $(this).css('border-color', 'red');
                }
                else {
                    $(this).next().text('Пожалуйста заполните это поле.');
                    $(this).css('border-color', 'red');
                }
            } else if ($(this).hasClass('email')) {
                reg = /^(|(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6})$/i;
                if (!$(this).val().match(reg)) {
                    $("<p class='error_message'>Пожалуйста, введите свой настоящий email.</p>").insertAfter($(this));
                    $(this).css('border-color', 'red');
                }
            }
        });

        $("form#zakaz .require-field").focus(function(){
            if($(this).next().attr('class')=="error_message") {
                $(this).next().remove();
                $(this).css('border-color', '#cccccc');
            }
        })
    }

    $(function() {
        $('.jcarousel')
            .jcarousel({
                // Core configuration goes here
            })
            .jcarouselAutoscroll({
                interval: 5000,
                target: '+=1',
                autostart: true
            })
        ;
    });
});