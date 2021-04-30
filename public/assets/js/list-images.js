const divModal = document.querySelector('#modal-layer');;
let linksView = document.querySelectorAll('.link-view');
linksView.forEach( function(linkView){
    linkView.addEventListener('click',function(){
        window.event.preventDefault(linkView);
        thambnailContainer = linkView.parentElement;
        showModal(thambnailContainer, divModal);
    });
});
function showModal(thambnailContainer, divModal)
{
    let img = thambnailContainer.querySelector('img').getAttribute('src');
    changeTheVisibilityOfTheModalLayer(divModal, 'block');
    let modal = mountTheModal(img);
    divModal.appendChild(modal);
}
function mountTheModal(img)
{
    let image = document.createElement('img');
    image.setAttribute('src', img);
    let linkToClose = document.createElement('a');
    linkToClose.innerText = 'Close';
    linkToClose.setAttribute('id', 'linkClose');
    linkToClose.setAttribute('href', '#');
    linkToClose.setAttribute('Onclick',
        'removeModal()');
    let tagBr = document.createElement('br');
    let modal = document.createElement('article');
    modal.classList.add('container-modal', 'fade-in');
    modal.appendChild(image);
    modal.appendChild(tagBr);
    modal.appendChild(linkToClose);
    return modal;
}
function removeModal()
{
    const modal = document.querySelector(
        '.container-modal');
    modal.classList.remove('fade-in');
    modal.classList.add('fade-out');
    divModal.classList.remove('fade-in');
    divModal.classList.add('fade-out');
    setTimeout(function(){
        modal.remove();
        changeTheVisibilityOfTheModalLayer(
            divModal,'none');
            divModal.classList.remove('fade-out');
            divModal.classList.add('fade-in');
    }, 500);
}
function changeTheVisibilityOfTheModalLayer(
    divModal,layerDisplay)
{
    divModal.style.display = layerDisplay;
}


