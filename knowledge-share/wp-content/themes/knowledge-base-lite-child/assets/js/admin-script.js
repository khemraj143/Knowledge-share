jQuery(document).ready(function() {
    if(jQuery('select.multiple').length){
        jQuery('select.multiple').select2();
    }

    if (jQuery(".mb_taxonomy_field").length) {
        jQuery(document).on("change", ".mb_taxonomy_field", function() {
            let get_term = jQuery(this).val();
            let post = jQuery(this).attr("data-post");
            let tax = jQuery(this).attr("data-tax");
            
            jQuery.ajax({
                type: "post",
                dataType: "json",
                url: "/wp-admin/admin-ajax.php",
                data: {action: "update_post_terms", terms: get_term, id: post, tax: tax},
                success: function(res){
                    if(res.length && res[400]){
                        confirm(res[400]);
                    }
                }
            });
        });
    }
    
});