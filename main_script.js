//Navigation

const dropdownItems = document.querySelectorAll('.dropdown-hover')

dropdownItems.forEach(dropdownItem => {
    dropdownItem.addEventListener('mouseover', () => {
        dropdownItem.lastElementChild.style.cssText = 'opacity: 1; visibility:visible'
        document.querySelector('.navbar-wrapper').style.background = 'transparent'
        document.querySelector('.navbar-wrapper').style.borderBottom = '0.1rem solid #fff'
    })
})

dropdownItems.forEach(dropdownItem => {
    dropdownItem.addEventListener('mouseout', () => {
        dropdownItem.lastElementChild.style.cssText = 'opacity: 1; visibility: hidden'
        document.querySelector('.navbar-wrapper').style.background = 'none'
        document.querySelector('.nav-list-item').style.borderBottom = 'none';
    })
})

//Fim Navigation

Array.from(document.querySelectorAll(".navigation-button")).forEach(item => {
    item.onclick = () => {
        item.parentElement.parentElement.classList.toggle("change");
    };
});
