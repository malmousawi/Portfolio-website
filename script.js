const form = document.getElementById('blog');

form.addEventListener('submit',add);
// retrieves the form including title box and text box.
// checks if its empty and if so will change their colours.

function add(evt){
    const blogbox = document.getElementById('titleEntry');
    const blogtext = blogbox.value;
    const titlebox = document.getElementById('textEntry');
    const titletext = titlebox.value;
    if(blogtext==""){
        evt.preventDefault();
        blogbox.style.backgroundColor = 'green';
    }
    else{
        blogbox.style.backgroundColor = 'white';
    }
    if(titletext==""){
        evt.preventDefault();
        titlebox.style.backgroundColor = 'purple';
    }
    else{
        titlebox.style.backgroundColor = 'white';
    }
}