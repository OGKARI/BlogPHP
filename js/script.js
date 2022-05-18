window.addEventListener('DOMContentLoaded',function (){
    const btn = document.querySelector('.header_btn_log'),
          modal = document.querySelector('.modal'),
          btnModal =document.querySelector('.modal__close');

    btn.addEventListener('click', ()=>openModal(modal));
    btnModal.addEventListener('click',()=>closeModal(modal));
    
    modal.addEventListener('mouseover',(e)=>{
        if(e.target === modal){
            modal.style.cursor = 'pointer';
        }
        else{
            modal.style.cursor = 'auto';
        }
    });


    modal.addEventListener('click',(e)=>{
        if(e.target === modal){
            closeModal(modal);
        }
    });
    function openModal (modal){
        modal.classList.remove('hide');
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';

    }
    function closeModal(modal){
        modal.classList.remove('show');
        modal.classList.add('hide');
    }
});