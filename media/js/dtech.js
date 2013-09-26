// JavaScript Document
var dtech = {
    old_drop_val: "",
    /**
     *  change the box of popup image on
     *  runtime
     *  click
     * @param {type} obj
     * @returns {author:ubd} 
     */
    changeBoxImage: function(obj) {
        jQuery(".wait").css("display", "block");
        jQuery(".wait img").css("opacity", "1");
        jQuery("#display_image").css("opacity", ".61");

        jQuery(".wait img").css("opacity", "1");
        setTimeout(function() {
            jQuery(".wait").css("display", "none"),
                    jQuery("#display_image").css("opacity", "1");
            jQuery("#display_image").attr("src", jQuery(obj).attr("image_large"))

        }, 2000);
    },
    showdetailLightbox: function() {
        jQuery("#dummy_link").trigger("click");
    },
    doGloblSearch: function() {
        if (jQuery.trim(jQuery("#serach_field").val()) != "") {
            jQuery("#search_form").submit();
        }
    },
    updatehashBrowerUrl: function(s) {
        window.location.hash = s;
    },
    custom_alert: function(output_msg, title_msg)
    {
        jQuery(".ui-widget ui-widget-content").remove();
        if (!title_msg)
            title_msg = 'Alert';
        if (!output_msg)
            output_msg = 'No Message to Display.';
        jQuery("<div id='custom_dialoge'></div>").html(output_msg).dialog({
            title: title_msg,
            resizable: false,
            modal: true,
            open: function(event, ui) {
                setTimeout(function() {
                    jQuery(".ui-button").trigger("click");
                }, 3000);
            },
            buttons: {
                "Ok": function()
                {
                    jQuery(this).dialog("close");
                }
            }
        });
    },
    isNumber: function(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    },
    preserveOldVal: function(obj) {
        dtech.old_drop_val = $(obj).val();
    },
    /**
     * to update element on ajax all
     * @param {type} ajax_url
     * @param {type} update_element_id
     * @param {type} resource_elem_id
     * @returns {undefined}
     */
    updateElementAjax: function(ajax_url, update_element_id, resource_elem_id) {

        if (jQuery("#" + resource_elem_id).val() != "") {
            jQuery.ajax({
                type: "POST",
                url: ajax_url,
                async: false,
                data:
                        {
                            resource_elem_id: jQuery("#" + resource_elem_id).val(),
                        }
            }).done(function(response) {
                jQuery("#" + update_element_id).html(response);
            });
        }
    },
    popupwindow: function(url, title, w, h) {
        var left = (screen.width / 2) - (w / 2);
        var top = (screen.height / 2) - (h / 2);
        return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
    },
    openColorBox: function(obj) {
        jQuery(obj).colorbox({width: "60%", height: "80%", iframe: true});
    },
    openColorBoxNoIFrame: function(obj) {
        jQuery(obj).colorbox({width: "60%", height: "80%"});
    },
    /**
     * slider js code for home page of website
     */
    makeSlider: function() {
        jQuery(".banner_dots a").click(function() {
            elem_id = jQuery(this).attr("id").replace("cs-button-coin-", "");
            jQuery(".banner_slider").hide();
            jQuery(".banner_dots a").attr("class", "cs-button-coin");
            jQuery("#banner_slider_" + elem_id).show('slow');
            jQuery("#banner_slider_" + elem_id + " #cs-button-coin-" + elem_id).attr("class", "cs-button-coin cs-active");
        });

        setInterval(function() {
            var visible_id = "";
            var counter_id = 1;
            jQuery(".banner_slider").each(function() {
                // console.log(jQuery(this).is(":visible"));
                if (jQuery(this).is(":visible")) {
                    visible_id = jQuery(this).attr("id");
                }
            })

            if (jQuery("#" + visible_id).next().length != 0) {

                jQuery("#" + visible_id).hide();
                jQuery("#" + visible_id).next().fadeIn('slow', "linear");
                counter_id = visible_id.replace("banner_slider_", "");
                next_counter_id = jQuery("#" + visible_id).next().attr("id").replace("banner_slider_", "");
                current_vis = jQuery("#" + visible_id).next().attr("id");
                jQuery(".banner_dots a").attr("class", "cs-button-coin");
                jQuery("#" + current_vis + " #cs-button-coin-" + counter_id).attr("class", "cs-button-coin");
                jQuery("#" + current_vis + " #cs-button-coin-" + next_counter_id).attr("class", "cs-button-coin cs-active");
            }
            else {
                jQuery("#" + visible_id).hide();
                jQuery("#banner").children().eq(0).fadeIn('slow', "linear");
                counter_id = visible_id.replace("banner_slider_", "");
                next_counter_id = jQuery("#banner").children().eq(0).attr("id").replace("banner_slider_", "");
                current_vis = jQuery("#banner").children().eq(0).attr("id");
                jQuery(".banner_dots a").attr("class", "cs-button-coin");
                jQuery("#" + current_vis + " #cs-button-coin-" + counter_id).attr("class", "cs-button-coin");
                jQuery("#" + current_vis + " #cs-button-coin-" + next_counter_id).attr("class", "cs-button-coin cs-active");
            }

        }, slider_timings * 1000);
    }

}
