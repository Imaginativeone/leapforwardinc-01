import $ from 'jquery';

class Search {

  // 1. Describe and Create/Initiate Our Object
  constructor() {
    // alert('Hello, I am a Search.');

    this.openButton  = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.events();
    this.isOverlayOpen = false;
  }

  // 2. Events
  events() {
    this.openButton.on('click', this.openOverlay.bind(this));
    this.closeButton.on('click', this.closeOverlay.bind(this));

    // Keyboard Events
    $(document).on('keydown', this.keyPressDispatcher.bind(this));
  }

  // Locating Keycodes S13V58-08:00

  // 3. Methods
  keyPressDispatcher(e) { // The parameter contains the key, s:83, Esc: 27
    // console.log('This is a test.', e.keyCode);

    if (e.keyCode == 83 && !this.isOverlayOpen) {
      this.openOverlay();
    }

    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }

  }

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