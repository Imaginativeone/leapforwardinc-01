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
    // alert('You clicked delete.');
    $.ajax({
      url: universityData.rootUrl + 'wp-json/wp/v2/note/146',
      type: 'DELETE',
      success: (response) => {
        console.log('Congrats');
        console.log(response);
      },
      error: (response) => {
        console.log('Sorry');
        console.log(response);
      }
    });
  }
}

export default MyNotes;