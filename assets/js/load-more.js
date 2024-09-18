jQuery(document).ready(function ($) {
  var $loadMoreButton = $("#load-more");
  var ajaxUrl = wp_vars.ajax_url;
  var nonce = wp_vars.nonce;
  var currentPage = 2;
  var totalPages = 2;

  function loadSolutions() {
    $.ajax({
      url: ajaxUrl,
      type: "POST",
      data: {
        action: "load_more_solutions",
        nonce: nonce,
        page: currentPage,
      },
      beforeSend: function () {
        $loadMoreButton.text("Loading");
      },
      success: function (response) {
        if (response.success) {
          $(".list-a").append(response.data);
          currentPage++;
          if (currentPage > totalPages) {
            $loadMoreButton.hide();
          } else {
            $loadMoreButton.text("Read More");
          }
        } else {
          $loadMoreButton.hide();
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        $loadMoreButton.text("Failed to Load");
      },
    });
  }

  $loadMoreButton.on("click", function (e) {
    e.preventDefault();
    loadSolutions();
  });
});

jQuery(document).ready(function () {
  var defaultLang = "ar";

  function handleLanguageChange() {
    var gTranslateDropdown = jQuery(".goog-te-combo");
    // console.log("GTranslate dropdown found");

    gTranslateDropdown.val(defaultLang);

    gTranslateDropdown.on("change", function () {
      var selectedLang = gTranslateDropdown.val();
      console.log("Selected language: " + selectedLang);

      if (selectedLang) {
        setTimeout(function () {
          var currentUrl = window.location.href.split("?")[0];
          console.log("Current URL: " + currentUrl);
          var newUrl = currentUrl + "?lang=" + selectedLang;
          console.log("New URL: " + newUrl);
          window.location.href = newUrl;
        }, 1000);
      }
    });
  }

  var observer = new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
      if (jQuery(".goog-te-combo").length) {
        handleLanguageChange();
        observer.disconnect();
      }
    });
  });

  observer.observe(document.body, { childList: true, subtree: true });
});
