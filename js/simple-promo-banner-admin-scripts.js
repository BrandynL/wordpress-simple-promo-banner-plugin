document.addEventListener("DOMContentLoaded", function() {
    // live preview in backend
    const simple_preview_banner = document.getElementById('simple-preview-banner') // wrapper div
    const title_text = document.querySelector('input[name="promo-banner-title"]') // title text
    const desc_text = document.querySelector('textarea[name="promo-banner-text"]') // desc text

    const banner_link = document.getElementById('promo-banner-link') // get link
    const background_colors = document.getElementById('available-background-colors') // bannner link
    const text_colors = document.getElementById('available-text-colors') // bannner link

    // live title text update event
    title_text.addEventListener('keyup', e => {
        simple_preview_banner.children['0'].innerText = e.target.value
    });

    // live description text update event
    desc_text.addEventListener('keyup', e =>{
        simple_preview_banner.children['1'].innerText =e.target.value
    })

    // live link update event
    banner_link.addEventListener('keyup', e =>{
        simple_preview_banner.setAttribute('data-link', e.target.value)
        simple_preview_banner.style.cursor = e.target.value.trim() == '' ? 'default' : 'pointer' // update cursor style if there is a link
    })
    // alert link on preview banner click
    simple_preview_banner.addEventListener('click', e => {
        if ( e.target.getAttribute('data-link').trim() != '') {
            alert("Links to: " + e.target.getAttribute('data-link'))
        }
    })

    // live background color update event
    background_colors.addEventListener('click', e =>{
        simple_preview_banner.style.background=e.target.style.background
    })
    // live text color update event
    text_colors.addEventListener('click', e =>{
        for (el of simple_preview_banner.children){
            el.style.color = e.target.style.background;
        }
    })
    simple_preview_banner.addEventListener('transitionstart', ()=>{
        resetPreviewButton = document.getElementById('preview-reload')
        resetPreviewButton.style.display='initial'
        resetPreviewButton.style.opacity=1
        resetPreviewButton.style.width='auto'
        resetPreviewButton.style.height='auto'
        resetPreviewButton.style.overflow='auto'
        resetPreviewButton.style.bottom='-10px'
    }, true)
});