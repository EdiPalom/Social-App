export default function Comment({username,picture}={})
{    
    const data = {
        _username: username,
        _picture: picture
    };
          
    function user_profile()
    {
        const profile = document.createElement('div');

        profile.innerHTML = `
                     <img class = "user-profile user-profile--sm card__user-profile card__comment-profile" alt="" src="${data._picture}"/>
                     <p class="card__username card__username--sm"> ${data._username}</p>`;

        return profile;
    }
    
    function create_element(content)
    {
        const div = document.createElement('div');
        
        const profile = user_profile();

        const p = document.createElement('p');
        p.className = 'card__content';
        p.style.marginTop = "8px";
        p.innerText = content;

        div.style.paddingBottom = '4px';
        div.style.borderBottom = '1px solid #fff';

        div.appendChild(profile);
        div.appendChild(p);
        
        return div;
    }

    return {create_element};
}
