export default function Post()
{
    var liked = false;

    function highlight_button(button)
    {
        button.style.backgroundColor = "#ffb0b8";
        button.style.borderRadius = "3px";
        button.style.opacity = "1";
    }
    
    function add_element(post){
        const post_section = document.querySelector('#posts');
        
        const card_container = document.createElement('div');
        card_container.className = 'card-container';

        const card_article = document.createElement('article');
        card_article.className = 'card';

        const card_header = document.createElement('div');
        card_header.className = 'card__header';

        card_header.innerHTML = `
                     <img class = "user-profile card__user-profile" alt="" src="${post.author.picture}"/>
                     <p class="card__username"> ${post.author.username}</p>`;

        const card_body = document.createElement('div');
        card_body.className = 'card__body';

        const card_title =  document.createElement('div');
        card_title.className = 'card__title';

        card_title.innerText = post.post_name;


        const card_content = document.createElement('p');
        card_content.className = 'card__content';
        card_content.innerText = post.content;

        const img_div = document.createElement('div');
        
        let images = '';
        post.images.forEach(img =>{
            images += `
                <img class="card__image" alt="" src="${img.url}"/>`;
        });

        img_div.innerHTML = images;

        const card_footer = document.createElement('div');
        card_footer.className = 'card__footer';
        const card_actions = document.createElement('div');
        card_actions.className = 'card__actions';

        const like_button = document.createElement('button');
        like_button.className = 'icon button--heart';


        const likes_count = document.createElement('span');
        likes_count.className = 'likes';
        likes_count.innerText = `${post.likes}`;
        

        if(!post.user_like){
            like_button.onclick = ()=>{
                if(!this.liked){

                    this.liked = true;

                    highlight_button(like_button);

                    let formData = new FormData();

                    formData.append('post_id',post.id);

                    fetch('http://localhost:5000/social-app/public/likes',{
                        method: 'post',
                        headers:{
                            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
                        },
                        body:formData
                    });
                    
                    let num = parseInt(likes_count.innerText);
                    num++;
                    likes_count.innerText = num;                
                }
            }
        }
        else
        {
            highlight_button(like_button);
        }

        const div = document.createElement('div');
        div.appendChild(like_button);
        div.appendChild(likes_count);

        card_actions.appendChild(div);
        
        card_footer.appendChild(card_actions);

        card_body.appendChild(card_title);
        card_body.appendChild(card_content);
        card_body.appendChild(img_div);
        card_body.appendChild(card_footer);

        card_article.appendChild(card_header);
        card_article.appendChild(card_body);

        card_container.appendChild(card_article);

        post_section.appendChild(card_container); 
    }

    return {add_element}
}

