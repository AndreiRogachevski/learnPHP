<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
  <div class="col-md-4 d-flex align-items-center">
    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
      <svg class="bi me-2" width="30" height="24" role="img" aria-label="Bootstrap">
        <use xlink:href="../public/icons/bootstrap-icons.svg#bootstrap-fill"></use>
      </svg>
    </a>
    <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
  </div>
  <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
          <use xlink:href="../public/icons/bootstrap-icons.svg#twitter"></use>
        </svg></a></li>
    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
          <use xlink:href="../public/icons/bootstrap-icons.svg#instagram"></use>
        </svg></a></li>
    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
          <use xlink:href="../public/icons/bootstrap-icons.svg#facebook"></use>
        </svg></a></li>
  </ul>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script>
  function getUrlParameter(url, parameter) {
    parameter = parameter.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    let regex = new RegExp('[\\?|&]' + parameter.toLowerCase() + '=([^&#]*)');
    let results = regex.exec('?' + url.toLowerCase().split('?')[1]);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
  }

  function setUrlParameter(url, key, value) {

    let baseUrl = url.split('?')[0],
      urlQueryString = '?' + url.split('?')[1] && '',
      newParam = key + '=' + value,
      params = '?' + newParam;
    // If the "search" string exists, then build params from it
    if (urlQueryString) {
      let updateRegex = new RegExp('([\?&])' + key + '[^&]*');
      let removeRegex = new RegExp('([\?&])' + key + '=[^&;]+[&;]?');

      if (typeof value === 'undefined' || value === null || value === '') { // Remove param if value is empty
        params = urlQueryString.replace(removeRegex, "$1");
        params = params.replace(/[&;]$/, "");

      } else if (urlQueryString.match(updateRegex) !== null) { // If param exists already, update it
        params = urlQueryString.replace(updateRegex, "$1" + newParam);

      } else { // Otherwise, add it to end of query string
        params = urlQueryString + '&' + newParam;
      }
    }

    // no parameter was set so we don't need the question mark
    params = params === '?' ? '' : params;

    return baseUrl + params;
  }


  let pageSelect = document.getElementById('page-select');
  let currentPage = getUrlParameter(window.location.href, 'page');
  if (currentPage) {
    pageSelect.value = currentPage
  }

  pageSelect.addEventListener('change', (event) => {
    let value = event.target.value;
    window.location.href = setUrlParameter(window.location.href, 'page', value);
  })
</script>
</body>

</html>