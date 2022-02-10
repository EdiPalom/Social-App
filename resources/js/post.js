export default function Post()
{
    function add_element(post){
        const post_section = document.querySelector('#posts');
        
        const element = document.createElement('div');

        element.className = 'card-container';

        element.innerHTML =
            `
              <article class="card">
                 <div class="card__header">
                     <img class = "user-profile card__user-profile" alt="" src="${post.author.picture}"/>
                     <p class="card__username"> ${post.author.username}</p>
                 </div>
                 
                 <div class="card__body">
                      <div class="card__title"> ${post.post_name}</div>
                      <p class="card__content">
                       ${post.content}
                      </p>
                 </div>

`;
        post_section.appendChild(element);
    }

    return {add_element}
}

// post.images.forEeach(img =>{
//                         <img class="card__image" alt="" src="${img.url}"/>
//                       });
