/* global bootstrap: false */
(() => {
    'use strict'
    const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(tooltipTriggerEl => {
      new bootstrap.Tooltip(tooltipTriggerEl)
    })
  })()

  
document.querySelector('#side-bar-activator').addEventListener('click', () =>{
  document.querySelector('#side-bar').style = 'display: block;';
});

document.querySelector('#side-bar-deactivate').addEventListener('click', () =>{
  document.querySelector('#side-bar').style = 'display: none;';
});

const triggerTabList = document.querySelectorAll('#myTab button')
triggerTabList.forEach(triggerEl => {
  const tabTrigger = new bootstrap.Tab(triggerEl)

  triggerEl.addEventListener('click', event => {
    event.preventDefault()
    tabTrigger.show()
  })
})