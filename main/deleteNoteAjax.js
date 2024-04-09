function deleteNote(noteId) {
    let noteDiv = document.querySelector(`.note[data-note-id="${noteId}"]`);
    if (noteDiv) {
        // Remove the note element from the DOM
        noteDiv.remove(); 
        
        // Send an AJAX request to delete the note from the server
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../models/deleting_note.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("note_id=" + encodeURIComponent(noteId));
    } else {
        console.error("Note with ID " + noteId + " not found.");
    }
}