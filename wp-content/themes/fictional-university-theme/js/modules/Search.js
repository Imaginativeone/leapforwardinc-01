import $ from 'jquery';

class Search {

  // 1. Describe and Create/Initiate Our Object
  constructor() {
    // alert('Hello, I am a Search.');

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
    
        this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
  
      } else {
        this.resultsDiv.html('');
        this.isSpinnerVisible = false;
      }
  
    }

    this.previousValue = this.searchField.val();
  }

  getResults() {
    // this.resultsDiv.html("Imagine real search results here...");
    // this.isSpinnerVisible = false;
    // How can I use JavaScript to send out a request to a URL?
    // $.getJSON(url, function);
    const $urlString = 'https://leapforward01.local/wp-json/wp/v2/posts?search=' + this.searchField.val();
    $.getJSON($urlString, posts => {
        // alert(posts[0].title.rendered);
        // this.resultsDiv.html('Imagine results here.');

        const testArray = ['red', 'orange', 'yellow'];

        this.resultsDiv.html(`
          <h2 class="search-overlay__section-title">General Information</h2>
          <ul class="link-list min-list">
            <!-- <li><a href="${ posts[0].link }">${ posts[0].title.rendered }</a></li> -->
            ${ testArray.map(item => `<li>${ item }</li>`).join('') }
          </ul>
        `
        );
      }
    );
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

  // Generic Change

  openOverlay() {
    this.searchOverlay.addClass("search-overlay--active");
    $('body').addClass('body-no-scroll'); // CSS 'overflow-hidden'

    console.log('Our open method just ran.');
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active");
    $('body').removeClass('body-no-scroll'); // CSS 'overflow-hidden'

    console.log('Our close method just ran.');
    this.isOverlayOpen = false;
  }

}

export default Search;