window.onload = () => {
    const params = new URLSearchParams(window.location.search);
    const note = params.get("note");

    if (note) {
        // DOM XSS — injected via innerHTML
        document.getElementById("notes-list").innerHTML += `${note}`;
    }


    document.getElementById("add-note-btn").onclick = () => {
        const noteContent = document.getElementById("note-input").value;
        const noteList = document.getElementById("notes-list");

        params.set("note", noteContent);
        const newURL = window.location.pathname + "?" + params.toString();
        window.location.href = newURL;
        
        
        noteList.innerHTML = params.get("note");

        document.getElementById("note-input").value = "";
    }
};



