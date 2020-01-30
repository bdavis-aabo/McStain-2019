<?php /* Template Name: Page - Configurator */ ?>
<?php get_header() ?>

<section class="configurator-container" style="height: calc(100vh - 90px); margin-top: 90px">
  <div class="configurator-frame-container">
    <iframe id="configurator" src="" frameborder="0" height="100%" width="100%" data-pathname="" style="height: calc(100vh - 90px);"></iframe>
  </div>
</section>

<?php get_footer() ?>




<script type="text/javascript">
  var INITIAL = "/project/paintedprairie-4510" /* This is the default link to point the user to, when no hash is specified */
  var DOMAIN = "https://configurator.creatomus.com";
  var iframe = document.querySelector("iframe#configurator");
  var initialLocation = window.location.hash.slice(1);

  if (!initialLocation) {
    initialLocation = INITIAL;
  }
  function listener(event) {
    if (event.origin != DOMAIN) {
      return;
    }
    var data = parse(event.data);
    if (data === null) {
      return;
    }
    if (window.location.hash === "#" + data.pathname + data.search) {
      return;
    }
    setNewLocation(data);
  }
  function parse(raw) {
    try {
      var data = JSON.parse(raw);
      return data;
    } catch (error) {
      console.error("Bad format of the message");
      return null;
    }
  }
  function setNewLocation(data) {
    var newLocation = "#" + data.pathname + data.search;
    window.history.replaceState(data, "", newLocation);
    iframe.dataset.pathname = data.pathname;
  }

  function hashChangeListener(event) {
    var newLocation = window.location.hash.slice(1);
    setIframeSrc(newLocation);
  }

  function setIframeSrc(location) {
    iframe.setAttribute("src", DOMAIN + location);
    iframe.dataset.pathname = location;
  }

  window.addEventListener("message", listener);
  window.addEventListener("hashchange", hashChangeListener);

  setIframeSrc(initialLocation);
</script>
