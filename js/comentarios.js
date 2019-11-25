"use strict";

// event listeners
document.querySelector("#comments-form").addEventListener('submit', addComment);

// define la app Vue
let app = new Vue({
    el: "#template-vue-comments",
    data: {
        subtitle: "Comentarios",
        comments: [],
        auth: true
    },
    methods: {
      del: function (id_comentario) {
        fetch('api/comment/' + id_comentario, {
            method: 'DELETE',
         })
         .then(response => {
             getComments();
         })
         .catch(error => console.log(error));
       }
    }
  });

/**
 * Obtiene la lista de comment de la API y las renderiza con Vue.
 */
function getComments() {
    let id_jugador = document.querySelector("input[name=id_jugador]").value;
    fetch("api/comment/" + id_jugador)
    .then(response => response.json())
    .then(comments => {
        app.comments = comments; // similar a $this->smarty->assign("comments", $comments)
    })
    .catch(error => console.log(error));
}

/**
 * Inserta un comment usando la API REST.
 */
function addComment(e) {
    e.preventDefault();

    let data = {
        id_jugador:  document.querySelector("input[name=id_jugador]").value,
        id_usuario:  document.querySelector("input[name=id_usuario]").value,
        texto:  document.querySelector("input[name=texto]").value,
        puntuacion:  document.querySelector("input[name=puntuacion]").value,
        fecha: Date.now(),
    }

    fetch('api/comment', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
     })
     .then(response => {
         getComments();
     })
     .catch(error => console.log(error));
}

// obtiene los comments al iniciio
getComments();  //NO TENGO EL ID DEL PLAYER
