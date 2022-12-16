<script>
    function getProductsFilteredByDate(checkbox) {
        // Year (string): checkbox.value
        // Year (integer): parseInt(checkbox.value)

        var productsFilteredList = document.getElementsByClassName('product_card');
        // console.log(productsFilteredList);

        var productsListElem = document.getElementById('productsFilteredList');
        // console.log(productsListElem);
        
        var checkboxes = document.getElementsByClassName('year_check_box'); // Get all the checkboxs
        // console.log(checkboxes);

        var priceCheckboxes = document.getElementsByClassName('price_check_box'); // Get all the checkboxs
        // console.log(priceCheckboxes);

        var allCheckBoxesUnchecked = true;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                allCheckBoxesUnchecked = false;
            }
        }
        // console.log(allCheckBoxesUnchecked);

        var allPriceCheckBoxesUnchecked = true;
        for (var i = 0; i < priceCheckboxes.length; i++) {
            if (priceCheckboxes[i].checked) {
                allPriceCheckBoxesUnchecked = false;
            }
        }
        // console.log(allPriceCheckBoxesUnchecked);

        if (!allCheckBoxesUnchecked && !allPriceCheckBoxesUnchecked) {
            for (var i = 0; i < productsFilteredList.length; i++) {
                var allIDs = (productsFilteredList[i].id).split(/\s+/);
                var productID = allIDs[1];
                var productDate = allIDs[2];
                var productPrice = allIDs[3];
                var productDateSplited = productDate.split('-');
                var productYear = parseInt(productDateSplited[0]);
                // console.log("productID: " + productID + " | Year: " + productYear + " | Price: " + productPrice);

                var productMeetsYearChecked = false;
                for (var j = 0; j < checkboxes.length; j++) {
                    checkBoxYear = parseInt(checkboxes[j].getAttribute('value'));

                    if (checkBoxYear == productYear && checkboxes[j].checked) {
                        productsFilteredList[i].style.display = 'block';
                        productMeetsYearChecked = true;
                        break;
                    }
                    else if (checkBoxYear == productYear && !checkboxes[j].checked) {
                        productsFilteredList[i].style.display = 'none';
                        productMeetsYearChecked = false;
                        break;
                    }
                }
                // console.log("productMeetsYearChecked = " + productMeetsYearChecked);

                // Check if product price is between the price range
                var productMeetsPriceRangeChecked = false;
                if (productsFilteredList[i].style.display == 'block') { // If the product meets the yearCheckbox
                    for (j = 0; j < priceCheckboxes.length; j++) {
                        var priceCheckboxRange = (priceCheckboxes[j].value).split("_");
                        var minRangePrice = priceCheckboxRange[0];
                        var maxRangePrice = priceCheckboxRange[1];
                        // console.log("minRangePrice[" + j + "] = " + minRangePrice + ", maxRangePrice[" + j + "] = " + maxRangePrice);
                        
                        if (j = (priceCheckboxes.length - 1)) { // last element as a ≠ way
                            if (productPrice >= minRangePrice) {
                                productMeetsPriceRangeChecked = true;
                                break;
                            }
                        }
                        if (productPrice >= minRangePrice && productPrice < maxRangePrice) {
                            productMeetsPriceRangeChecked = true;
                            break;
                        }

                    }
                }

                if (productMeetsYearChecked && productMeetsProceRangeChecked) {
                    productsFilteredList[i].style.display = 'block';
                }
                else {
                    productsFilteredList[i].style.display = 'none';
                }
            }  
        }
        else {
            for (var i = 0; i < productsFilteredList.length; i++) {
                productsFilteredList[i].style.display = 'block';
            }
        }
    }
</script>