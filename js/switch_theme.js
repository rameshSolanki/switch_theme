(function ($, Drupal, drupalSettings) {
	     let default_css = null;
       let dark_css = null;
	
Drupal.behaviors.switch_theme = {
      attach(context, settings) {

		    default_css = settings.default_css;
		    dark_css = settings.dark_css;
		    //alert (dark_css+default_css);
        var base_url = drupalSettings.path.baseUrl;
        var theme_light = base_url+default_css;
        var theme_dark = base_url+dark_css;

        const toggleSwitch = document.querySelector(
          '.switch input[type="checkbox"]'
        );
        const currentTheme = localStorage.getItem("theme");

        if (currentTheme) {
              document.documentElement.setAttribute("data-theme", currentTheme);

          if (currentTheme === "dark") {
              //alert(theme_url);
              darkTheme();
              toggleSwitch.checked = true;
          }
        }

        function darkTheme(e) {
            var head = document.getElementsByTagName('HEAD')[0];
            // Create new link Element
            var link = document.createElement('link');
            // set the attributes for link element
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = theme_dark;
            // Append link element to HTML head
            head.appendChild(link);
          }

       function lightTheme(e) {
            var head = document.getElementsByTagName('HEAD')[0];
            // Create new link Element
            var link = document.createElement('link');
            // set the attributes for link element
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = theme_light;
            // Append link element to HTML head
            head.appendChild(link);
          }

       function switchTheme(e) {
          if (e.target.checked) {
             document.documentElement.setAttribute("data-theme", "dark");
             localStorage.setItem("theme", "dark");
             darkTheme();
             document.querySelector('link[href$="' + theme_light + '"]').remove();
             //window.location.reload();
          } else {
             document.documentElement.setAttribute("data-theme", "light");
             localStorage.setItem("theme", "light");
             lightTheme();
             document.querySelector('link[href$="' + theme_dark + '"]').remove();
             //window.location.reload();
          }
        }

            toggleSwitch.addEventListener("change", switchTheme, false);
      },
    };

})(jQuery, Drupal, drupalSettings);