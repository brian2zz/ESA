

(function($) {
    "use strict"
    
    // single select box
    $("#single-select").obat();
  
    // multi select box
    $('.multi-select').obat();
  
    // dropdown option groups
    $('.dropdown-groups').obat();
  
    //disabling options
    $('.disabling-options').obat();
  
    //disabling a obat control
    $(".js-example-disabled").obat();
    $(".js-example-disabled-multi").obat();
    $("#js-programmatic-enable").on("click", function () {
        $(".js-example-disabled").prop("disabled", false);
        $(".js-example-disabled-multi").prop("disabled", false);
    });
    $("#js-programmatic-disable").on("click", function () {
        $(".js-example-disabled").prop("disabled", true);
        $(".js-example-disabled-multi").prop("disabled", true);
    });
  
  
    // obat with labels
    $(".obat-with-label-single").obat();
    $(".obat-with-label-multiple").obat();
  
  
    //obat container width
    $(".obat-width-50").obat();
    $(".obat-width-75").obat();
  
  
    //obat themes
    $(".js-example-theme-single").obat({
        theme: "classic"
    });
    $(".js-example-theme-multiple").obat({
        theme: "classic"
    });
  
  
    //ajax remote data
    $(".js-data-example-ajax").obat({
        width: "100%",
        ajax: {
          url: "https://api.github.com/search/repositories",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              q: params.term, // search term
              page: params.page
            };
          },
          processResults: function (data, params) {
            // parse the results into the format expected by obat
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;
      
            return {
              results: data.items,
              pagination: {
                more: (params.page * 30) < data.total_count
              }
            };
          },
          cache: true
        },
        placeholder: 'Search for a repository',
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection
      });
  
      function formatRepo (repo) {
        if (repo.loading) {
          return repo.text;
        }
      
        var markup = "<div class='obat-result-repository clearfix'>" +
          "<div class='obat-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
          "<div class='obat-result-repository__meta'>" +
            "<div class='obat-result-repository__title'>" + repo.full_name + "</div>";
      
        if (repo.description) {
          markup += "<div class='obat-result-repository__description'>" + repo.description + "</div>";
        }
      
        markup += "<div class='obat-result-repository__statistics'>" +
          "<div class='obat-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
          "<div class='obat-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
          "<div class='obat-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
        "</div>" +
        "</div></div>";
      
        return markup;
      }
      
    function formatRepoSelection (repo) {
        return repo.full_name || repo.text;
    }
  
  
  
  
    // loading array data
    var data = [
        {
            id: 0,
            text: 'enhancement'
        },
        {
            id: 1,
            text: 'bug'
        },
        {
            id: 2,
            text: 'duplicate'
        },
        {
            id: 3,
            text: 'invalid'
        },
        {
            id: 4,
            text: 'wontfix'
        }
    ];
    $(".js-example-data-array").obat({
      data: data
    })
  
  
    //automatic selection
    $('#automatic-selection').obat({
        selectOnClose: true
    });
      
  
    //remain open after selection
    $('#remain-open').obat({
        closeOnSelect: false
    });
  
  
    //dropdown-placement
    $('#dropdown-placement').obat({
        dropdownParent: $('#obat-modal')
    });
  
  
    // limit the number of selection
    $('#limit-selection').obat({
        maximumSelectionLength: 2
    });
  
  
    // dynamic option
    $('#dynamic-option-creation').obat({
        tags: true
    });
  
  
    // tagging with multi value select box
    $('#multi-value-select').obat({
        tags: true
    });
  
  
    // single-select-placeholder
    $(".single-select-placeholder").obat({
        placeholder: "Select a state",
        allowClear: true
    });
  
  
    // multi select placeholder
    $(".multi-select-placeholder").obat({
        placeholder: "Select a state"
    });
  
  
    //default selection placeholder
    $(".default-placeholder").obat({
        placeholder: {
            id: '-1', // the value of the option
            text: 'Select an option'
          }
    });
  
  
    // customizing how results are matched
    function matchCustom(params, data) {
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === '') {
          return data;
        }
    
        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') {
          return null;
        }
    
        // `params.term` should be the term that is used for searching
        // `data.text` is the text that is displayed for the data object
        if (data.text.indexOf(params.term) > -1) {
          var modifiedData = $.extend({}, data, true);
          modifiedData.text += ' (matched)';
    
          // You can return modified objects from here
          // This includes matching the `children` how you want in nested data sets
          return modifiedData;
        }
    
        // Return `null` if the term should not be displayed
        return null;
    }
    $(".customize-result").obat({
        matcher: matchCustom
    });
  
  
    // matching grouped options 
  
    function matchStart(params, data) {
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === '') {
          return data;
        }
      
        // Skip if there is no 'children' property
        if (typeof data.children === 'undefined') {
          return null;
        }
      
        // `data.children` contains the actual options that we are matching against
        var filteredChildren = [];
        $.each(data.children, function (idx, child) {
          if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
            filteredChildren.push(child);
          }
        });
      
        // If we matched any of the timezone group's children, then set the matched children on the group
        // and return the group object
        if (filteredChildren.length) {
          var modifiedData = $.extend({}, data, true);
          modifiedData.children = filteredChildren;
      
          // You can return modified objects from here
          // This includes matching the `children` how you want in nested data sets
          return modifiedData;
        }
      
        // Return `null` if the term should not be displayed
        return null;
    }
    $(".match-grouped-options").obat({
        matcher: matchStart
    });
  
  
    //minimum search term length
    $(".minimum-search-length").obat({
        minimumInputLength: 3 // only start searching when the user has input 3 or more characters
    });
  
    //maximum search term length
    $(".maximum-search-length").obat({
        maximumInputLength: 20 // only allow terms up to 20 characters long
    });
  
  
    // programmatically add new option
    var data = {
        id: 1,
        text: 'New Item'
    };
    var newOption = new Option(data.text, data.id, false, false);
    $(".add-new-options").append(newOption).trigger('change').obat();
  
  
    // create if not exists
  
    // Set the value, creating a new option if necessary
    if ($('.create-if-not-exists').find("option[value='" + data.id + "']").length) {
        $('.create-if-not-exists').val(data.id).trigger('change');
    } else { 
        // Create a DOM Option and pre-select by default
        var newOption = new Option(data.text, data.id, true, true);
        // Append it to the select
        $('.create-if-not-exists').append(newOption).trigger('change').obat();
    } 
  
    
  
    // using jquery selector
  
    $('.jquery-selector').obat();
    $('.jquery-selector').on("change", function(){
        var selectData = $(this).find(':selected');
        var value = selectData.val();
        alert("you select " + value);
    });
  
  
    // obat rtl support
    $(".rtl-obat").obat({
        dir: "rtl"
    });
  
  
    // destroy selector
    $(".destroy-selector").obat();
  
    $("#destroy-selector-trigger").on("click", function(){
        $(".destroy-selector").obat("destroy");
    });
  
  
    // opening options
    $(".opening-dropdown").obat();
    $("#dropdown-trigger-open").on("click", function(){
        $(".opening-dropdown").obat('open');
    });
  
  
    // open or close dropdown
    $(".open-close-dropdown").obat();
    $("#opening-dropdown-trigger").on("click", function(){
        $(".open-close-dropdown").obat('open');
    });
    $("#closing-dropdown-trigger").on("click", function(){
        $(".open-close-dropdown").obat('close');
    });
  
  
    // obat methods
    var $singleUnbind = $(".single-event-unbind").obat();
  
    $(".js-programmatic-set-val").on("click", function () {
        $singleUnbind.val("CA").trigger("change");
    });
    
    $(".js-programmatic-open").on("click", function () {
        $singleUnbind.obat("open");
    });
    
    $(".js-programmatic-close").on("click", function () {
        $singleUnbind.obat("close");
    });
    
    $(".js-programmatic-init").on("click", function () {
        $singleUnbind.obat({
            width: "400px"
        });
    });
    
    $(".js-programmatic-destroy").on("click", function () {
        $singleUnbind.obat("destroy");
    });
  
  
    var $unbindMulti = $(".js-example-programmatic-multi").obat();
    $(".js-programmatic-multi-set-val").on("click", function () {
        $unbindMulti.val(["CA", "HA"]).trigger("change");
    });
    
    $(".js-programmatic-multi-clear").on("click", function () {
        $unbindMulti.val(null).trigger("change");
    });
  
  
  })(jQuery);