// This is a very simple demo that shows how a range of elements can
// be paginated.

/**
 * Callback function that displays the content.
 *
 * Gets called every time the user clicks on a pagination link.
 *
 * @param {int}page_index New Page index
 * @param {jQuery} jq the container with the pagination links as a jQuery object
 */
function pageselectCallback(page_index, jq) {
    var new_content = $('#hiddenresult div.result.pag' + page_index).clone();
    $('#Searchresult').empty().append(new_content);
    return false;
}

/**
 * Callback function for the AJAX content loader.
 */
function initPagination() {
    var num_entries = $('#hiddenresult div.result').length;
    // Create pagination element
    $("#Pagination").pagination(num_entries, {
        num_edge_entries: 0,
        current_page: 0,
        num_display_entries: 10,
        callback: pageselectCallback,
        next_text: '>',
        prev_text: '<',
        pages: new Array(2018, 2017, 2016, 2015, 2014, 2013, 2012, 2011, 2010, 2009, 2008, 2007, 2006, 2005, 2004, 2003, 2002, 2001, 2000, 1999, 1998, 1997, 1996),
        items_per_page: 1
    });
}

// Load HTML snippet with AJAX and insert it into the Hiddenresult element
// When the HTML has loaded, call initPagination to paginate the elements
$(document).ready(function() {
    initPagination();
});
