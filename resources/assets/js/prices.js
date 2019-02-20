import $ from 'jquery';
window.$ = window.jQuery = $;

$(function(){

    let pricesCount = $('.product-price-list li').length;

    // Add price
    $(document).on('click', '.price-add', function(e) {
        e.preventDefault();

        pricesCount++;
        let $parent = $(this).parent();
        let $newPrice = $parent.clone();
        $newPrice.find('input[type="hidden"]').remove();
        let newPriceHtml = $newPrice[0].outerHTML;        
        newPriceHtml = newPriceHtml.replace(/prices\[(\d+)\]/g, 'prices['+ pricesCount +']');
        newPriceHtml = newPriceHtml.replace(/value="(.*?)"/g, 'value=""');
        $(this).parent().after(newPriceHtml);
    });

    // Delete price
    $(document).on('click', '.price-delete', function(e) {
        e.preventDefault();

        let $parent = $(this).parent();
        let $priceIdInput = $parent.find('input[type="hidden"]');
        if ($priceIdInput.length) {
            let deletePriceHtml = $priceIdInput[0].outerHTML;
            deletePriceHtml = deletePriceHtml.replace(/prices\[(\d+)\]/g, 'deletePrices[$1]');
            $(this).parent().parent().before(deletePriceHtml);
        }
        $(this).parent().remove();
    });

});
