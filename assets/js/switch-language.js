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
    mutations.forEach(function () {
      if (jQuery(".goog-te-combo").length) {
        handleLanguageChange();
        observer.disconnect();
      }
    });
  });

  observer.observe(document.body, { childList: true, subtree: true });
});
