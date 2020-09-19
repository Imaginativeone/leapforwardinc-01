import $ from 'jquery';

class MyNotes {

  constructor() {
    // alert('Hello from MyNotes.js');
    this.events();
  }

  events() {
    $(".delete-note").on("click", this.deleteNote);
  }

  // Custom Methods will go here
  deleteNote() {
    alert('You clicked delete.');
  }
}

export default MyNotes;