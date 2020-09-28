import $ from 'jquery';

class Search {

  // 1. Describe and Create/Initiate Our Object
  constructor() {
    // alert('Hello, I am a Search.');

    this.addSearchHTML(); // This goes first, in order to make the other lines relevant.
    this.resultsDiv  = $("#search-overlay__results");
    this.openButton  = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.searchField = $("#search-term");
    this.events();
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;
  }

  // 2. Events
  events() {
    this.openButton.on('click', this.openOverlay.bind(this));
    this.closeButton.on('click', this.closeOverlay.bind(this));

    // Keyboard Events
    $(document).on('keydown', this.keyPressDispatcher.bind(this));
    this.searchField.on('keyup', this.typingLogic.bind(this)); // See constructor
  }

  // Locating Keycodes S13V58-08:00

  // 3. Methods
  typingLogic() {
    // alert("Hello from typingLogic()");

    if (this.searchField.val() != this.previousValue) {

      clearTimeout(this.typingTimer);

      if (this.searchField.val()) {

        if (!this.isSpinnerVisible) {
          this.resultsDiv.html('<div class="spinner-loader"></div>');
          this.isSpinnerVisible = true;
        }
    
        this.typingTimer = setTimeout(this.getResults.bind(this), 750);
  
      } else {
        this.resultsDiv.html('');
        this.isSpinnerVisible = false;
      }
  
    }

    this.previousValue = this.searchField.val();
  }

  // S14V66-Synchronous-vs-Asynchronous-Part-1,t=1:00:10:41

  getResults() {

    // Delete this code a bit later on

    // this.resultsDiv.html("Imagine real search results here...");
    // this.isSpinnerVisible = false;
    // How can I use JavaScript to send out a request to a URL?
    // $.getJSON(url, function);

    // See functions.php > wp_localize_script();
    // const $urlPostsString = universityData.root_url + '/wp-json/wp/v2/posts?search=' + this.searchField.val();
    const $urlPostsString = 'https://leapforward01.local/wp-json/wp/v2/posts?search=' + this.searchField.val();
    const $urlPagesString = 'https://leapforward01.local/wp-json/wp/v2/pages?search=' + this.searchField.val();

    // S14V66-Synchronous-vs-Asynchronous-Part-1,t=8:20:03:26
    // Update the Nesting with Asynchronous Code

    // S14V67-Synchronous-vs-Asynchronous-Part-2,t=0:00:10:11
    // Update the Nesting with Asynchronous Code

    $.when(
      $.getJSON($urlPagesString),
      $.getJSON($urlPostsString)
      ).then((posts, pages) => {

        let combinedResults = posts[0].concat(pages[0]);

        this.resultsDiv.html(`
        <h2 class="search-overlay__section-title">General Information</h2>
        <!-- Conditional Opening UL -->
        ${ combinedResults.length ? '<ul class="link-list min-list">' : '<p>No general information matches that search.</p>' }
          ${ combinedResults.map(item => `<li><a href="${ item.link }">${ item.title.rendered }</a> 
            ${ item.type == 'post' ? `by ${ item.authorName }` : '' } 
          </li>`).join('') }
        ${ combinedResults.length ? '</ul>' : '' } <!-- Conditional Closing UL -->
        combinedResults: ${ combinedResults.length }
        `
        ); // ${ testArray.map(item => `<li>${ item }</li>`).join('') }
        this.isSpinnerVisible = false;

    }, () => {
      this.resultsDiv.html('<p>Unexpected Error. Please Try Again.</p>');
    }); // jQuery Promises?

  }

  keyPressDispatcher(e) { // The parameter contains the key, s:83, Esc: 27
    // console.log('This is a test.', e.keyCode);

    if (e.keyCode == 83 && !this.isOverlayOpen && $("input, textarea").is(':focus')) {
      this.openOverlay();
    }

    if (e.keyCode == 27 &&  this.isOverlayOpen && $("input, textarea").is(':focus')) {
      this.closeOverlay();
    }

  }

  openOverlay() {
    this.searchOverlay.addClass("search-overlay--active");
    $('body').addClass('body-no-scroll'); // CSS 'overflow-hidden'
    
    this.searchField.val('');
    setTimeout(() => { this.searchField.focus(); }, 301);

    console.log('Our open method just ran.');
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active");
    $('body').removeClass('body-no-scroll'); // CSS 'overflow-hidden'

    console.log('Our close method just ran.');
    this.isOverlayOpen = false;
  }

  addSearchHTML() {
    $("body").append(`
    <!-- <div class="search-overlay search-overlay--active"> -->
    <div class="search-overlay">
      <div class="search-overlay__top">
        <div class="container">
          <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
          <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
          <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
        </div>
      </div>
      <div class="container">
        <div id="search-overlay__results"></div>
      </div>

    </div>
    `
    );
  }
}

export default Search;