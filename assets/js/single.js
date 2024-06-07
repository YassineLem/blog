let editorInstance;
ClassicEditor.create(document.querySelector("#comment"), {
  toolbar: [
      "heading",
      "|",
      "bold",
      "italic",
      "link",
      "bulletedList",
      "numberedList",
      "blockQuote"
  ],
  heading: {
      options: [
          { model: "paragraph", title: "Paragraph", class: "ck-heading_paragraph" },
          {
              model: "heading1",
              view: "h1",
              title: "Heading 1",
              class: "ck-heading_heading1"
          },
          {
              model: "heading2",
              view: "h2",
              title: "Heading 2",
              class: "ck-heading_heading2"
          }
      ]
  }
})
.then(editor => {
    editorInstance = editor;
}).catch(error => {
  console.log(error);
});
// function addComment(){
//     var form = document.getElementById('myForm');
//     var formData = new FormData(form);
//     console.log(formData)
//     // const content = editorInstance.getData();
//     // const postId = document.getElementById('post_id').value;
//     // const userId=document.getElementById('loger_in').value;
//     // console.log(userId)
// }
// document.getElementById('myForm').addEventListener('submit', function(event) {
//     event.preventDefault(); // Prevent the default form submission
//     var form = event.target;
//     var formData = new FormData(form);
    
//     // Send form data to the server using AJAX
//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', form.action, true);
//     xhr.onload = function() {
//         // Handle the response from the server if needed
//         if (xhr.status >= 200 && xhr.status < 300) {
//             // Success
//             console.log('Form submitted successfully');
//         } else {
//             // Error
//             console.error('Form submission failed');
//         }
//     };
//     xhr.onerror = function() {
//         // Handle errors during the AJAX request
//         console.error('Error occurred while submitting the form');
//     };
//     xhr.send(formData);
// });
