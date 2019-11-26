{literal}
<section id="template-vue-comments">
    <h3> {{ subtitle }} </h3>
    <ul>
       <li v-for="comment in comments">
           <span> {{ comment.usuario }} - {{comment.texto}} - {{comment.puntuacion}} </span>
       </li>
    </ul>
</section>
{/literal}
