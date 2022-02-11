require('./bootstrap');

import Post from './post';


// Use a component framework

// let error_alert = document.querySelector('#error');

// error_alert.addEventListener('click',()=>{
//     this.style.display = "none";
// })


let create = document.querySelector('#create__button');
let form = document.querySelector('#post-form');

let image = document.querySelector('#form--image');
let link = document.querySelector('#form--link');

let button_link = document.querySelector('#button--link');
let button_land = document.querySelector('#button--land');

let close = document.querySelector('#form-close');

create.addEventListener('click',()=>{
    create.style.display = "none";
    form.style.display = "flex";     
});

button_link.addEventListener('click',()=>{
    event.preventDefault();
    button_link.style.display = "none";
    link.style.display = "flex";
    link.style.flexDirection = "column";
});

button_land.addEventListener('click',()=>{
    event.preventDefault();
    button_land.style.display = "none";
    image.style.display = "flex";
});

close.addEventListener('click',()=>{
    event.preventDefault();
    form.style.display = "none";
    create.style.display = "inline-block";
    image.style.display = "none";
    button_link.style.display = "inline-block";
    link.style.display = "none";
    button_land.style.display = "inline-block";
});


    
    // async ()=>{
    //     let formData = new FormData();

    //     formData.append('name','android');

    //     const response = await fetch('http://localhost:5000/social-app/public/api/tokens/create',{
    //         method: 'post',
            
    //         body:formData
    //     });
    //     console.log(response);

    //     const token = await response.json();
    //     console.log(token);
    // }

function post_factory(data)
{
    data.forEach(post =>{
        new Post({
            comments:post.comments
        }).add_element(post);
    });
}

async function get_posts(){
    const response = await fetch('http://localhost:5000/social-app/public/api/posts',
                                 {
                                     headers:{
                                         Accept:'application/json',
                                         Authorization: 'Bearer '+document.querySelector("meta[name='access_token']").getAttribute('content')
                                     }
                                 });
    // console.log(response);
    const posts = await response.json();
    console.log(posts);

    post_factory(posts.data);
}

async function get_token(){
    let formData = new FormData();

    formData.append('name','android');

    const response = await fetch('http://localhost:5000/social-app/public/tokens/create',{
        method: 'post',
        headers:{
            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
        },
        body:formData
    });

    const token = await response.json();

    document.querySelector("meta[name='access_token']").setAttribute('content',token['token']);

    get_posts();
}



get_token();
