showResetPreview = () => {
    resetPreviewButton = document.getElementById('preview-reload')
    resetPreviewButton.style.display='initial'
    resetPreviewButton.style.opacity=1
    resetPreviewButton.style.width='auto'
    resetPreviewButton.style.height='auto'
    resetPreviewButton.style.overflow='auto'
    resetPreviewButton.style.bottom='-10px'
    alertChanges() // tell user there are unssaved changes
    removeResetPreview() // kill this function once it happens
}

// function to notify changes
alertChanges = () => {
    document.getElementById('message').textContent = 'Unsaved Changes'
}

// create a helper function that adds delete logic every time a new input is added
const deleteButtonHelper = uniqueId => {
    const thisInput = document.querySelector('.inputExclusionContainer.inputExclusion-'+uniqueId);
    console.log(thisInput);
    thisInput.parentNode.removeChild(thisInput);
    alertChanges()
}

Array.from(document.querySelectorAll('.promo-banner-wrap form input')).forEach(inputEl => {
    inputEl.addEventListener('change', () => {
        // document.getElementById('message').textContent = 'Unsaved Changes';
        alertChanges();
    })
})

document.addEventListener("DOMContentLoaded", function() {

    //get the existing buttons on the page and add delete function
Array.from(document.getElementsByClassName('exclusion-input-delete-button')).forEach(btn => {
    btn.addEventListener('click', btnEl => {
        console.log(btnEl.target.id)
        deleteButtonHelper(btnEl.target.id);
    })
})

    removeResetPreview = () => {
        showResetPreview = () => false;
    } 
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
        showResetPreview()
    });

    // live description text update event
    desc_text.addEventListener('keyup', e =>{
        simple_preview_banner.children['1'].innerText =e.target.value
        showResetPreview()
    })

    // live link update event
    banner_link.addEventListener('keyup', e =>{
        simple_preview_banner.setAttribute('data-link', e.target.value)
        simple_preview_banner.style.cursor = e.target.value.trim() == '' ? 'default' : 'pointer' // update cursor style if there is a link
        showResetPreview()
    })
    // alert link on preview banner click
    simple_preview_banner.addEventListener('click', e => {
        if (e.target.getAttribute('data-link')){
            if ( e.target.getAttribute('data-link').trim() != '') {
                alert("Links to: " + e.target.getAttribute('data-link'))
            }
        }
    })

    // live background color update event
    background_colors.addEventListener('click', e =>{
        simple_preview_banner.style.background=e.target.style.background
        showResetPreview()
    })
    // live text color update event
    text_colors.addEventListener('click', e =>{
        for (el of simple_preview_banner.children){
            el.style.color = e.target.style.background;
            showResetPreview()
        }
    })

    /**
     * exluded pages js
    **/
   // toggle dropdown in case we get really long lists
    document.querySelector('.banner-exclusions-container-label').addEventListener('click', ()=>{
        document.querySelector('.banner-exclusions-inner-wrapper').classList.toggle('closed');
    })

    //create function that generates and returns a new input element
    const generateInput = () => {
        let uniqueInputName = Date.now(); // random timestamp so we can figure out what we want to delete later

        // create a container
        const inputExclusionInputWrapper = document.createElement('div');
        inputExclusionInputWrapper.classList.add('inputExclusionContainer');
        inputExclusionInputWrapper.classList.add('inputExclusion-'+uniqueInputName);

        // create the new input
        const newInput = document.createElement('input');
        newInput.setAttribute('type', 'text');
        newInput.setAttribute('required', 'true');
        newInput.setAttribute('placeholder', 'Page URL equals or contains');
        newInput.classList.add('large-text');
        newInput.classList.add('banner-exclusion-url');
        newInput.setAttribute('name', 'banner-exclusion-url-'+uniqueInputName);

        //create a delete button because you cant put psuedo::after on an input, also IE doesnt support psuedo::after at all... thanks Bill
        const deleteButton = document.createElement('span');
        deleteButton.classList.add('exclusion-input-delete-button');
        deleteButton.addEventListener('click', () => {deleteButtonHelper(uniqueInputName)});
        // add the delete function defined above
        deleteButton.innerText = 'Delete';

        // append the newly created input to inputExclusionInputWrapper
        inputExclusionInputWrapper.appendChild(newInput);

        // append the newly created button to inputExclusionInputWrapper
        inputExclusionInputWrapper.appendChild(deleteButton);

        // append the inputExclusionInputWrapper to div.exclusions-form-container
        document.querySelector('.exclusions-form-container').appendChild(inputExclusionInputWrapper);
        alertChanges();
    }

    // bring life to the add new button
    document.getElementById('add-exclusion').addEventListener('click', generateInput)

    /**
     * end of the exclusions list JS
     */

    // show unsaved changes when  hide/display banner button click
    document.getElementById('hide-promo-banner').addEventListener('change', () => {
        // document.getElementById('message').textContent = 'Unsaved Changes'
        alertChanges()
    }, true);
});