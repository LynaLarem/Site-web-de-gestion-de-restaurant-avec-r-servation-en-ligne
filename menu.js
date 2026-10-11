let list =document.querySelectorAll(".list li");/*appel les 4 liens*/
let boxes =document.querySelectorAll(".box");/*appel les box*/

list.forEach((el) => {/*boucle sur les link pour s'avoire quand je click*/
   el.addEventListener("click" , (e)=>{

   	/*Colorer les boutons de la liste qua je click*/
   	/*1 j'enleve la couleur*/
    list.forEach((li)=>{
    	li.classList.remove("active");
    })
    /*2 je met la nouvelle couleur sur le bouton clique*/
    e.target.classList.add("active");


     /*Filtrage*/
      boxes.forEach((el2)=>{
        el2.style.display = "none";
      })
      /*tout les box contient une classe (des 4 classes)*/
      document.querySelectorAll(e.target.dataset.filter).forEach((li)=>{
      	li.style.display ="flex";
      })
   })
})