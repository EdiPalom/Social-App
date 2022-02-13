import Comment from './comment';

export default function Post({comments}={})
{
    var liked = false;
    var comments_show = false;

    let state = {
        _comments:comments
    }

    const comments_card = document.createElement('div');
    comments_card.className = 'card__comments card__body';


    function comment_factory(comment)
    {
        let dom_comment = new Comment(
            {username:comment.author.username,
             picture:comment.author.picture})
            .create_element(comment.content);
        
        comments_card.appendChild(dom_comment);
    }

    function highlight_button(button)
    {
        button.style.backgroundColor = "#ffb0b8";
        button.style.borderRadius = "3px";
        button.style.opacity = "1";
    }

    function user_profile({picture,username}={})
    {
        const profile = document.createElement('div');

        profile.innerHTML = `
                     <img class = "user-profile card__user-profile" alt="" src="${picture}"/>
                     <p class="card__username"> ${username}</p>`;

        return profile;
    }


    
    function add_element(post){
        const post_section = document.querySelector('#posts');
        
        const card_container = document.createElement('div');
        card_container.className = 'card-container';

        const card_article = document.createElement('article');
        card_article.className = 'card';

        const card_header = user_profile({username: post.author.username,
                                          picture: post.author.picture});
        card_header.className = 'card__header';

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
        likes_count.innerText = post.likes;
        

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
        
        const comments_button = document.createElement('button');
        comments_button.className = 'icon button--message';

        const comments_count = document.createElement('span');
        comments_count.className = 'likes';
        comments_count.innerText = state._comments;

        comments_button.onclick = ()=>{
            if((state._comments > 0) && (!comments_show))
            {
                comments_show = true;
                
                fetch(`http://localhost:5000/social-app/public/api/comments/post/${post.id}`,{
                    headers:{
                        Accept:'application/json',
                        Authorization:'Bearer '+document.querySelector("meta[name='access_token']").getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(comments =>{
                        comments.data.forEach(comment=>{
                            comment_factory(comment);
                        });
                    });
            }else
            {
                comments_card.innerHTML = '';
                comments_show = false;
            }
        }

        const div_like = document.createElement('div');
        div_like.appendChild(like_button);
        div_like.appendChild(likes_count);

        const div_comment = document.createElement('div');
        div_comment.appendChild(comments_button);
        div_comment.appendChild(comments_count);

        const create_comment_div = document.createElement('div');
        create_comment_div.style.marginTop = '4px';

        const comment_button = document.createElement('button');
        comment_button.className = 'icon button--pen';

        comment_button.onclick = ()=>{
            let input = document.createElement('textarea');
            let button = document.createElement('button');
            button.innerText = 'Comment';


            button.onclick = ()=>{
                if(input.value != '')
                {
                    let formData = new FormData();
                    formData.append('content',input.value);
                    formData.append('post_id',post.id);

                    fetch('http://localhost:5000/social-app/public/comments',{
                        method:'post' ,
                        headers:{
                            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
                        },
                        body:formData
                    })
                        .then(response => response.json())
                        .then(comment =>{
                            comment_factory(comment);

                            create_comment_div.innerHTML = '';
                            
                            state._comments++;
                            comments_show = true;

                            let num = parseInt(comments_count.innerText);
                            num++;
                            comments_count.innerText = num;
                        });
                }
            }

            input.className = 'form__text';
            button.className = 'button form__button';
            button.style.marginTop = '4px';
            
            create_comment_div.appendChild(input);
            create_comment_div.appendChild(button);
        };

        card_actions.appendChild(div_comment);
        card_actions.appendChild(comment_button);
        card_actions.appendChild(div_like);
        
        card_footer.appendChild(card_actions);

        card_body.appendChild(card_title);
        card_body.appendChild(card_content);
        card_body.appendChild(img_div);

        card_article.appendChild(card_header);
        card_article.appendChild(card_body);
        card_article.appendChild(card_footer);
        card_article.appendChild(create_comment_div);
        card_article.appendChild(comments_card);
        
        card_container.appendChild(card_article);

        post_section.appendChild(card_container); 
    }

    return {add_element}
}

