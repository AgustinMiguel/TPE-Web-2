{literal}
<section id="template-vue-comments">
    <h3> {{ subtitle }} </h3>
    <ul>
       <li v-for="comment in comments">
           <span> {{ comment.usuario }} - {{comment.texto}} </span>
           <span><button v-on:click="del(comment.id_comentario)"  :data-id="comment.id_comentario" class="btn-eliminar">eliminar</button></span>
       </li>
    </ul>
</section>
{/literal}
